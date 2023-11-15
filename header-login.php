<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Online Voting System</title>
</head>
<header>
    <div class="navwrapper">
        <?php
        session_start();
        if (isset($_SESSION['name']) == 'Candidate' || $_SESSION['name'] == 'Voter') {
            echo "
                <div class='logo'>
                    <a href='vote.php' class='logo-text'>E-VOTE</a>
                </div>
                <ul class='navbar'>
                    <li><a href='vote.php'>VOTE</a></li>
                    <li><a href='result-login.php'>RESULT</a></li>
                    <li><a href='about-login.php'>ABOUT</a></li>
                    <li><a href='logout-script.php'>LOGOUT</a></li>
                </ul>";
        } else {
            header("location: login.php");
        }
        ?>
    </div>
</header>
</body>

</html>