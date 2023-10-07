<?php
// Start a session to access session variables
session_start();

// Check if the user is logged in and obtain the user ID from the session
if (isset($_SESSION["userID"])) {
    $userId = $_SESSION["userID"];

    // Include your database connection code (modify the details accordingly)
    require_once "dbh.inc.php";

    // Define an array to store the orders data
    $orders = [];

    // Retrieve orders for the specific user from the database
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

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Return the orders data as JSON
    header("Content-Type: application/json");
    echo json_encode($orders);
} else {
    // User is not logged in, set 401 status code
    http_response_code(401);
    echo "User not logged in.";
}