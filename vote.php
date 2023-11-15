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
    <?php
    require_once "db_connect.php";
    $voter_id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id = $voter_id";
    $result = mysqli_query($db_connect, $query);
    $row = mysqli_fetch_assoc($result);
    $image = $row['photo'];
    $name = $row['name'];
    $email = $row['email'];
    $status = $row['status'];
    $candidate = mysqli_query($db_connect, "SELECT * FROM user WHERE role = 'Candidate'");
    $candidateData = mysqli_fetch_all($candidate, MYSQLI_ASSOC);
    $_SESSION['userData'] = $row;
    $_SESSION['candidateData'] = $candidateData;

    if ($_SESSION['userData']['status'] == 0) {
        $msg = '<b style="color: red">Not Voted</b>';
    } else {
        $msg = '<b style="color: green">Voted</b>';
    }

    ?>
    <main>
        <h1>Vote For Your Candidate</h1>
        <div class="underline"></div><br>
        <div class="voting-container">
            <div class="v-profile">
                <img src="<?php echo 'uploads/' . $image ?>" alt="">
                <b>Name: <?php echo $name; ?></b>
                <b>Email: <?php echo $email; ?></b>
                <b>Status: <?php echo $msg; ?></b>
            </div>

            <?php
            if ($_SESSION['candidateData']) {
                for ($i = 0; $i < count($candidateData); $i++) {
            ?>
                    <div class="c-container">
                        <div class="profile">
                            <img src="uploads/<?php echo $candidateData[$i]['photo']; ?>" alt="">
                        </div>
                        <div class="desc">
                            <div class="desc-wrapper">
                                <h3>Name: <?php echo $candidateData[$i]['name']; ?></h3><br>
                                <h3>Total Votes: <?php echo $candidateData[$i]['votes']; ?></h3>
                                <form action="vote-script.php" method="POST">
                                    <input type="hidden" name="cvotes" value="<?php echo $candidateData[$i]['votes']; ?>">
                                    <input type="hidden" name="cid" value="<?php echo $candidateData[$i]['id']; ?>">
                                    <?php
                                    if ($_SESSION['userData']['status'] == 0) {
                                    ?>
                                        <input type="submit" name="votebtn" value="Vote" id=votebtn>
                                    <?php
                                    } else {
                                    ?>
                                        <button disabled type="button" name="votebtn" value="Vote" id=voted>Voted</button>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </main>
</body>

</html>