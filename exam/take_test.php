<?php 
include_once('../includes/header.php'); 
include_once('../includes/db_connect.php'); 

// 1. Get the Mock ID from the URL
$mock_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 2. Fetch Mock and Category info to identify the Syllabus
$info_query = "SELECT m.*, c.category_name, m.category_id FROM mocks m 
               JOIN categories c ON m.category_id = c.id 
               WHERE m.id = '$mock_id' LIMIT 1";
$info_result = mysqli_query($conn, $info_query);
$mock = mysqli_fetch_assoc($info_result);

if (!$mock) { 
    echo "<div class='container my-5'><h2>Exam not found.</h2></div>"; 
    exit(); 
}

$current_category = $mock['category_id'];
$duration = (!empty($mock['time_minutes'])) ? $mock['time_minutes'] : 60;
?>

<div class="container-fluid bg-light min-vh-100 py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-4 shadow-sm mb-4 border-bottom border-primary border-3">
            <div>
                <h4 class="fw-bold mb-0"><?php echo $mock['mock_title']; ?></h4>
                <span class="badge bg-primary px-3"><?php echo $mock['category_name']; ?> Syllabus</span>
            </div>
            <div class="text-end">
                <div class="h3 fw-bold mb-0 text-danger" id="timerDisplay">00:00</div>
                <small class="text-muted fw-bold">TIME REMAINING</small>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <form id="examForm" action="submit_test.php" method="POST">
                    <input type="hidden" name="mock_id" value="<?php echo $mock_id; ?>">
                    
                    <?php
                    // 3. SYLLABUS LOGIC: Pull 100 random questions ONLY from this category
                    $q_sql = "SELECT q.* FROM questions q 
                              JOIN mocks m ON q.mock_id = m.id 
                              WHERE m.category_id = '$current_category' 
                              ORDER BY RAND() LIMIT 100";
                    
                    $q_result = mysqli_query($conn, $q_sql);
                    $total_q = mysqli_num_rows($q_result);

                    if ($total_q > 0) {
                        $count = 1;
                        while($q = mysqli_fetch_assoc($q_result)) {
                            ?>
                            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" id="q_<?php echo $count; ?>">
                                    <h5 class="fw-bold mb-3">Q<?php echo $count; ?>. <?php echo $q['question_text']; ?></h5>
                                    
                                    <div class="row g-3">
                                        <?php foreach(['a','b','c','d'] as $o): ?>
                                        <div class="col-md-6">
                                            <label class="d-block p-3 border rounded-3 option-hover-effect" style="cursor: pointer; transition: 0.3s;">
                                                <input type="radio" 
                                                    name="q<?php echo $q['id']; ?>" 
                                                    value="<?php echo $o; ?>" 
                                                    id="q<?php echo $q['id'].$o; ?>"
                                                    class="me-2"
                                                    onclick="markAnswered(<?php echo $count; ?>)">
                                                
                                                <span class="fw-bold me-1"><?php echo strtoupper($o); ?>.</span>
                                                <?php echo $q['option_'.$o]; ?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <style>
                                    /* This ensures the layout looks like a professional mock test */
                                    .option-hover-effect:hover {
                                        background-color: #f0f7ff;
                                        border-color: #0d6efd !important;
                                    }
                                    /* When the radio button inside is checked, highlight the whole box */
                                    .option-hover-effect:has(input:checked) {
                                        background-color: #e7f1ff;
                                        border-color: #0d6efd !important;
                                        font-weight: bold;
                                    }
                                </style>
                            <?php
                            $count++;
                        }
                    } else {
                        echo "<div class='alert alert-info text-center p-5'>No questions found for the " . $mock['category_name'] . " syllabus yet.</div>";
                    }
                    ?>
                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill shadow">Submit <?php echo $mock['category_name']; ?> Test</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 p-3 sticky-top" style="top:20px;">
                    <h6 class="fw-bold mb-3">Question Palette</h6>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <?php for($i=1; $i<=$total_q; $i++): ?>
                            <a href="#q_<?php echo $i; ?>" 
                            id="palette_btn_<?php echo $i; ?>" 
                            class="btn btn-xs btn-outline-secondary palette-link" 
                            style="width:32px; font-size:10px;">
                            <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                    <hr>
                    <p class="small text-muted">Each correct answer in this <strong><?php echo $mock['category_name']; ?></strong> mock earns you 2 marks, while 0.5 marks are deducted for wrong attempts.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .option-container input { display: none; }
    .option-card { cursor: pointer; transition: 0.3s; background: #fff; }
    .option-card:hover { background: #f8f9fa; border-color: #0d6efd !important; }
    .option-container input:checked + .option-card { background: #e7f1ff; border-color: #0d6efd !important; color: #0d6efd; }
</style>

<script>
let secondsLeft = <?php echo $duration; ?> * 60;
const display = document.querySelector('#timerDisplay');

const timer = setInterval(function () {
    let minutes = parseInt(secondsLeft / 60, 10);
    let seconds = parseInt(secondsLeft % 60, 10);
    display.textContent = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    if (--secondsLeft < 0) {
        clearInterval(timer);
        document.getElementById('examForm').submit();
    }
}, 1000);

function markAnswered(qNum) {
    // This finds the palette button using the ID we created earlier
    const btn = document.getElementById('palette_btn_' + qNum);
    if (btn) {
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success', 'text-white');
    }
}
</script>


<?php include_once('../includes/header.php'); ?>