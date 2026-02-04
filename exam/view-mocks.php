<?php 
include_once('../includes/header.php'); 
include_once('../includes/db_connect.php'); 

$cat_slug = isset($_GET['cat']) ? mysqli_real_escape_string($conn, $_GET['cat']) : '';

// Fetch Category Details
$cat_query = "SELECT * FROM categories WHERE category_slug = '$cat_slug'";
$cat_res = mysqli_query($conn, $cat_query);
$category = mysqli_fetch_assoc($cat_res);
?>

<div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active text-capitalize"><?php echo str_replace('-', ' ', $cat_slug); ?></li>
      </ol>
    </nav>

    <div class="d-flex align-items-center mb-4">
        <div class="bg-primary text-white rounded-circle p-3 me-3">
            <i class="fas fa-file-alt fa-2x"></i>
        </div>
        <div>
            <h2 class="fw-bold mb-0 text-capitalize"><?php echo $category['category_name']; ?> Mock Test</h2>
            <p class="text-muted mb-0">Total available tests for 2026 preparation.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <?php
            $cat_id = $category['id'];
            $mocks_sql = "SELECT * FROM mocks WHERE category_id = '$cat_id'";
            $mocks_res = mysqli_query($conn, $mocks_sql);

            if(mysqli_num_rows($mocks_res) > 0) {
                while($mock = mysqli_fetch_assoc($mocks_res)) {
                    ?>
                    <div class="card border-0 shadow-sm rounded-4 mb-3 p-3 test-list-card">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <h5 class="fw-bold mb-1"><?php echo $mock['mock_title']; ?></h5>
                                <span class="badge bg-success-soft text-success small px-3">FREE</span>
                                <span class="text-muted small ms-2"><?php echo rand(500, 5000); ?> Attempts</span>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex text-muted small gap-3">
                                    <div><i class="fas fa-question-circle"></i> 100 Qns</div>
                                    <div><i class="fas fa-star"></i> 200 Marks</div>
                                    <div><i class="fas fa-clock"></i> 60 Mins</div>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <a href="take_test.php?id=<?php echo $mock['id']; ?>" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Start Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='alert alert-info'>No tests uploaded for this category yet.</div>";
            }
            ?>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                <h5 class="fw-bold mb-3">About SSC CGL 2026</h5>
                <p class="small text-secondary" style="line-height: 1.7;">
                    The <strong>SSC CGL (Staff Selection Commission - Combined Graduate Level)</strong> is one of the most prestigious exams in India. Our 2026 Mock Test series is designed by experts to match the latest TCS pattern. 
                </p>
                <p class="small text-secondary">
                    Practicing these tests will help you improve your <strong>General Intelligence, Quantitative Aptitude, and English Comprehension</strong>. Each test provides a detailed rank among thousands of students.
                </p>
                <hr>
                <h6 class="fw-bold small">Preparation Strategy:</h6>
                <ul class="small text-muted ps-3">
                    <li>Focus on previous year papers.</li>
                    <li>Maintain 90% accuracy in Reasoning.</li>
                    <li>Update your GK daily.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.bg-success-soft { background-color: #e8f5e9; }
.test-list-card { transition: transform 0.2s; border-left: 5px solid transparent !important; }
.test-list-card:hover { transform: translateY(-3px); border-left: 5px solid #0d6efd !important; }
</style>

<?php include_once('../includes/footer.php'); ?>