
const breadProducts=[];
   
// Function to fetch product data from PHP script
function fetchProductData() {
    // Making an AJAX request to your PHP script that fetches product data
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

