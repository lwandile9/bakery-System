<?php
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST["productId"];
    $inputName = $_POST["inputName"];
    $updatedValue = $_POST["updatedValue"];

    $fieldName = '';
    switch ($inputName) {
        case 'productName':
            $fieldName = 'productName';
            break;
        case 'productImage':
            $fieldName = 'productImage';
            break;
        case 'productCatagory':
            $fieldName = 'productCatagory';
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
?>