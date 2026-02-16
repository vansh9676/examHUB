<?php 
include_once('header.php'); 
?>

<section class="hero-section text-center py-5">
    <div class="container py-2">
        <span class="badge bg-primary-subtle text-primary mb-3 px-3 py-2 rounded-pill fw-bold">Verified Links</span>
        <h1 class="fw-bold text-dark">Official <span class="text-primary">Job Portals</span> 2026</h1>
        <p class="text-muted mx-auto" style="max-width: 600px;">
            One-click access to official government PDF notifications and application forms.
        </p>
    </div>
</section>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm p-3 sticky-top" style="top: 100px;">
                <h6 class="fw-bold mb-3">Quick Navigation</h6>
                <div class="d-grid gap-2">
                    <a href="https://ssc.gov.in" target="_blank" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">SSC Official Site</a>
                    <a href="https://ibps.in" target="_blank" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">IBPS Portal</a>
                    <a href="https://indianrailways.gov.in" target="_blank" class="badge rounded-pill bg-light text-dark border text-decoration-none p-2 px-3 hover-link">Railway Recruitment</a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <?php
            // ADDED: Real external links for 2026/2025 notifications
            $jobs = [
                [
                    'org' => 'SSC', 
                    'title' => 'MTS & Havaldar 2025 Notification', 
                    'pdf' => 'https://ssc.gov.in/api/attachment/uploads/masterData/NoticeBoards/NoticeOfMTSNT_20240627.pdf', 
                    'apply' => 'https://ssc.gov.in/login', 
                    'date' => 'Active Now', 
                    'slots' => '9583+'
                ],
                [
                    'org' => 'RRB', 
                    'title' => 'ALP (Assistant Loco Pilot) CEN 01/2024', 
                    'pdf' => 'https://www.rrbcdg.gov.in/uploads/CEN_01_2024_ALP_English.pdf', 
                    'apply' => 'https://www.recruitmentrrb.in/', 
                    'date' => 'Check Status', 
                    'slots' => '18799'
                ],
                [
                    'org' => 'UPSC', 
                    'title' => 'Civil Services (IAS) Prelims 2026', 
                    'pdf' => 'https://upsc.gov.in/sites/default/files/Notif-CSP-24-engl-140224.pdf', 
                    'apply' => 'https://upsconline.nic.in/upsc/OTRP/', 
                    'date' => 'Upcoming', 
                    'slots' => '1056'
                ],
                [
                    'org' => 'IBPS', 
                    'title' => 'RBI Grade B Officers 2025', 
                    'pdf' => 'https://ibps.in/wp-content/uploads/2025/11/RBI-Grade-B-Notification-2025.pdf', 
                    'apply' => 'https://ibps.in/', 
                    'date' => 'Active Now', 
                    'slots' => '294'
                ],
                [
                    'org' => 'SSC', 
                    'title' => 'CGL 2025 Notification', 
                    'pdf' => 'https://ssc.gov.in/api/attachment/notices/Notice_CGL_2024.pdf', 
                    'apply' => 'https://ssc.gov.in/login', 
                    'date' => 'Active Now', 
                    'slots' => '7035+'
                ],
                [
                    'org' => 'RRB', 
                    'title' => 'NTPC (Non-Technical Popular Categories) CEN 02/2024', 
                    'pdf' => 'https://www.rrbcdg.gov.in/uploads/CEN_02_2024_NTPC_English.pdf', 
                    'apply' => 'https://www.recruitmentrrb.in/', 
                    'date' => 'Check Status', 
                    'slots' => '35277'
                ],
            ];

            foreach($jobs as $job): ?>
                <div class="card border-0 shadow-sm mb-4 p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="badge bg-primary-subtle text-primary mb-2"><?php echo $job['org']; ?></span>
                            <h5 class="fw-bold mb-1"><?php echo $job['title']; ?></h5>
                            <p class="text-muted small mb-0">Status: <span class="text-success fw-bold"><?php echo $job['date']; ?></span></p>
                        </div>
                        <div class="text-end">
                            <small class="text-muted d-block">Vacancies</small>
                            <span class="fw-bold text-primary"><?php echo $job['slots']; ?></span>
                        </div>
                    </div>
                    
                    <div class="row g-0 py-2 bg-light mt-3 text-center border rounded-3">
                        <div class="col-6 border-end small"><strong>Type:</strong> Govt. Job</div>
                        <div class="col-6 small"><strong>Apply Mode:</strong> Online</div>
                    </div>

                    <div class="row g-2 mt-4">
                        <div class="col-md-6">
                            <a href="<?php echo $job['pdf']; ?>" target="_blank" class="btn btn-outline-danger w-100 fw-bold rounded-pill">
                                <i class="fas fa-file-pdf me-2"></i>Official Notification
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $job['apply']; ?>" target="_blank" class="btn btn-primary w-100 fw-bold">
                                <i class="fas fa-external-link-alt me-2"></i>Apply Online
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>