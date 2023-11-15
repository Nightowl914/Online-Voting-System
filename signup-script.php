<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cPwd = $_POST['c-pwd'];
    $role = $_POST['login-role'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    // Validate name
    if (empty($name)) {
        echo '
            <script>
                alert("Please enter your name!");
                window.location = "signup.php";
            </script>
            ';
        exit();
    } else if (strlen($name) < 2) {
        echo '
            <script>
                alert("Name should be at least 2 characters!");
                window.location = "signup.php";
            </script>
            ';
        exit();
    } else if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $name)) {
        echo '
            <script>
                alert("Name should not contain any special characters!");
                window.location = "signup.php";
            </script>
            ';
        exit();
    }

    // Check if email is empty or invalid
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
            <script>
                alert("Please enter a valid email address!");
                window.location = "signup.php";
            </script>
            ';
        exit();
    }

    // Check if the email already exists
    require_once 'db_connect.php';

    $stmt = mysqli_prepare($db_connect, "SELECT * FROM user WHERE email = ? OR name = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo '
             <script>
                 alert("An account with that email address and name already exists!");
                 window.location = "signup.php";
             </script>
             ';
        exit();
    }

    // Check if an image was uploaded
    if (!empty($image) && isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $extension = pathinfo($image, PATHINFO_EXTENSION);

        // Check if the file extension is allowed
        if (!in_array($extension, $allowed_extensions)) {
            echo '
            <script>
                alert("Invalid file format! Only JPG, JPEG, PNG, and GIF images are allowed.");
                window.location = "signup.php";
            </script>
            ';
            exit();
        }

        // Check if the file size is within the limit
        if ($_FILES['photo']['size'] > 2000000) {
            echo '
            <script>
                alert("File size is too large! Maximum file size allowed is 2MB.");
                window.location = "signup.php";
            </script>
            ';
            exit();
        }

        // Move the uploaded image to the "uploads" folder
        $image = time() . '_' . $image;
        move_uploaded_file($tmp_name, "uploads/$image");
    } else {
        $image = '';
    }

    // Validate role
    if ($role == 'Choose a role') {
        echo '
        <script>
            alert("Please choose a role!");
            window.location = "signup.php";
        </script>
        ';
        exit();
    } elseif ($role != 'Candidate' && $role != 'Voter' && $role != 'Admin') {
        echo '
        <script>
            alert("Invalid role selected!");
            window.location = "signup.php";
        </script>
        ';
        exit();
    }


    require_once 'db_connect.php';

    if ($pwd == $cPwd) {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($db_connect, "INSERT INTO user (name, email, password, photo, role, status, votes) VALUES (?, ?, ?, ?, ?, 0, 0)");
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedPwd, $image, $role);
        $insert = mysqli_stmt_execute($stmt);

        if ($insert) {
            echo '
            <script>
                alert("Registration Successful!");
                window.location = "login.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("There was an error while processing your registration!");
                window.location = "signup.php";
            </script>
            ';
        }
    } else {
        echo '
        <script>
            alert("Password and confirm password does not match!");
            window.location = "signup.php";
        </script>
        ';
    }
}
