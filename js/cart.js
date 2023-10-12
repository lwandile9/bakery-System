
cartProductContainerElement = document.getElementById("cart-products-container");

   // Use event delegation to handle "Add to Cart" button clicks

document.addEventListener('click', (event) => {
    if (event.target && event.target.classList.contains('add-to-cart')) {
      const productName = event.target.dataset.product;
      const productID = event.target.dataset.productId; 
      const productQuantity = 1; 
  
      // Sending a POST request to  script
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../includes/cart.inc.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
      // Defining the data to send to the PHP script
      const data = `productID=${encodeURIComponent(productID)}&productQuantity=${encodeURIComponent(productQuantity)}`;
  
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
         
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
              // successful, parsing and populating cart data
              
              productInfo = JSON.parse(xhr.responseText);
              
              populateCartProducts();
          } else {
              //display an error message
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



    // Function to populate the cart products container
    function populateCartProducts() {
      var cartProductsContainer = document.getElementById('cart-products-container');
       const cartTotalElement = document.getElementById("total");
       const subTotalElement=document.getElementById("sub-total");
       const deleveryFeeElement=document.getElementById("handling");
       const numberItemsElement=document.getElementById("items-span");
      // Convert the productInfo object into an array
      let productArray = Object.values(productInfo);
      let cartSubtotal = 0;
      let numberOfItems = 0;
      
      // Loop through productArray and create HTML elements for each cart item
      productArray.forEach(function (item) {
          let cartItemDiv = document.createElement('div');
          cartItemDiv.classList.add('card');
         
          cartSubtotal += parseFloat(item.totalPrice);
          numberOfItems++;
         
          cartItemDiv.innerHTML = `
              <div class="image-container">
                  <img src="${item.productImage}">
              </div>
              <div class="product-details">
                  <p>${item.productName}</p>
                  <p>R${item.totalPrice}</p>
                  <p>Quantity: ${item.quantity}</p>
                  <button>Delete Item</button>
              </div>
          `;
  
          cartProductsContainer.appendChild(cartItemDiv);
      });
      let deliveryFee = 10 * numberOfItems;
      let cartTotalPrice = cartSubtotal + deliveryFee;
      
      deleveryFeeElement.innerText = `R${deliveryFee}`;
      cartTotalElement.innerText = `R${cartTotalPrice.toFixed(2)}`;
      subTotalElement.innerText = `R${cartSubtotal.toFixed(2)}`;
      numberItemsElement.innerText = `${numberOfItems}`;
    
     
  }

  // placing and order using palce order button

  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('place-order').addEventListener('click', function () {
        // Collect the necessary data
        const totalPriceElement = document.getElementById("total");
        const totoPrice = totalPriceElement.textContent.slice(1) || totalPriceElement.innerText.slice(1);

        const deliveryDateTimeElement = document.getElementById("datetimepicker");
const deleveryDateTime = deliveryDateTimeElement.value;
alert(deleveryDateTime);

        const numberOfProductsElement = document.getElementById("items-span");
        const numberOfProducts = numberOfProductsElement.textContent || numberOfProductsElement.innerText;

        // Prepare the data to send as an object
        const orderData = {
            totalPrice: totoPrice,
            orderDate: deleveryDateTime,
            numberItems: numberOfProducts
        };

        // Send the data to the PHP file using fetch
        fetch('../includes/insertOrder.inc.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderData)
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Dsplays the response from PHP (if any)
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
  