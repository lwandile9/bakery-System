
cartProductContainerElement = document.getElementById("cart-products-container");

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
            <p>R${Number.parseFloat(item.totalPrice).toFixed(2)}</p>
            <p>Quantity: ${item.quantity}</p>
            <button class="btnDeleteItem" data-buttonid="${item.cartId}">Delete Item</button>
        </div>
    `;

    cartProductContainerElement.appendChild(cartItemDiv);
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
        const numberOfProductsElement = document.getElementById("items-span");
        const numberOfProducts = numberOfProductsElement.textContent || numberOfProductsElement.innerText;

    //checking for empty cart and if the delvery date is picked 
          if (numberOfProducts<=0  ){

               alert("please add Items into the cart from home page");
          }else if(deleveryDateTime==""){
            alert("please pick desired delevery date");
               
          }else{

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

          }
    
    });
});
  

// Deleting cart products

document.addEventListener("DOMContentLoaded", function () {
    const cartProductContainerElement = document.getElementById("cart-products-container");

    cartProductContainerElement.addEventListener("click", (event) => {
        if (event.target.classList.contains("btnDeleteItem")) {
            const buttonId = event.target.dataset.buttonid;

            // Send a request to the PHP script to delete the item with the specified cartId
            fetch(`../includes/deleteCartItem.inc.php?cartId=${buttonId}`, {
                method: 'DELETE', // Use the appropriate HTTP method (e.g., POST or DELETE)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Item was successfully deleted from the database
                    // You can also remove the item from the UI here if needed
                    event.target.parentElement.parentElement.remove(); // Remove the entire cart item div
                } else {
                    console.error('Error deleting item from the database:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
});