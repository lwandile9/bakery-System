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
        // User is not logged in, redirect to index.php with error
        window.location.href = '../index.php?error=userNotLoggedIn';
      } else {
        throw new Error('Error fetching orders');
      }
    })
    .then(ordersData => {
      // Loop through the ordersData array and create HTML for each order
      ordersData.forEach(order => {
        const orderHTML = `
          <div class="card">
            <div class="image-container">
              <img src="../imgs/order-Icon.png">
            </div>
            <div class="product-details">
              <p>Order ID: ${order.orderId}</p>
              <p>Total Price Payed: R${order.totalPrice}</p>
              <p>Quantity Items: ${order.orderNumberOfItems}</p>
              <button data-orderID="${order.orderId}">Track Order</button>
            </div>
          </div>
        `;
        // Append the order's HTML to the ordersDisplayElement
        ordersDisplayElement.innerHTML += orderHTML;
      });
    })
    .catch(error => {
      console.error('Error fetching orders:', error);
    });
}

// Call the fetchOrders function to load and display the orders
fetchOrders();