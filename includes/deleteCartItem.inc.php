<?php

require_once "dbh.inc.php";

// Get the productID from the POST request
$productID = isset($_POST['productID']) ? $_POST['productID'] : null;

if ($productID !== null) {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM tblcart WHERE productId = ?");
    $stmt->bind_param("i", $productID);

    if ($stmt->execute()) {
        // Successfully deleted the item
        $response = array('success' => true, 'message' => 'Item deleted');
        echo json_encode($response);
    } else {
        // Error occurred while deleting
        $response = array('success' => false, 'message' => 'Error deleting item');
        echo json_encode($response);
    }

    $stmt->close();
} else {
    
    $response = array('success' => false, 'message' => 'Invalid request');
    echo json_encode($response);
}


$conn->close();
