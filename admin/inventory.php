<?php
include_once "admin-dashboard.php";
require_once "../includes/dbh.inc.php";

$sql = "SELECT * FROM tblProducts";
$result = $conn->query($sql);

// Start the output buffer
ob_start();

if ($result->num_rows > 0) {
    // Output data into the table
    echo "<div class='tblcontainer'>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Selling Price</th>
                <th>Available Stock</th>
                <th>Discount(%)</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["productID"] . "</td>
            <td>" . $row["productName"] . "</td>
            <td><input class='Input editable' id='productPrice_" . $row["productID"] . "' value='" . $row["productPrice"] . "' readonly><button class='updateButton' data-input='productPrice_" . $row["productID"] . "'>Update</button></td>
            <td><input class='Input editable' id='productQuantity_" . $row["productID"] . "' value='" . $row["productQuantity"] . "' readonly><button class='updateButton' data-input='productQuantity_" . $row["productID"] . "'>Update</button></td>
            <td><input class='Input editable' id='productDiscount_" . $row["productID"] . "' value='" . $row["productDiscount"] . "' readonly><button class='updateButton' data-input='productDiscount_" . $row["productID"] . "'>Update</button></td>
        </tr>";
    }

    echo "</table></div>";
} else {
    echo "No data found in tblProducts.";
}

// Get the output buffer content
$content = ob_get_clean();

// Close the database connection
$conn->close();

// Output the content
echo $content;
?>
<script src="../js/admin/inventory.js"></script>