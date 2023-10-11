<?php
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the AJAX request
    $productId = $_POST["productId"];
    $inputName = $_POST["inputName"];
    $updatedValue = $_POST["updatedValue"];

    // Determine which database field to update based on the input name
    $fieldName = '';
    switch ($inputName) {
        case 'productPrice':
            $fieldName = 'productPrice';
            break;
        case 'productDiscount':
            $fieldName = 'productDiscount';
            break;
        case 'productQuantity':
            $fieldName = 'productQuantity';
            break;
    }

    if (!empty($fieldName)) {
        $sql = "UPDATE tblproducts SET $fieldName = ? WHERE productID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $updatedValue, $productId);

        if ($stmt->execute()) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid input name.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
