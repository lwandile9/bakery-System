<?php
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the AJAX request
    
    $productId = $_POST["productId"];
    $inputId = $_POST["inputName"];
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
       
    }

    if (!empty($fieldName)) {
       
        $sql = "UPDATE tblProducts SET $fieldName = ? WHERE productID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $updatedValue, $productId);

        if ($stmt->execute()) {
            
            echo "Data updated successfully.";
        } else {
           
            echo "Error updating data: " . mysqli_error($conn);
        }

        
        $stmt->close();
    } else {
     
        echo "Invalid input name.";
    }
} else {
    
    echo "Invalid request methodsss.";
}


$conn->close();