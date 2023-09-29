
   // List of bread objects

const breadProducts=[

  

];
   

// Function to fetch product data from PHP script
function fetchProductData() {
    // Make an AJAX request to your PHP script that fetches product data
    // Replace '../includes/getProducts.inc.php' with the correct path to your PHP script
    fetch('../includes/getProducts.inc.php')
      .then((response) => response.json())
      .then((data) => {
        // Call a function to display the product data
        displayProducts(data);
      })
      .catch((error) => {
        console.error('Error fetching product data:', error);
      });
  }

