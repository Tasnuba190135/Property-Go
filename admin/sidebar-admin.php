<?php
include_once '../php-class-file/SessionManager.php';
$session = SessionStatic::class;
// Dynamically determine the directory of this navbar file.
$navbarDir = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__)) . '/';

// if the logout button pressed
if (isset($_GET['logout']) == 1) {
    $session::destroy();
    unset($_GET['logout']);
    // Redirect to the homepage using JavaScript.
    echo '<script type="text/javascript"> window.location.href = "login.php"; </script>';
    exit;
}
?>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <h4 class="text-center my-4">Admin Dashboard</h4>
    <a href="<?= $navbarDir ?>admin-dashboard.php"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</a>
    <a href="<?= $navbarDir ?>view-admin-profile.php"><i class="fas fa-tachometer-alt me-2"></i>View Profile</a>
    <a href="<?= $navbarDir ?>edit-admin-profile.php"><i class="fas fa-tachometer-alt me-2"></i>Edit Profile</a>
    <a href="<?= $navbarDir ?>change-password.php"><i class="fas fa-tachometer-alt me-2"></i>Change Password</a>
    <a href="<?= $navbarDir ?>user-review.php"><i class="fas fa-tachometer-alt me-2"></i> User Review</a>
    <a href="<?= $navbarDir ?>user-management.php"><i class="fas fa-tachometer-alt me-2"></i> User Management</a>
    <a href="<?= $navbarDir ?>deleted-user-account.php"><i class="fas fa-tachometer-alt me-2"></i>Delete or retrieve User account</a>
    <a href="<?= $navbarDir ?>admin-review.php"><i class="fas fa-tachometer-alt me-2"></i> Admin Review</a>
    <a href="<?= $navbarDir ?>admin-management.php"><i class="fas fa-tachometer-alt me-2"></i> Admin Management</a>
    <a href="<?= $navbarDir ?>deleted-admin-account.php"><i class="fas fa-tachometer-alt me-2"></i>Delete or retrieve Admin account</a>
   
    <!-- <a href="<//?=$navbarDir ?>edit-user-info.php"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Client's Information</a> -->
    <a href="<?= $navbarDir ?>property-review.php"><i class="fas fa-layer-group me-2"></i>Property Review</a>
    <a href="<?= $navbarDir ?>property-management.php"><i class="fas fa-lock me-2"></i> Property Management</a>
    <a href="<?= $navbarDir ?>pending-property-update.php"><i class="fas fa-lock me-2"></i> Review Property Update</a>
    <a href="?logout=1" class="mt-auto text-center logout-btn">
        <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>
</div>

</div>