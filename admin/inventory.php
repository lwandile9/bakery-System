<style>
  table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black; /* Add a border to the table */
    font-family: monospace;
  }

  th, td {
    border: 1px solid black; /* Add a border to the table cells */
    padding: 6px; /* Add padding to the cells to create spacing */
    text-align: left; /* Align text to the left within cells */
    line-height: 1em;
  }
  th{
    background-color: burlywood;
    color: white;
    line-height: 0.7em;
  }
  .tableInput{
    max-width: 30px;
    background-color: darkgray;
     
  }
  .updateButton{
    max-width: 70px;
    font-family: monospace;
    font-weight: 100;
    background-color:yellow ;
    margin-left: 3px;
    border: none;
  }
</style>

<section id="display-section">
            <h1>Recent Orders:</h1>
            <div class="inventory-grid">

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
            </div>



            //String
            <script>
    // Get all the update buttons
    const updateButtons = document.querySelectorAll(".updateButton");

    updateButtons.forEach(button => {
        button.addEventListener("click", () => {
            const inputId = button.getAttribute("data-input");
            const input = document.getElementById(inputId);

            if (button.textContent === "Update") {
                // Switch to edit mode
                button.textContent = "Save";
                input.removeAttribute("readonly");
            } else {
                // Switch to save mode
                button.textContent = "Update";
                input.setAttribute("readonly", "true");

                // Retrieve the updated value
                const updatedValue = input.value;

                // Send the updated value to the server via AJAX
                const productId = inputId.split("_")[1]; // Extract the product ID from the input ID

                // Perform an AJAX request to update the database
               
                fetch("../includes/update.inc.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `productId=${productId}&inputName=${inputId}&updatedValue=${updatedValue}`
                })
                .then(response => {
                    if (response.ok) {
                        
                        alert("Data updated successfully.");
                    } else {
                        
                        alert("Error updating data.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            }
        });
    });
</script>





</section>