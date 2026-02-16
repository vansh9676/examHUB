<?php
include_once('../includes/db_connect.php');

if(isset($_POST['query'])) {
    $search = mysqli_real_escape_string($conn, $_POST['query']);
    
    // Search both Mock titles and Category names across the entire database
    $sql = "SELECT m.mock_title, m.id, c.category_name 
            FROM mocks m 
            JOIN categories c ON m.category_id = c.id 
            WHERE m.mock_title LIKE '%$search%' 
            OR c.category_name LIKE '%$search%' 
            LIMIT 10";
            
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <a href='take_test.php?id={$row['id']}' class='list-group-item list-group-item-action py-3 border-start-0 border-end-0'>
                <div class='d-flex justify-content-between align-items-center'>
                    <div>
                        <h6 class='mb-0 fw-bold text-dark'>{$row['mock_title']}</h6>
                        <small class='text-primary fw-semibold'>{$row['category_name']}</small>
                    </div>
                    <i class='fas fa-chevron-right text-muted small'></i>
                </div>
            </a>";
        }
    } else {
        echo "<div class='list-group-item text-muted border-0'>No specific exams found for '$search'</div>";
    }
}
?>