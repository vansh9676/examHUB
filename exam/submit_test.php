<?php
session_start();
include_once('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mock_id = (int)$_POST['mock_id'];
    $user_id = $_SESSION['user_id'] ?? 1;

    $correct_count = 0;
    $wrong_count = 0;
    $user_responses = [];

    // Get category of this mock
    $cat_q = mysqli_query($conn, "SELECT category_id FROM mocks WHERE id='$mock_id'");
    $cat = mysqli_fetch_assoc($cat_q);
    $category_id = $cat['category_id'];

    // Get SAME questions as take_test.php (by category)
    $sql = "SELECT q.id, q.correct_option
            FROM questions q
            JOIN mocks m ON q.mock_id = m.id
            WHERE m.category_id = '$category_id'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $qid = $row['id'];
        $correct_opt = trim($row['correct_option']);

        $post_key = 'q' . $qid;
        $user_opt = isset($_POST[$post_key]) ? trim($_POST[$post_key]) : 'skipped';

        $user_responses[$qid] = $user_opt;

        if ($user_opt !== 'skipped') {

            if (strtolower($user_opt) == strtolower($correct_opt)) {
                $correct_count++;
            } else {
                $wrong_count++;
            }
        }
    }

    // Marks
    $final_score = ($correct_count * 2) - ($wrong_count * 0.5);

    // Accuracy
    $accuracy = 0;
    if (($correct_count + $wrong_count) > 0) {
        $accuracy = round(($correct_count / ($correct_count + $wrong_count)) * 100, 2);
    }

    $responses_json = mysqli_real_escape_string($conn, json_encode($user_responses));

    // FIXED COLUMN NAMES
    $insert_sql = "INSERT INTO exam_results
    (user_id, mock_id, total_score, correct_answers, wrong_answers, accuracy, responses, submitted_at)
    VALUES (
    '$user_id',
    '$mock_id',
    '$final_score',
    '$correct_count',
    '$wrong_count',
    '$accuracy',
    '$responses_json',
    NOW()
    )";

    if (mysqli_query($conn, $insert_sql)) {

        $report_id = mysqli_insert_id($conn);
        header("Location: my-results.php?rid=" . $report_id);
        exit();

    } else {

        die("Query Failed: " . mysqli_error($conn));
    }
}
?>
