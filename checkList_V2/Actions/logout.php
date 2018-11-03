<?php
// Initialize the session.
session_start();
// Unset all of the session variables.
unset($_SESSION['user_id']);
// Finally, destroy the session.
session_destroy();
// Remove cookie variables
$days = 30;
setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));

// Include URL for Login page to login again.
header("Location: ../index.php");
exit;
?>