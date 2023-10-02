
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
                    console.log("productId:", productId);
                    console.log("inputId:", inputId);
                    console.log("updatedValue:", updatedValue);
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


