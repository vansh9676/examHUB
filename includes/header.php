<?php include_once(dirname(__DIR__) . '/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> | India's Most Loved Mock Test Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.css">
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate initials for the profile picture
$userInitials = "";
if(isset($_SESSION['user_name'])) {
    $words = explode(" ", $_SESSION['user_name']);
    foreach ($words as $w) {
        if(!empty($w)) $userInitials .= mb_substr($w, 0, 1);
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-3" href="/examHUB/index.php">examHUB</a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-2">
                <li class="nav-item"><a class="nav-link fw-bold text-dark px-3" href="/examHUB/index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold text-dark px-3" href="#" role="button" data-bs-toggle="dropdown">Exams</a>
                    <ul class="dropdown-menu border-0 shadow mt-2">
                        <li><a class="dropdown-item" href="/examHUB/exam/view-mocks.php?cat=ssc">SSC Exams</a></li>
                        <li><a class="dropdown-item" href="/examHUB/exam/view-mocks.php?cat=banking">Banking</a></li>
                        <li><a class="dropdown-item" href="/examHUB/exam/view-mocks.php?cat=railway">Railways</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/examHUB/exam/index.php">All Test Series</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark px-3" href="/examHUB/includes/job-notifications.php">Jobs</a></li>
            </ul>
            
            <div class="d-lg-none mt-3 border-top pt-3">
                <?php if(!isset($_SESSION['user_id'])): ?>
                    <a href="/examHUB/auth/login.php" class="btn btn-outline-primary w-100 mb-2 rounded-pill">Login</a>
                    <a href="/examHUB/auth/login.php" class="btn btn-primary w-100 rounded-pill">Join Free</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="ms-auto d-none d-lg-flex align-items-center">
            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="dropdown">
                    <div class="profile-dp shadow-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; width: 40px; height: 40px; background: #0d6efd; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                        <?php echo strtoupper(substr($userInitials, 0, 2)); ?>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 p-2" style="border-radius: 15px; min-width: 220px;">
                        <li class="p-3 text-center border-bottom mb-2">
                            <h6 class="mb-0 fw-bold"><?php echo $_SESSION['user_name']; ?></h6>
                            <small class="text-muted">ID: #<?php echo $_SESSION['user_id']; ?></small>
                        </li>
                        <li><a class="dropdown-item rounded-3 py-2" href="/examHUB/my-results.php"><i class="fas fa-poll me-2 text-primary"></i> My Results</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item rounded-3 py-2 text-danger" href="/examHUB/auth/logout.php"><i class="fas fa-sign-out-alt me-2"></i> Sign Out</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="/examHUB/auth/login.php" class="btn btn-outline-primary rounded-pill px-4 me-2 fw-bold">Login</a>
                <a href="/examHUB/auth/login.php" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Join Free</a>
            <?php endif; ?>
        </div>
    </div>
</nav>