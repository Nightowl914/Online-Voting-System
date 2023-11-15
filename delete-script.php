<?php
session_start(); // start session

// check if user is logged in as admin
if (!isset($_SESSION['name']) == 'Admin') {
    header("Location: login.php"); // redirect to login page if not logged in
    exit();
}

// include database connection file
include 'db_connect.php';

// check if ID is provided in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // delete voter account
    $stmt = $db_connect->prepare("DELETE FROM user WHERE id=? AND role='Voter'");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // delete candidate account
    $stmt = $db_connect->prepare("DELETE FROM user WHERE id=? AND role='Candidate'");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();

    // redirect to admin page
    echo "
        <script>
            alert('Deleted successfully.')
            window.location = 'admin.php';
        </script>";
} else {
    echo "<script>alert('ID not provided. Please try again.');
    window.location = 'admin.php';</script>";
    exit();
}
