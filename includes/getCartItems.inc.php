<?php
session_start();
require_once "dbh.inc.php";
$userId = $_SESSION['userID'];

// Initialize an associative array to store product information
$productInfo = array();

// Prepare and execute the query to fetch cart items
$stmt = $conn->prepare("SELECT cartId, productId, productQuantity FROM tblcart WHERE userId = ?");
$stmt->bind_param("s", $userId); 
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch data and store in the associative array
while ($row = $result->fetch_assoc()) {
    $cartId = $row['cartId'];
    $productId = $row['productId'];
    $productQuantity = $row['productQuantity'];

    // Fetch product details from tblproducts
    $productQuery = "SELECT productName, productPrice ,productImage FROM tblproducts WHERE productId = ?";
    $productStmt = $conn->prepare($productQuery);
    $productStmt->bind_param("s", $productId);
    $productStmt->execute();
    $productResult = $productStmt->get_result();

    if ($productRow = $productResult->fetch_assoc()) {
        $productName = $productRow['productName'];
        $productPrice = $productRow['productPrice'];
        $productImag = $productRow['productImage'];

        // Calculate product total price
        $productTotalPrice = $productQuantity * $productPrice;

        // Add product information to the associative array
        $productInfo[$productId] = array(
            "cartId" => $cartId,
            "productName" => $productName,
            "quantity" => $productQuantity,
            "totalPrice" => $productTotalPrice,
            "productImage" => $productImag
        );
    }

    // Close the product query statement
    $productStmt->close();
}

// Close the database connection for the cart items query
$stmt->close();

// Convert the product information array to JSON
$productInfoJSON = json_encode($productInfo);

// Set JSON content type header
header('Content-Type: application/json');

// Send the JSON response
echo $productInfoJSON;

// Close the main database connection
$conn->close();