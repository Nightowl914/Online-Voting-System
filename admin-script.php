<?php
session_start(); // start session

include("db_connect.php"); // include database connection script

// check if user is logged in as admin
if (!isset($_SESSION['name']) == 'Admin') {
    header("Location: login.php"); // redirect to login page if not logged in
    exit();
}

// get total voter count
$query = "SELECT COUNT(*) as total_voters FROM user WHERE role ='Voter'";
$result = mysqli_query($db_connect, $query);
$total_voters = mysqli_fetch_assoc($result)['total_voters'];

// get total candidate count
$query = "SELECT COUNT(*) as total_candidates FROM user WHERE role ='Candidate'";
$result = mysqli_query($db_connect, $query);
$total_candidates = mysqli_fetch_assoc($result)['total_candidates'];

// get candidate with most votes
$query = "SELECT name, votes FROM user WHERE role ='Candidate' ORDER BY votes DESC LIMIT 1";
$result = mysqli_query($db_connect, $query);
$most_voted_candidate = mysqli_fetch_assoc($result);

// check if there are multiple candidates with the same number of votes as the most voted candidate
$query = "SELECT COUNT(*) as num_candidates_with_same_votes FROM user WHERE role ='Candidate' AND votes = {$most_voted_candidate['votes']}";
$result = mysqli_query($db_connect, $query);
$num_candidates_with_same_votes = mysqli_fetch_assoc($result)['num_candidates_with_same_votes'];

if ($most_voted_candidate['votes'] == 0 || $num_candidates_with_same_votes > 1) {
    $most_voted_candidate_name = "";
    $most_voted_candidate_votes = "";
} else {
    $most_voted_candidate_name = $most_voted_candidate['name'];
    $most_voted_candidate_votes = $most_voted_candidate['votes'];
}
