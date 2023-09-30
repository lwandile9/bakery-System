<?php
// Assuming you have a database connection established earlier
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
        // Add more cases for other input names if needed
    }

    if (!empty($fieldName)) {
        // Prepare and execute the SQL query to update the database
        $sql = "UPDATE tblProducts SET $fieldName = ? WHERE productID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $updatedValue, $productId);

        if ($stmt->execute()) {
            // Database update was successful
            echo "Data updated successfully.";
        } else {
            // Handle errors and log the error message
            echo "Error updating data: " . mysqli_error($conn);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Invalid input name
        echo "Invalid input name.";
    }
} else {
    // Invalid request method
    echo "Invalid request methodsss.";
}

// Close the database connection
$conn->close();