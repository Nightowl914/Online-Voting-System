<?php
session_start(); // start session
$id = $_GET["id"] ?? "";
// check if user is logged in as admin
if (!isset($_SESSION['name']) == 'Admin') {
    header("Location: login.php"); // redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Voting System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="home-bg">
    <main>
        <div class="cancel-btn">
            <a href="admin.php">Cancel</a>
        </div>
        <div class="form-container-info">
            <h3 class="signup">Edit Information For ID: <?= $id ?></h3>
            <form action="edit-info-script.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" class="input-field" name="name" placeholder="Username" />
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" class="input-field" name="email" placeholder="Email" />
                </div>
                <button class="signup-btn" type="submit" name="submit">Update</button>
            </form>
        </div>
    </main>

    <script>
        function visibility() {
            var click = document.getElementById("pwd-input");
            var eyeOpen = document.getElementById("visible");
            var eyeClose = document.getElementById("hidden");

            if (click.type === "password") {
                click.type = "text";
                eyeOpen.style.display = "block";
                eyeClose.style.display = "none";
            } else {
                click.type = "password";
                eyeOpen.style.display = "none";
                eyeClose.style.display = "block";
            }
        }

        function cVisibility() {
            var click = document.getElementById("c-pwd-input");
            var eyeOpen = document.getElementById("c-visible");
            var eyeClose = document.getElementById("c-hidden");

            if (click.type === "password") {
                click.type = "text";
                eyeOpen.style.display = "block";
                eyeClose.style.display = "none";
            } else {
                click.type = "password";
                eyeOpen.style.display = "none";
                eyeClose.style.display = "block";
            }
        }
    </script>
</body>

</html>