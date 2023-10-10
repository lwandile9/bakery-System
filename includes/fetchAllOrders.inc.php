<?php
include_once "dbh.inc.php";

// Fetch orders with user addresses
$query = "SELECT o.*, u.usersAddress FROM tblorders AS o
          JOIN tblusers AS u ON o.userID = u.usersID";

$result = mysqli_query($conn, $query);

$ordersData = array();

while ($row = mysqli_fetch_assoc($result)) {
    $ordersData[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($ordersData);