<?php
session_start(); // start session

// check if user is logged in as admin
if (!isset($_SESSION['name']) == 'Admin') {
    header("Location: login.php"); // redirect to login page if not logged in
    exit();
}

// include database connection file
include 'db_connect.php';

// check if form is submitted
if (isset($_POST['submit'])) {
    // get and sanitize voter ID
    $id = $_GET['id'];

    // get and sanitize form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // validate form data
    if (empty($name) || empty($email)) {
        echo "
        <script>
            alert('Please fill in all the empty fields!')
            window.location = 'edit-info.php?id=$id';
        </script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
        <script>
            alert('Please enter a valid email address!')
            window.location = 'edit-info.php?id=$id';
        </script>";
        exit();
    }

    // prepare and bind update statement
    $stmt = $db_connect->prepare("UPDATE user SET name=?, email=? WHERE id=? AND role IN ('Voter', 'Candidate')");
    $stmt->bind_param("ssi", $name, $email, $id);

    // execute the statement
    if ($stmt->execute()) {
        echo "
        <script>
            alert('Information updated successfully.')
            window.location = 'admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Error updating voter information.')
            window.location = 'edit-info.php?id=$id';
        </script>";
    }
    $stmt->close();
} else {
    // get and sanitize voter ID
    $id = $_GET['id'];

    echo "<script>alert('Form submission error. Please try again.');
    window.location = 'edit-info.php?id=$id';</script>";
    exit();
}
