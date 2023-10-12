const ordersDisplayElement = document.getElementById("orders-display");

// Function to fetch orders data from the server
function fetchOrders() {
  // Make an AJAX request to your PHP script
  fetch('../includes/getOrder.inc.php')
    .then(response => {
      // Check the response status
      if (response.status === 200) {
        return response.json();
      } else if (response.status === 401) {
        // User is not logged in, redirect to ../index.php with error
        window.location.href = '../index.php?error=userNotLoggedIn';
      } else {
        throw new Error('Error fetching orders');
      }
    })
    .then(ordersData => {
      // Clear any existing content in the ordersDisplayElement
      ordersDisplayElement.innerHTML = '';

      // Access the userAddress property
      const userAddress = ordersData.userAddress;

    

      // Loop through the ordersData.orders array and create HTML for each order
      ordersData.orders.forEach(order => {
        const orderHTML = `
          <div class="card">
            <div class="image-container">
              <img src="../imgs/order-Icon.png">
            </div>
            <div class="product-details">
              <p>Order ID: ${order.orderId}</p>
              <p>Total Price Paid: R${order.totalPrice}</p>
              <p>Quantity Items: ${order.orderNumberOfItems}</p>
              <p id="delivery-address">Delivery Address: ${userAddress}</p>
              <button data-orderID="${order.orderId}">Track Order</button>
            </div>
          </div>
        `;
        // Append the order's HTML to the ordersDisplayElement
        ordersDisplayElement.innerHTML += orderHTML;
          // Update the delivery address element
      const deliveryAddressElement = document.getElementById("delivery-address");
      deliveryAddressElement.textContent = userAddress;
      });
    })
    .catch(error => {
      console.error('Error fetching orders:', error);
    });
}

// Call the fetchOrders function to load and display the orders
fetchOrders();