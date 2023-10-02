// Get the display section and navigation links
const displaySection = document.getElementById("display-section");
const homePageElement = document.getElementById("home");
const ordersPageElement = document.getElementById("orders");
const menuPageElement = document.getElementById("menu");
const inventoryPageElement = document.getElementById("inventory");

// Function to load PHP content via AJAX
function loadPHPContent(url) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            displaySection.innerHTML = xhr.responseText;
        } else {
            displaySection.innerHTML = "Error loading the PHP page.";
        }
    };

    xhr.send();
}

// Add click event listeners to the navigation links
homePageElement.addEventListener("click", function(event) {
    event.preventDefault();
    // Load the corresponding PHP file
    loadPHPContent("home.php");
});

ordersPageElement.addEventListener("click", function(event) {
    event.preventDefault();
    // Load the corresponding PHP file
    loadPHPContent("orders.php");
});

menuPageElement.addEventListener("click", function(event) {
    event.preventDefault();
    // Load the corresponding PHP file
    loadPHPContent("menu.php");
});

inventoryPageElement.addEventListener("click", function(event) {
    event.preventDefault();
    // Load the corresponding PHP file
    console.log("Home link clicked");
    loadPHPContent("inventory.php");
});