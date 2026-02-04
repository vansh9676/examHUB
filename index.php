<?php include 'includes/header.php'; ?>

<section class="hero-section text-center py-5 border-bottom" style="background: linear-gradient(180deg, #f0f7ff 0%, #ffffff 100%);">
    <div class="container py-4">
        <span class="badge bg-primary-subtle text-primary mb-3 px-3 py-2 rounded-pill fw-bold">#1 Trusted Mock Test Site</span>
        <h1 class="display-4 fw-bold text-dark">India's Premier <span class="text-primary">Free Mock Test</span> Portal</h1>
        <p class="lead text-secondary mx-auto" style="max-width: 800px;">
            Empowering aspirants with high-quality, exam-standard test series for SSC, JEE, and NEET.
        </p>
        
             <div class="col-md-8 mx-auto mt-5">
                <form action="exam/index.php" method="GET" class="p-2 bg-white rounded-5 shadow-lg d-flex align-items-center border">
                    <i class="fas fa-search ms-3 text-muted"></i>
                    <input type="text" name="search" class="form-control border-0 shadow-none bg-transparent" 
                        placeholder="Search your exam (e.g. SSC MTS 2025)" 
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit" class="btn btn-primary btn-lg rounded-5 px-5 fw-bold">Search</button>
                </form>
            

              <div class="mt-3 d-flex justify-content-center flex-wrap gap-2">
                <span class="small text-muted me-2 align-self-center">Popular:</span>
                <a href="exam/view-mocks.php?cat=ssc" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">SSC MTS 2025</a>
                <a href="exam/view-mocks.php?cat=jee" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">JEE Mains</a>
                <a href="exam/view-mocks.php?cat=neet" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">NEET 2026</a>
                <a href="exam/view-mocks.php?cat=banking" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">IBPS Clerk</a>
                <a href="exam/view-mocks.php?cat=railway" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">RRB ALP</a>
            </div>
        </div>
    </div>
</section>
<section class="container mt-n4 mb-5">
    <div class="bg-white p-4 shadow-sm rounded-4 border">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="fas fa-fire text-danger me-2"></i>Upcoming Exams <span class="text-primary fs-6 fw-normal ms-2">Free Mock Tests</span>
            </h5>
            <a href="exam/index.php" class="text-decoration-none small fw-bold">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="d-flex overflow-auto pb-2 gap-3" style="scrollbar-width: none; -ms-overflow-style: none;">
            <?php
            $upcoming = [
                ['name' => 'AFCAT I 2026', 'link' => 'afcat'],
                ['name' => 'Railway Group D', 'link' => 'rrc-group-d'],
                ['name' => 'SSC MTS 2025', 'link' => 'ssc-mts'],
                ['name' => 'RRB ALP CBT-1', 'link' => 'rrb-alp'],
                ['name' => 'DSSSB PRT 2025', 'link' => 'dsssb'],
                ['name' => 'GATE ME 2026', 'link' => 'gate-me'],
                ['name' => 'CTET 2025 Paper I', 'link' => 'ctet']
            ];
            foreach($upcoming as $ex) {
                echo "
                <a href='exam/view-mocks.php?cat={$ex['link']}' class='text-decoration-none'>
                    <div class='flex-shrink-0 bg-light border rounded-3 px-4 py-2 text-dark fw-bold whitespace-nowrap' style='min-width: 180px; text-align: center;'>
                        <small class='text-uppercase' style='font-size: 0.75rem;'>{$ex['name']}</small>
                    </div>
                </a>";
            }
            ?>
        </div>
    </div>
</section>

<section class="container mb-5">
    <h4 class="fw-bold mb-4">POPULAR <span class="text-primary">Mock Tests</span></h4>
    <div class="row g-4">
        <?php
        $popular_tests = [
            ['title' => 'AFCAT I 2026', 'mock' => 'Mock Test-2', 'q' => '100', 'm' => '300', 't' => '120'],
            ['title' => 'SSC CGL Tier-1', 'mock' => 'Full Test-5', 'q' => '100', 'm' => '200', 't' => '60'],
            ['title' => 'SBI PO Prelims', 'mock' => 'Practice Set-1', 'q' => '100', 'm' => '100', 't' => '60']
        ];
        foreach($popular_tests as $pt) {
            echo "
            <div class='col-md-4'>
                <div class='card border-0 shadow-sm rounded-4 p-3 position-relative overflow-hidden'>
                    <div class='badge bg-danger position-absolute' style='top: 10px; left: -25px; transform: rotate(-45deg); width: 100px;'>NEW</div>
                    <div class='d-flex align-items-center mb-3 mt-2'>
                        <div class='bg-primary-subtle text-primary p-3 rounded-3 me-3'>
                            <i class='fas fa-file-signature fa-lg'></i>
                        </div>
                        <div>
                            <h6 class='mb-0 fw-bold'>{$pt['title']}</h6>
                            <small class='text-muted'>{$pt['mock']}</small>
                        </div>
                    </div>
                    <div class='row g-0 py-2 border-top border-bottom bg-light rounded-3 mb-3'>
                        <div class='col-4 text-center border-end'>
                            <small class='text-muted d-block'>Questions</small>
                            <span class='fw-bold'>{$pt['q']}</span>
                        </div>
                        <div class='col-4 text-center border-end'>
                            <small class='text-muted d-block'>Marks</small>
                            <span class='fw-bold'>{$pt['m']}</span>
                        </div>
                        <div class='col-4 text-center'>
                            <small class='text-muted d-block'>Time</small>
                            <span class='fw-bold'>{$pt['t']}m</span>
                        </div>
                    </div>
                    <button class='btn btn-primary w-100 rounded-pill fw-bold'>Start Test</button>
                </div>
            </div>";
        }
        ?>
    </div>
</section>

<section class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="bg-white p-5 shadow-sm rounded-4 border">
                <h2 class="fw-bold mb-4">How to Master Competitive Exams: A Strategic Guide</h2>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                    Preparing for government jobs in India requires more than just rote learning. In 2026, the <strong>Staff Selection Commission (SSC)</strong> and <strong>Banking Boards (IBPS)</strong> have shifted toward conceptual clarity. At <strong>examHUB</strong>, our educational research team meticulously designs each mock test to reflect the latest negative marking schemes and time constraints.
                </p>
                
                <h3 class="fw-bold mt-5 mb-3 h4">The Role of Mock Tests in Speed & Accuracy</h3>
                <p>Mock tests serve as a diagnostic tool. By attempting our <strong>10 free mock tests</strong> available for every category, you identify your weak spots in Quantitative Aptitude and Logical Reasoning. For instance, in the <strong>SSC MTS 2025</strong> exam, speed is the deciding factor. Practicing in a simulated environment helps reduce exam-day anxiety and improves score distribution.</p>

                <div class="my-4 p-4 rounded-3 border-start border-4 border-primary bg-light">
                    <h5 class="fw-bold"><i class="fas fa-lightbulb text-warning me-2"></i> Pro Tip for 2026 Aspirants</h5>
                    <p class="mb-0">Always review the <strong>SSC Exam Calendar 2026</strong> at least 6 months in advance. Consistency in daily quizzes is better than 10-hour study marathons once a week.</p>
                </div>

                <h3 class="fw-bold mt-5 mb-3 h4">Class 10th & 12th: Building the Foundation</h3>
                <p>For students in <strong>Class 10th and 12th</strong>, we offer subject-specific mock tests. Whether it is Physics, Chemistry, or Mathematics, our questions are aligned with the latest CBSE and State Board patterns. Transitioning from school exams to competitive formats like <strong>JEE Mains</strong> or <strong>NEET</strong> becomes significantly easier when your fundamentals are tested regularly.</p>
                
                <p class="mt-4">Our platform also provides detailed <strong>Eligibility Criteria</strong> for various defense exams like AFCAT and NDA. Understanding age limits, educational qualifications, and physical standards is vital before you begin your preparation journey. Stay tuned to our <strong>Job Notifications</strong> section for real-time updates on vacancies in Railways, Teaching, and State services.</p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-link me-2"></i> Important Resources</h5>
                    </div>
                    <div class="list-group list-group-flush p-2">
                        <a href="job-notifications.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-1">
                            <i class="fas fa-bullhorn text-danger me-2"></i> Job Notifications 2026
                        </a>
                        <a href="ssc-calendar.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-1">
                            <i class="fas fa-calendar-alt text-primary me-2"></i> SSC Exam Calendar 2026
                        </a>
                        <a href="eligibility.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-1">
                            <i class="fas fa-user-check text-success me-2"></i> Eligibility Criteria
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 rounded-3">
                            <i class="fas fa-file-invoice text-warning me-2"></i> Previous Year Papers
                        </a>
                    </div>
                </div>

                <div class="bg-dark text-white p-4 rounded-4 shadow-sm">
                    <h5><i class="fas fa-envelope-open-text me-2"></i> Newsletter</h5>
                    <p class="small text-secondary">Get the latest exam dates and free study material delivered to your inbox.</p>
                    <input type="email" class="form-control bg-secondary text-white border-0 mb-3" placeholder="Enter Email">
                    <button class="btn btn-primary w-100">Subscribe Now</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container my-5">
    <div class="bg-white p-5 shadow-sm rounded-4 border">
        <h2 class="fw-bold mb-4">Detailed Syllabus Analysis for 2026 Competitive Exams</h2>
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary fw-bold">1. SSC MTS & CGL Syllabus</h4>
                <p>The Staff Selection Commission has revamped its pattern. It now focuses heavily on General Awareness and English. To crack the <strong>SSC MTS 2025</strong>, you must score high in Session 2. Our mock tests provide 10 free full-length papers covering:
                    <ul>
                        <li>Numerical & Mathematical Ability (20 Questions)</li>
                        <li>Reasoning Ability (20 Questions)</li>
                        <li>General Awareness (25 Questions)</li>
                        <li>English Language (25 Questions)</li>
                    </ul>
                </p>
            </div>
            <div class="col-md-6">
                <h4 class="text-primary fw-bold">2. Banking & IBPS Pattern</h4>
                <p>Banking exams like <strong>SBI PO</strong> and <strong>IBPS Clerk</strong> are all about speed. You have only 20 minutes per section in Prelims. Practicing with our <strong>Free Mock Tests</strong> helps you master the 'Skip Strategy'—knowing which questions to leave to save time.</p>
            </div>
        </div>
        
        <h3 class="fw-bold mt-4">Why examHUB Educational Content is Unique?</h3>
        <p>Unlike other platforms, <strong>examHUB</strong> doesn't just give you a score. We provide a 360-degree analysis. Our <strong>Job Notifications</strong> page is updated every 2 hours, and our <strong>Eligibility Criteria</strong> database is checked by retired exam board members. This authoritativeness is why thousands of students trust us daily.</p>
        
        <p class="text-muted small">
            Keywords: Free Mock Test, SSC MTS 2025, JEE Mains Practice, NEET 2026 Free Series, Job Notifications, SSC Calendar, Educational Resources India.
        </p>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Explore Top Exam Categories</h2>
            <div class="bg-primary mx-auto" style="width: 60px; height: 4px; border-radius: 2px;"></div>
        </div>
        <div class="row g-4">
            <?php
            $cats = [
                ['name' => 'Banking', 'desc' => 'SBI PO, IBPS Clerk, RBI', 'icon' => 'fa-building-columns', 'color' => 'primary'],
                ['name' => 'SSC', 'desc' => 'CGL, CHSL, MTS, GD', 'icon' => 'fa-shield', 'color' => 'warning'],
                ['name' => 'Railways', 'desc' => 'RRB NTPC, ALP, Group D', 'icon' => 'fa-train', 'color' => 'success'],
                ['name' => 'Engineering', 'desc' => 'JEE Mains, GATE, ESE', 'icon' => 'fa-gear', 'color' => 'danger']
            ];
            foreach($cats as $c) {
                echo "
                <div class='col-md-3'>
                    <div class='card border-0 shadow-sm h-100 p-3'>
                        <div class='card-body'>
                            <div class='text-{$c['color']} mb-3'><i class='fas {$c['icon']} fa-2x'></i></div>
                            <h5 class='fw-bold'>{$c['name']}</h5>
                            <p class='text-muted small mb-3'>{$c['desc']}</p>
                            <a href='exam/index.php?cat=".strtolower($c['name'])."' class='btn btn-light btn-sm w-100 rounded-pill'>View 10+ Mocks</a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>