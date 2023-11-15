<?php
session_start();
include_once('db_connect.php');

$votes = $_POST['cvotes'];
$total_votes = $votes + 1;
$cid = $_POST['cid'];
$uid = $_SESSION['userData']['id'];

$update_votes = mysqli_query($db_connect, "UPDATE user SET votes = '$total_votes' WHERE id = '$cid' ");
$update_user_status = mysqli_query($db_connect, "UPDATE user SET status = 1 WHERE id = '$uid' ");

if ($update_votes && $update_user_status) {
    $candidate = mysqli_query($db_connect, "SELECT * FROM user WHERE role = 'Candidate'");
    $candidateData = mysqli_fetch_all($candidate, MYSQLI_ASSOC);
    $_SESSION['userData']['status'] = 1;
    $_SESSION['candidateData'] = $candidateData;
    echo '
        <script>
            alert("Voting Successful!");
            window.location = "vote.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Some error occurred!");
            window.location = "vote.php";
        </script>
    ';
}
