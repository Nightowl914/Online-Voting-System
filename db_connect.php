<?php

$db_connect = mysqli_connect("localhost", "root", "", "online_voting") or die("connection failed!");

if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}
