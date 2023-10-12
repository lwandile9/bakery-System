<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data sent from JavaScript
    $orderData = json_decode(file_get_contents("php://input"), true);

    // Check if the user is logged in 
    if (isset($_SESSION["userID"])) {
        // Retrieve user ID from the session
        $userid = $_SESSION["userID"];

     require_once "dbh.inc.php";
     require_once "functions.inc.php";


        // Insert data into tblOrders
        $totalPrice = $orderData['totalPrice'];
        $orderDate = $orderData['orderDate'];
        $numberItems = $orderData['numberItems'];
        $currentDate = date("Y-m-d");
        $orderStatus ="waiting-approval";

        $sql = "INSERT INTO tblorders (userID, orderDate, orderPrice,numberOfProducts,orderStatus,orderDeleveryDate) VALUES (?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $userid,$currentDate, $totalPrice,$numberItems,$orderStatus, $orderDate, );

        if ($stmt->execute()) {
            
     // Order inserted successfully
            
                // Delete items from tblcart
                $sqlDelete = "DELETE FROM tblcart WHERE userID = ?";
                $stmtDelete = $conn->prepare($sqlDelete);
                $stmtDelete->bind_param("s", $userid);
                
                if ($stmtDelete->execute()) {
                    // Items deleted from cart
                    echo "Thank you..Go back to home page to add produts for your next order";
                } else {
                    echo "Error deleting items from cart: " . $stmtDelete->error;
                }
            
        } else {
            echo "Error: " . $stmt->error;
        }

        // Closing the statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Please Login to make an order";
    }
}