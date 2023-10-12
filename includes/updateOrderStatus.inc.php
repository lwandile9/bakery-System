<?php
include_once "dbh.inc.php";

// Check if orderId and newStatus are set in the POST request
if (isset($_POST['orderId'], $_POST['newStatus'])) {

  
    $orderId = intval($_POST['orderId']);
    $newStatus = $_POST['newStatus'];

    // Prepare and execute the SQL update statement
    $query = "UPDATE tblorders SET orderStatus = ? WHERE orderId = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $newStatus, $orderId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Order status updated successfully
            $response = array("success" => true, "message" => "Order status updated successfully");
        } else {
            // Error updating order status
            $response = array("success" => false, "message" => "Error updating order status");
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the SQL statement
        $response = array("success" => false, "message" => "Error preparing the SQL statement");
    }
} else {
    // Missing orderId or newStatus in POST request
    $response = array("success" => false, "message" => "Missing orderId or newStatus in POST request");
}


mysqli_close($conn);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
