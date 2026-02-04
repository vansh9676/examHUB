<?php include '../includes/header.php'; ?>

<div class="container my-5 py-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-7">
            <h1 class="fw-bold text-dark">Unlock Your <span class="text-primary">Full Potential</span></h1>
            <p class="lead text-secondary mb-4">Join over 50,000+ aspirants using examHUB to track their progress and ace competitive exams.</p>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-3 border rounded-4 bg-white shadow-sm">
                        <i class="fas fa-chart-line text-success fa-2x mb-2"></i>
                        <h5 class="fw-bold">Performance Tracking</h5>
                        <p class="small text-muted">Register to save your scores and see your improvement over time with detailed analytics.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 border rounded-4 bg-white shadow-sm">
                        <i class="fas fa-history text-warning fa-2x mb-2"></i>
                        <h5 class="fw-bold">Attempt History</h5>
                        <p class="small text-muted">Review your previous mock tests and re-attempt them to master difficult topics.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 educational-text" style="font-size: 0.95rem; color: #666; line-height: 1.7;">
                <h4 class="text-dark fw-bold">Why a Student Dashboard is Essential for 2026 Exams</h4>
                <p>In the modern era of Computer Based Testing (CBT), simply practicing on paper is not enough. When you log in to <strong>examHUB</strong>, you enter a simulated environment. Our dashboard helps you manage the <strong>SSC Calendar 2026</strong> deadlines and provides tailored <strong>Job Notifications</strong> based on your performance.</p>
                <p>Furthermore, understanding the <strong>Eligibility Criteria</strong> for exams like Banking or Railway becomes easier when your profile is complete. We provide automatic alerts if your age and qualifications match a new government notification.</p>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary py-3">
                    <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-white fw-bold" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white fw-bold" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab">Register</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
                            <form action="process_auth.php?action=login" method="POST">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-3">Sign In</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-register" role="tabpanel">
                            <form action="process_auth.php?action=register" method="POST">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Create a strong password" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold rounded-3">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>