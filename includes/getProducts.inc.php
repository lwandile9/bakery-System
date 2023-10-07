<?php
session_start();
require_once "dbh.inc.php";

// SQL query to retrieve product data
$sql = "SELECT * FROM tblproducts";
$result = $conn->query($sql);

if (!$result) {
    // Handle the query error, e.g., log it or return an error message
    echo json_encode(["error" => "Query error: " . $conn->error]);
} else {
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    
    // Check if any products were found
    if (count($products) > 0) {
    
        // Encode the product data as JSON
        $jsonResponse = json_encode($products);
        // Set JSON content type header
        header('Content-Type: application/json');
        // Send the JSON response
        echo $jsonResponse;
    } else {
        // No products found
        echo json_encode(["error" => "No products found."]);
    }
}

// Close the database connection
$conn->close();