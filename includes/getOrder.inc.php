<?php
session_start();

// Check if the user is logged in and obtain the user ID from the session
if (isset($_SESSION["userID"])) {
    $userId = $_SESSION["userID"];

    require_once "dbh.inc.php";

    // Define variables to store user information
    $userAddress = "";

    // Retrieve user's address from the database
    $sqlUser = "SELECT usersAddress FROM tblusers WHERE usersId = ?";
    $stmtUser = $conn->prepare($sqlUser);
    $stmtUser->bind_param("s", $userId);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser->num_rows === 1) {
        $rowUser = $resultUser->fetch_assoc();
        $userAddress = $rowUser["usersAddress"];
    } else {
        $userAddress = "";
    }
    // Close the user info database connection
    $stmtUser->close();

    // Retrieve orders for the specific user from the database
    $orders = [];

    $sql = "SELECT orderId, orderPrice, numberOfProducts FROM tblorders WHERE userId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Add each order to the $orders array
            $orders[] = [
                "orderId" => $row["orderId"],
                "totalPrice" => $row["orderPrice"],
                "orderNumberOfItems" => $row["numberOfProducts"]
            ];
        }
    }

    // Close the orders database connection
    $stmt->close();
    $conn->close();

    // Combine user data and orders data into an array
    $userData = [
        "userAddress" => $userAddress,
        "orders" => $orders
    ];

    // Return the combined data as JSON
    header("Content-Type: application/json");
    echo json_encode($userData);
} else {
    // User is not logged in, set 401 status code
    http_response_code(401);
    echo "User not logged in.";
}