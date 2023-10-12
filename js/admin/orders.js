// Function to fetch data from PHP script and populate orders
function fetchAndPopulateOrders() {
  const ordersContainerElement = document.getElementById("orders-container");

  // Make an AJAX request to the PHP script
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "../includes/fetchAllOrders.inc.php", true);

  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Parse the JSON response
          const ordersData = JSON.parse(xhr.responseText);

          // Clear the ordersContainerElement before populating
          ordersContainerElement.innerHTML = '';

          // Loop through the ordersData array and append orders to ordersContainerElement
          ordersData.forEach((order) => {
              const orderCard = document.createElement("div");
              orderCard.className = "order-card";
              orderCard.innerHTML = `
                  <p>Order ID:<span>${order.orderId}</span></p>
                  <p>User ID:<span>${order.userID}</span></p>
                  <p>Order Price:<span>${order.orderPrice}</span></p>
                  <p>Number of Products:<span>${order.numberOfProducts}</span></p>
                  <p>Delivery Address:<span>${order.usersAddress}</span></p>
                  <p>Delivery Date:<span>${order.orderDeleveryDate}</span></p>
                  <div>
                      <p>Status: <span>${order.orderStatus}</span></p>
                      <label for="update-status">Update Order Status:
                          <select id="update-status-${order.orderId}" name="update-status" class="update-order-status">
                              <option></option>
                              <option>waiting-approval</option>
                              <option>Approved</option>
                              <option>Rejected</option>
                              <option>Out-for-Delivery</option>
                              <option>Delivered</option>
                          </select>
                      </label>
                  </div>
                  <button id="btnSubmit" data-orderID="${order.orderId}" class="submit-update-btn">Submit Update</button>
              `;
              ordersContainerElement.appendChild(orderCard);

              // Add a click event listener to the "Submit Update" button
              const submitBtn = orderCard.querySelector(".submit-update-btn");
              submitBtn.addEventListener("click", function () {
                  // Get the selected option's text
                  const selectElement = orderCard.querySelector(`#update-status-${order.orderId}`);
                  const selectedOption = selectElement.options[selectElement.selectedIndex].text;

                  // Call a function to update the order status in the database
                  updateOrderStatus(order.orderId, selectedOption);
              });
          });
      }
  };

  xhr.send();
}

// Call the function to fetch and populate orders when the page loads
fetchAndPopulateOrders();
// Function to update order status and notify the user
function updateOrderStatus(orderId, newStatus) {
  // Make an AJAX request to update the order status
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../includes/updateOrderStatus.inc.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
          if (xhr.status === 200) {
              // Successfully received a response
              const response = JSON.parse(xhr.responseText);
              if (response.success) {
                  // Notify the user of success
                  alert(response.message);
                  // Optionally, you can refresh the page or update the UI here.
              } else {
                  // Handle the case where the update was not successful
                  console.error(response.message);
              }
          } else {
              // Handle HTTP errors
              console.error("HTTP error occurred: " + xhr.status);
          }
      }
  };

  // Prepare data to send to the server
  const data = `orderId=${orderId}&newStatus=${encodeURIComponent(newStatus)}`;

  xhr.send(data);
}
