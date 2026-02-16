<?php 
include_once('../includes/header.php'); 
include_once('../includes/db_connect.php'); 

$cat_slug = isset($_GET['cat']) ? mysqli_real_escape_string($conn, $_GET['cat']) : 'ssc';

// Fetch Category Details
$cat_query = "SELECT * FROM categories WHERE category_slug = '$cat_slug'";
$cat_res = mysqli_query($conn, $cat_query);
$category = mysqli_fetch_assoc($cat_res);

// If category doesn't exist in DB, handle gracefully
if (!$category) {
    echo "<div class='container my-5'><h2>Category not found.</h2></div>";
    include_once('../includes/footer.php');
    exit();
}
?>

<div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-4 small fw-bold">
        <li class="breadcrumb-item"><a href="/examHUB/index.php" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-capitalize text-primary"><?php echo $category['category_name']; ?></li>
      </ol>
    </nav>

    <div class="d-flex align-items-center mb-4 bg-white p-3 rounded-4 shadow-sm border">
        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
            <i class="fas fa-graduation-cap fa-lg"></i>
        </div>
        <div>
            <h2 class="fw-bold mb-0 h4"><?php echo $category['category_name']; ?> <span class="text-primary">Test Series</span></h2>
            <p class="text-muted mb-0 small">Updated for 2025-26 Exam Cycle</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <?php
            $cat_id = $category['id'];
            $mocks_sql = "SELECT * FROM mocks WHERE category_id = '$cat_id' ORDER BY id DESC";
            $mocks_res = mysqli_query($conn, $mocks_sql);

            if(mysqli_num_rows($mocks_res) > 0) {
                while($mock = mysqli_fetch_assoc($mocks_res)) {
                    ?>
                    <div class="card border-0 shadow-sm rounded-4 mb-3 p-3 test-list-card">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-3 mb-md-0">
                                <h5 class="fw-bold mb-1 h6"><?php echo $mock['mock_title']; ?></h5>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success-soft text-success border border-success border-opacity-25 px-2">FREE TEST</span>
                                    <small class="text-muted"><i class="fas fa-users me-1"></i><?php echo number_format($mock['attempts_count']); ?> Attempts</small>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="d-flex text-muted extra-small gap-3 justify-content-between justify-content-md-start">
                                    <span><i class="fas fa-file-alt text-primary me-1"></i><?php echo $mock['total_questions']; ?> Qns</span>
                                    <span><i class="fas fa-trophy text-primary me-1"></i><?php echo $mock['max_marks']; ?> Marks</span>
                                    <span><i class="fas fa-clock text-primary me-1"></i><?php echo $mock['time_minutes']; ?>m</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="take_test.php?id=<?php echo $mock['id']; ?>" class="btn btn-primary w-100 rounded-pill fw-bold shadow-sm py-2">Start Test</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='card border-0 rounded-4 p-5 text-center shadow-sm'>
                        <i class='fas fa-folder-open fa-3x text-light mb-3'></i>
                        <p class='text-muted'>No mock tests found in this category yet. We are adding new content daily!</p>
                      </div>";
            }
            ?>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px;">
                <h5 class="fw-bold mb-3 border-bottom pb-2">Exam <span class="text-primary">Insights</span></h5>
                
                <?php if($cat_slug == 'ssc'): ?>
                    <p class="small text-secondary mb-3">
                        The <strong>SSC (Staff Selection Commission)</strong> exams like CGL and MTS focus heavily on General Awareness and English in 2026.
                    </p>
                <?php elseif($cat_slug == 'banking'): ?>
                    <p class="small text-secondary mb-3">
                        <strong>Banking exams (IBPS/SBI)</strong> require immense speed. You have only 20 minutes per section in the Prelims.
                    </p>
                <?php else: ?>
                    <p class="small text-secondary mb-3">
                        Practicing these <strong>2026 Mock Tests</strong> helps you simulate the real exam environment and manage time effectively.
                    </p>
                <?php endif; ?>

                <div class="bg-primary-subtle p-3 rounded-3 mb-3">
                    <h6 class="fw-bold small mb-2 text-primary">Preparation Strategy:</h6>
                    <ul class="extra-small text-dark ps-3 mb-0">
                        <li class="mb-1">Identify weak spots in Quant.</li>
                        <li class="mb-1">Practice time-management.</li>
                        <li>Review negative marking logic.</li>
                    </ul>
                </div>

                <p class="extra-small text-muted mb-0">
                    *Content curated by <strong>examHUB</strong> educational experts to meet current TCS patterns.
                </p>
                <section class="mt-5">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h4 class="fw-bold mb-4"><i class="fas fa-question-circle text-primary me-2"></i> Frequently Asked Questions</h4>
                            <div class="accordion accordion-flush" id="faqAccordion">
                                <div class="accordion-item border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            What is the exam pattern for <?php echo $category['category_name']; ?> 2026?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted small">
                                            The 2026 pattern focuses on high-speed accuracy. For example, in SSC and Banking, you face a mix of Quantitative Aptitude, Reasoning, and General Awareness. Our mock tests exactly replicate this 100-question, 60-minute format.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            Does examHUB provide negative marking in these tests?
                                        </button>
                                    </h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted small">
                                            Yes. To simulate the real exam, 0.5 marks are deducted for every wrong answer, while each correct response earns 2 marks. This helps you master the 'Skip Strategy' to avoid losing hard-earned marks.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                                                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h6 class="fw-bold mb-3">Scoring & Analysis Guide</h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless small mb-0">
                                <thead class="text-muted border-bottom">
                                    <tr>
                                        <th>Subject</th>
                                        <th>Questions</th>
                                        <th>Weightage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>General Knowledge</td>
                                        <td>25 Qns</td>
                                        <td>High</td>
                                    </tr>
                                    <tr>
                                        <td>Quantitative Aptitude</td>
                                        <td>25 Qns</td>
                                        <td>Medium</td>
                                    </tr>
                                    <tr>
                                        <td>English/Hindi</td>
                                        <td>25 Qns</td>
                                        <td>High</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            
        </div>
    </div>
</div>


<style>
/* Responsive tweaks using your Common CSS variables */
.extra-small { font-size: 0.8rem; }
.bg-success-soft { background-color: #f1fdf4; }
.test-list-card { transition: all 0.2s; border-left: 5px solid transparent !important; background: #fff; }
.test-list-card:hover { transform: translateX(5px); border-left: 5px solid #0d6efd !important; box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important; }

@media (max-width: 768px) {
    .test-list-card { text-align: center; }
    .test-list-card .btn { margin-top: 10px; }
}
</style>

<?php include_once('../includes/footer.php'); ?>