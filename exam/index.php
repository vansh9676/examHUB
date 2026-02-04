<?php 
include_once('../includes/header.php'); 
include_once('../includes/db_connect.php'); 
?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-dark">All Exam <span class="text-primary">Categories</span></h1>
        <p class="text-muted">Search through our 70+ categories and 10,000+ mock tests.</p>
        
        <div class="col-md-8 mx-auto mt-4 position-relative">
            <div class="input-group shadow-lg border-0 rounded-pill overflow-hidden">
                <span class="input-group-text bg-white border-0 ps-4"><i class="fas fa-search text-muted"></i></span>
                <input type="text" id="liveSearch" class="form-control border-0 py-3" placeholder="Search for SSC CGL, Delhi Police, RRB NTPC..." autocomplete="off">
            </div>
            <div id="searchResult" class="list-group shadow-lg position-absolute w-100 mt-2 rounded-4 overflow-hidden" style="z-index: 1050; display: none;"></div>
        </div>
    </div>

    <div class="row g-4 mb-5" id="examGrid">
        <?php
        // Fetch all categories from your database
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "
                <div class='col-md-4 col-lg-3 exam-item'>
                    <div class='card border-0 shadow-sm h-100 p-4 text-center rounded-4 transition-card'>
                        <div class='text-primary mb-3'><i class='fas fa-graduation-cap fa-3x'></i></div>
                        <h5 class='fw-bold category-title'>{$row['category_name']}</h5>
                        <p class='small text-muted'>Latest 2026 Pattern</p>
                        <a href='view-mocks.php?cat={$row['category_slug']}' class='btn btn-outline-primary btn-sm rounded-pill px-4 stretched-link'>View Tests</a>
                    </div>
                </div>";
            }
        }
        ?>
    </div>

    <div class="mt-5 pt-5 border-top">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="fw-bold">How to Master Competitive Exams in 2026</h2>
                <p class="text-secondary leading-relaxed">
                    Preparing for exams like <strong>SSC, Banking, and Railways</strong> requires more than just reading books. You need a platform that offers real-time simulation. At examHUB, we categorize exams into specific niches to help you focus on the exact syllabus requirements of your target department.
                </p>
                <h4 class="mt-4">Why Simulated Mock Tests are Crucial</h4>
                <p class="text-secondary">
                    Whether you are an aspirant for <strong>Police & Defence</strong> or <strong>Insurance Exams</strong>, time management is your biggest hurdle. Our platform provides tests that use the exact same interface you will see in the exam hall. By practicing here, you reduce exam-day anxiety and increase your accuracy.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="bg-light p-4 rounded-4 sticky-top" style="top: 100px;">
                    <h5 class="fw-bold">Quick Links</h5>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2"><i class="fas fa-calendar-alt text-primary me-2"></i> <a href="../ssc-calendar.php" class="text-decoration-none">SSC Calendar 2026</a></li>
                        <li class="mb-2"><i class="fas fa-id-card text-primary me-2"></i> <a href="../eligibility.php" class="text-decoration-none">Check Eligibility</a></li>
                        <li class="mb-2"><i class="fas fa-bell text-primary me-2"></i> <a href="../job-notifications.php" class="text-decoration-none">Latest Job Alerts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <section class="mt-5 p-4 bg-white rounded-4 border">
    <h3 class="fw-bold mb-4">Detailed Guide to 2026 Exam Preparation</h3>
    
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-primary fw-bold">SSC (Staff Selection Commission)</h5>
            <p class="small text-muted">The SSC 2026 cycle includes CGL, CHSL, and MTS. Our mock tests focus on the new pattern where General Awareness and English have higher weightage. We provide over 500+ previous year papers to ensure you understand the trend of questions asked by TCS.</p>
        </div>
        <div class="col-md-6">
            <h5 class="text-primary fw-bold">Banking & Insurance</h5>
            <p class="small text-muted">Speed is the only factor in IBPS and SBI exams. Our sectional mocks for Quantitative Aptitude and Reasoning help you master the 20-minute time limit. We cover SBI PO, Clerk, and IBPS RRB scales.</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-primary fw-bold">Railways (RRB)</h5>
            <p class="small text-muted">With the massive vacancies in RRB ALP and Technician, our science-focused mocks are a must. We provide specialized notes for Basic Science and Engineering Drawing (BSED) which is the toughest part of the CBT-2 exam.</p>
        </div>
        <div class="col-md-6">
            <h5 class="text-primary fw-bold">Academic (Class 10th & 12th)</h5>
            <p class="small text-muted">Foundation is key for JEE/NEET. Our school-level mocks help students transition from subjective board exams to objective competitive patterns using NCERT-based question banks.</p>
        </div>
    </div>
</section>

    <div class="mt-5 pt-5 border-top">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="fw-bold">Comprehensive Guide to Entrance Exams in India</h2>
                <p class="text-secondary" style="line-height: 1.8;">
                    The competitive exam landscape in India is diverse, ranging from undergraduate entrance tests like <strong>JEE and NEET</strong> to recruitment exams like <strong>SSC CGL and IBPS PO</strong>. At examHUB, we categorize these tests to help you find exactly what you need. 
                </p>
                <h4 class="mt-4">Why Subject-Wise Categorization Matters</h4>
                <p class="text-secondary">
                    Each exam has a different weightage. For example, <strong>SSC MTS</strong> focuses on Numerical Aptitude and Reasoning, while <strong>Medical Exams</strong> require deep knowledge of Biology. By using our category-based mock tests, you can simulate the exact environment of your specific target exam.
                </p>
                </div>
            <div class="col-lg-4">
                <div class="bg-light p-4 rounded-4">
                    <h5 class="fw-bold">Exam Preparation Tips</h5>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Take 1 full mock test every 3 days.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Analyze your wrong answers immediately.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Focus on the SSC Calendar to stay updated.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $("#liveSearch").on("keyup", function(){
        let input = $(this).val();
        if(input != ""){
            $.ajax({
                url: "search_logic.php",
                method: "POST",
                data: {query: input},
                success: function(data){
                    $("#searchResult").html(data).show();
                }
            });
        } else {
            $("#searchResult").hide();
        }
    });

    $(document).on("click", function(e) {
        if (!$(e.target).closest('.position-relative').length) {
            $("#searchResult").hide();
        }
    });
});
</script>

<?php include_once('../includes/footer.php'); ?>