<?php
session_start(); // Always start the session to access session variables

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../views/index.php");
    exit;
}
?>
