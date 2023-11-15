<!DOCTYPE html>
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

<body class="home-bg">
    <?php include "header-login.php"; ?>
    <main>
        <h1>RESULT</h1>
        <div class="result-container">
            <?php
            include "db_connect.php";
            $sql = "SELECT * FROM user WHERE role = 'Candidate' ORDER BY votes DESC";
            $result = $db_connect->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="result-section">
                    <div class="profile">
                        <img src="uploads/<?php echo $row["photo"]; ?>" alt="<?php echo $row["name"]; ?>">
                    </div>
                    <div class="desc">
                        <div class="desc-wrapper">
                            <h3>Name: <?php echo $row["name"]; ?></h3><br>
                            <h3>Total Votes: <?php echo $row["votes"]; ?></h3>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>