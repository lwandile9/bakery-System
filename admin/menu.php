<?php include_once "admin-dashboard.php";?>
<main>
  <h1 class="active-menu">Update Menu:</h1>
  
<?php
require_once "../includes/dbh.inc.php";
$sql = "SELECT productID, productName, productImage, productCatagory FROM tblProducts";
$result = $conn->query($sql);

ob_start();

if ($result->num_rows > 0) {
    echo "<section id='menu-container'>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["productID"] . "</td>
            <td>
                <input class='Input editable' id='productName_" . $row["productID"] . "' value='" . $row["productName"] . "' readonly>
                <button class='updateButton' data-input='productName_" . $row["productID"] . "'>Update</button>
            </td>
            <td>
                <div class='img-path'><input class='Input pic editable' id='productImage_" . $row["productID"] . "' value='" . $row["productImage"] . "' readonly></div>
                <button class='updateButton' data-input='productImage_" . $row["productID"] . "'>Update</button>
            </td>
            <td>
                <input class='Input editable' id='productCatagory_" . $row["productID"] . "' value='" . $row["productCatagory"] . "' readonly>
                <button class='updateButton' data-input='productCatagory_" . $row["productID"] . "'>Update</button>
            </td>
        </tr>";
    }

    echo "</table></section>";
}

// Flush the output buffer
ob_end_flush();
$conn->close();
?>
</main>
    <footer></footer>
    
    <script src="../js/admin/menu.js"></script>
</body>
</html>