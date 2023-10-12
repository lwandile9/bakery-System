<?php
session_start(); 
require_once "dbh.inc.php";
require_once "functions.inc.php";
// Get the user ID from the PHP session
$userID = $_SESSION['userID']; 

// Get the product ID and product quantity from the POST request
$productID = sanitizeInput($_POST['productID']);
$productQuantity =sanitizeInput($_POST['productQuantity']);



// Check if the product already exists in the cart
$stmt = $conn->prepare("SELECT productId, productQuantity FROM tblcart WHERE userId = ? AND productId = ?");
$stmt->bind_param("ii", $userID, $productID);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // The product already exists then quantity + 1
    $stmt->bind_result($existingProductID, $existingQuantity);
    $stmt->fetch();
    $newQuantity = $existingQuantity + $productQuantity;

    $updateStmt = $conn->prepare("UPDATE tblcart SET productQuantity = ? WHERE userId = ? AND productId = ?");
    $updateStmt->bind_param("iii", $newQuantity, $userID, $productID);

    if ($updateStmt->execute()) {
        // Returning a JSON response indicating success
        $response = ['success' => true];
        echo json_encode($response);
    } else {
        // Returning a JSON response indicating failure
        $response = ['success' => false, 'error' => $conn->error];
        echo json_encode($response);
    }

    $updateStmt->close();
} else {
    // The product does not exist in the cart, so insert it
    $insertStmt = $conn->prepare("INSERT INTO tblcart (userId, productId, productQuantity) VALUES (?, ?, ?)");
    $insertStmt->bind_param("iii", $userID, $productID, $productQuantity);

    if ($insertStmt->execute()) {
        // Return a JSON response indicating success
        $response = ['success' => true];
        echo json_encode($response);
    } else {
        // Return a JSON response indicating failure
        $response = ['success' => false, 'error' => $conn->error];
        echo json_encode($response);
    }

    $insertStmt->close();
}

$stmt->close();
$conn->close();
