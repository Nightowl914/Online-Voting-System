<?php
// check if user is logged in as admin
if (!isset($_SESSION['name']) == 'Admin') {
    header("Location: login.php"); // redirect to login page if not logged in
    exit();
}

$sql = "SELECT id, name, email FROM user WHERE role = 'Candidate'";

// Execute the query
$result = mysqli_query($db_connect, $sql);

// Loop through the result set and display the data in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<th scope='row'>" . $row["id"] . "</th>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>";
    echo "<a href='edit-info.php?id=" . $row["id"] . "' class='btn btn-success edit-btn'>Edit</a>";
    echo "<a href='delete-script.php?id=" . $row["id"] . "' class='btn btn-primary del-btn'>Delete</a>";
    echo "</td>";
    echo "</tr>";
}
