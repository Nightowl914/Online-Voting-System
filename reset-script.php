<?php
session_start(); // start session

// check if user is logged in as admin
if (!isset($_SESSION['name']) == 'Admin') {
    header("Location: login.php"); // redirect to login page if not logged in
    exit();
}

// include database connection file
include 'db_connect.php';

// Reset voter status to zero
$stmt = $db_connect->prepare("UPDATE user SET status=0");
$stmt->execute();

// Reset candidate votes to zero
$stmt = $db_connect->prepare("UPDATE user SET votes=0");
$stmt->execute();

// Redirect back to the main page
echo "
<script>
    alert('Reset Successful!')
    window.location = 'admin.php';
</script>";
exit();
