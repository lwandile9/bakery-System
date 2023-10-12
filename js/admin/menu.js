const updateButtons = document.querySelectorAll(".updateButton");

updateButtons.forEach(button => {
    button.addEventListener("click", () => {
        const inputId = button.getAttribute("data-input");
        const inputType = inputId.split("_")[0]; // Extract the input type (e.g., productName, productImage, productCategory)
        const productId = inputId.split("_")[1]; // Extract the product ID
        const input = document.getElementById(inputId);

        if (button.textContent === "Update") {
            // Switch to edit mode
            button.textContent = "Save";
            input.removeAttribute("readonly");
            input.classList.add("edit");
        } else {
            // Switch to save mode
            button.textContent = "Update";
            input.setAttribute("readonly", "true");
            input.classList.remove("edit");

            // Retrieve the updated value
            const updatedValue = input.value;

            // Send the updated value to the server via AJAX
            fetch("../includes/updateProducts.inc.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `productId=${productId}&inputName=${inputType}&updatedValue=${updatedValue}`
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                } else {
                    throw new Error("Network response was not ok.");
                }
            })
            .then(data => {
                alert(data); // Display the response from the server
            })
            .catch(error => {
                console.error("Error:", error);
            });
        }
    });
});