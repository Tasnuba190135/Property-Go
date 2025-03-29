<?php
include_once '../php-class-file/SessionManager.php';
$session = new Session();
$session->destroy();
echo "<script>location.href = 'login.php';</script>";

?>

<!-- end of the file -->