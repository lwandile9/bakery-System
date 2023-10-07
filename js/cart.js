
cartProductContainerElement = document.getElementById("cart-products-container");


function countQuantity(){
    let totalCartQuantity=0;
    storedCart.forEach((object)=>{
  
      totalCartQuantity+=object.cartQuantity;   
  
  
   } )
    return totalCartQuantity
  }

   // Use event delegation to handle "Add to Cart" button clicks
// Use event delegation to handle "Add to Cart" button clicks
document.addEventListener('click', (event) => {
    if (event.target && event.target.classList.contains('add-to-cart')) {
      const productName = event.target.dataset.product;
      const productID = event.target.dataset.productId; // Add this line
      const productQuantity = 1; // You can modify this as needed
  
      // Send a POST request to your PHP script
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../includes/cart.inc.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
      // Define the data to send to the PHP script
      const data = `productID=${encodeURIComponent(productID)}&productQuantity=${encodeURIComponent(productQuantity)}`;
  
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Handle the response from the PHP script if needed
          const response = JSON.parse(xhr.responseText);
          console.log(response);
  
          if (response.success) {
            // Show the "added" message
            const addedMessage = document.createElement('p');
            addedMessage.textContent = 'Added';
            document.body.appendChild(addedMessage);
  
            // Remove the "added" message after 2 seconds
            setTimeout(() => {
              document.body.removeChild(addedMessage);
            }, 2000);
          }
        }
      };
  
      // Send the data to the PHP script
      xhr.send(data);
    }
  });


 // show cart items

 var productInfo = [
 
];
 function fetchCartData() {
  let xhr = new XMLHttpRequest();
  let phpScriptPath = '../includes/getCartItems.inc.php';

  xhr.open('GET', phpScriptPath, true);
 
  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
          if (xhr.status === 200) {
              // Request was successful, parse and populate cart data
              
              productInfo = JSON.parse(xhr.responseText);
              
              populateCartProducts();
          } else {
              // Handle errors (e.g., display an error message)
              console.error('Error fetching cart data. Status code:', xhr.status);
          }
      }
  };
  xhr.send();
}

// Call the populateCartProducts function when the page loads
window.addEventListener('load', function () {
  fetchCartData();
});


    // Sample cart item data (you can replace this with your actual cart data)
   

    // Function to populate the cart products container
    function populateCartProducts() {
      var cartProductsContainer = document.getElementById('cart-products-container');
      
      // Convert the productInfo object into an array
      var productArray = Object.values(productInfo);
      
      // Loop through productArray and create HTML elements for each cart item
      productArray.forEach(function (item) {
          let cartItemDiv = document.createElement('div');
          cartItemDiv.classList.add('card');
          console.log("Item:", item);
          cartItemDiv.innerHTML = `
              <div class="image-container">
                  <img src="${item.productImage}">
              </div>
              <div class="product-details">
                  <p>${item.productName}</p>
                  <p>${item.totalPrice}</p>
                  <p>Quantity: ${item.quantity}</p>
                  <button>Delete Item</button>
              </div>
          `;
  
          cartProductsContainer.appendChild(cartItemDiv);
      });
  }

  