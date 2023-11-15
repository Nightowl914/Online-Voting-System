<?php
session_start();
include_once('db_connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $role = $_POST['login-role'];

    if (empty($name) || empty($pwd) || empty($role)) {
        echo '
        <script>
            alert("Please fill all fields.");
            window.location = "login.php";
        </script>';
        exit();
    } else {
        $stmt = $db_connect->prepare("SELECT * FROM user WHERE (name = ? OR email = ?) AND role = ?");
        $stmt->bind_param("sss", $name, $name, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pwd, $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];

                if ($role === 'Voter') {
                    echo "<script> alert('Welcome " . $_SESSION['name'] . "');
                    window.location = 'vote.php';</script>";
                } else if ($role === 'Candidate') {
                    echo "<script> alert('Welcome " . $_SESSION['name'] . "');
                    window.location = 'vote.php';</script>";
                } else if ($role === 'Admin') {
                    echo "<script> alert('Welcome " . $_SESSION['name'] . "');
                    window.location = 'admin.php';</script>";
                }
                exit();
            } else {
                echo '
                <script>
                    alert("Invalid Password");
                    window.location = "login.php";
                </script>';
                exit();
            }
        } else {
            echo '
            <script>
                alert("Invalid Login Credentials");
                window.location = "login.php";
            </script>';
            exit();
        }
    }
}
