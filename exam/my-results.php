<?php 
include_once('../includes/header.php'); 
include_once('../includes/db_connect.php'); 

$rid = (int)$_GET['rid'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM exam_results WHERE id = $rid")
);

$user_choices = json_decode($data['responses'], true);


// Get category of this mock
$cat_q = mysqli_query($conn, "SELECT category_id FROM mocks WHERE id='".$data['mock_id']."'");
$cat = mysqli_fetch_assoc($cat_q);
$category_id = $cat['category_id'];


// Fetch SAME questions (by category)
$questions = mysqli_query($conn,
    "SELECT q.*
     FROM questions q
     JOIN mocks m ON q.mock_id = m.id
     WHERE m.category_id = '$category_id'"
);
?>

<div class="container my-5">
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-4 text-center border-0 rounded-4">

                <p class="text-muted small mb-1">YOUR PERFORMANCE</p>

                <h2 class="display-4 fw-bold text-primary">
                    <?php echo $data['total_score']; ?>
                </h2>

                <div class="d-flex justify-content-around mt-3">

                    <div class="text-success">
                        <b><?php echo $data['correct_answers']; ?></b><br>
                        <small>Right</small>
                    </div>

                    <div class="text-danger">
                        <b><?php echo $data['wrong_answers']; ?></b><br>
                        <small>Wrong</small>
                    </div>

                </div>

                <div class="mt-3 text-muted small">
                    Accuracy: <?php echo $data['accuracy']; ?>%
                </div>

            </div>
        </div>


        <div class="col-md-8">

            <?php while($q = mysqli_fetch_assoc($questions)): 

                $u_ans = $user_choices[$q['id']] ?? 'skipped';

                $is_correct = (strtolower($u_ans) == strtolower($q['correct_option']));

                $card_color = ($u_ans == 'skipped')
                    ? 'border-warning'
                    : ($is_correct ? 'border-success' : 'border-danger');
            ?>

            <div class="card mb-3 shadow-sm border-0 border-start border-4 <?php echo $card_color; ?> p-3">

                <p class="fw-bold mb-2">
                    <?php echo $q['question_text']; ?>
                </p>

                <div class="small d-flex justify-content-between">
                        <?php
                        // Get option texts
                        $correct_letter = strtolower($q['correct_option']);
                        $user_letter = strtolower($u_ans);

                        $correct_text = $q['option_'.$correct_letter] ?? '';
                        $user_text = ($u_ans != 'skipped') ? ($q['option_'.$user_letter] ?? '') : '';
                        ?>

                        <span>
                            Correct:
                            <b class="text-success">
                                <?php echo strtoupper($correct_letter); ?>.
                                <?php echo htmlspecialchars($correct_text); ?>
                            </b>
                        </span>

                        <span>
                            Yours:
                            <b class="<?php echo $is_correct ? 'text-success' : 'text-danger'; ?>">
                                <?php
                                if ($u_ans == 'skipped') {
                                    echo 'Skipped';
                                } else {
                                    echo strtoupper($user_letter) . '. ' . htmlspecialchars($user_text);
                                }
                                ?>
                            </b>
                        </span>


                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </div>
</div>
