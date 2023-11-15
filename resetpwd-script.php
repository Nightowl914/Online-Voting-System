<?php
session_start();
include_once "db_connect.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $confirm_password = $_POST['c-pwd'];
    $login_role = $_POST['login-role'];

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($login_role)) {
        echo '
        <script>
            alert("All fields are required.");
            window.location = "resetpwd.php";
        </script>';
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
        <script>
            alert("Invalid email address.");
            window.location = "resetpwd.php";
        </script>';
        exit();
    } elseif ($password !== $confirm_password) {
        echo '
        <script>
            alert("Passwords do not match.");
            window.location = "resetpwd.php";
        </script>';
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE name = ? AND email = ? AND role = ?";
        $stmt = mysqli_stmt_init($db_connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo '
            <script>
                alert("SQL Error.");
                window.location = "resetpwd.php";
            </script>';
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $login_role);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
                echo '
                <script>
                    alert("Invalid username or email or user role.");
                    window.location = "resetpwd.php";
                </script>';
                exit();
            } else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = ? WHERE name = ? AND email = ?";
                $stmt = mysqli_stmt_init($db_connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo '
                    <script>
                        alert("SQL Error.");
                        window.location = "resetpwd.php";
                    </script>';
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sss", $hashedPwd, $name, $email);
                    mysqli_stmt_execute($stmt);
                    echo '
                    <script>
                        alert("Password updated successfully.");
                        window.location = "login.php";
                    </script>';
                    exit();
                }
            }
        }
    }
} else {
    header("Location: resetpwd.php");
    exit();
}
