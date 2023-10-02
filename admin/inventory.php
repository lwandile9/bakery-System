<?php
require_once "../includes/dbh.inc.php";

$sql = "SELECT * FROM tblProducts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data into the table
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Selling Price</th>
                <th>Available Stock</th>
                <th>Discount(%)</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["productID"] . "</td>
                        <td>" . $row["productName"] . "</td>
                        <td>" . $row["productCatagory"] . "</td>
                        <td><input class='tableInput editable' id='productPrice_" . $row["productID"] . "' value='" . $row["productPrice"] . "' readonly><button class='updateButton' data-input='productPrice_" . $row["productID"] . "'>Update</button></td>
                        <td>" . $row["productQuantity"] . "</td>
                        <td><input class='tableInput editable' id='productDiscount_" . $row["productID"] . "' value='" . $row["productDiscount"] . "' readonly><button class='updateButton' data-input='productDiscount_" . $row["productID"] . "'>Update</button></td>
                    </tr>";
            }

    echo "</table>";
} else {
    echo "No data found in tblProducts.";
}

// Close the database connection
$conn->close();
?>

        