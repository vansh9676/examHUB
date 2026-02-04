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

// Generate initials (e.g., "Rahul Kumar" -> "RK")
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
        
        <div class="ms-auto d-flex align-items-center">
            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="dropdown">
                    <div class="profile-dp shadow-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                        <?php echo strtoupper(substr($userInitials, 0, 2)); ?>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 p-2" style="border-radius: 15px; min-width: 220px;">
                        <li class="p-3 text-center border-bottom mb-2">
                            <div class="profile-dp-large mx-auto mb-2"><?php echo strtoupper(substr($userInitials, 0, 2)); ?></div>
                            <h6 class="mb-0 fw-bold"><?php echo $_SESSION['user_name']; ?></h6>
                            <small class="text-muted">ID: #<?php echo $_SESSION['user_id']; ?></small>
                        </li>
                        <li><a class="dropdown-item rounded-3 py-2" href="/examHUB/my-results.php"><i class="fas fa-poll me-2 text-primary"></i> My Results</a></li>
                        <li><a class="dropdown-item rounded-3 py-2" href="#"><i class="fas fa-user-edit me-2 text-primary"></i> Edit Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item rounded-3 py-2 text-danger" href="/examHUB/auth/logout.php"><i class="fas fa-sign-out-alt me-2"></i> Sign Out</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="/examHUB/auth/login.php" class="btn btn-outline-primary rounded-pill px-4 me-2 fw-bold">Login</a>
                <a href="/examHUB/auth/login.php" class="btn btn-primary rounded-pill px-4 fw-bold">Join Free</a>
            <?php endif; ?>
        </div>
    </div>
</nav>