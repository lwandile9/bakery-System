const breadProductsElement = document.getElementById("bread-container");
const cookiesProductsElement = document.getElementById("cookies-container");
const doughnutsProductsElement = document.getElementById("doughnuts-container");


// Function to fetch product data from PHP script
function fetchProductData() {
  // Making an AJAX request to your PHP script that fetches product data
 
  fetch('../includes/getProducts.inc.php')
    .then((response) => response.json())
    .then((data) => {
     
      displayProducts(data);
    })
    .catch((error) => {
      console.error('Error fetching product data:', error);
    });
}

// Function to display product data on the HTML page
function displayProducts(products) {

  // Displayig bread category
  
  let breadHtml = '';
  products.forEach((product) => {
    if (product.productCatagory === "bread") { // Check the category
      breadHtml += `
        <div class="products">
          <img src="${product.productImage}">
          <p class="discount">${product.productDiscount}%</p>
          <p id="Product-description">${product.productName}</p>
          <p id="Price">R${product.productPrice}</p>
          <p id="${product.productName}" class="added-to-cart">Added&#10003;</p>
          <button class="add-to-cart" data-product="${product.productName}" data-product-id="${product.productID}">add to Cart</button>
        </div>
      `;
    }
  });

  breadProductsElement.innerHTML = breadHtml;

  // Displaying cookies category
  
  let cookiesHtml = '';
  products.forEach((product) => {
    if (product.productCatagory === "cookies") { // Check the category
      cookiesHtml += `
        <div class="products">
          <img src="${product.productImage}">
          <p class="discount">${product.productDiscount}%</p>
          <p id="Product-description">${product.productName}</p>
          <p id="Price">R${product.productPrice}</p>
          <p id="${product.productName}" class="added-to-cart">Added&#10003;</p>
          <button class="add-to-cart" data-product="${product.productName}" data-product-id="${product.productID}">add to Cart</button>
        </div>
      `;
    }
  });

  cookiesProductsElement.innerHTML = cookiesHtml;

  // Displeying doughnuts category
  
  let doughnutsHtml = '';
  products.forEach((product) => {
    if (product.productCatagory === "doughnuts") { // Check the category
      doughnutsHtml += `
        <div data-product-Id="${product.productId}" class="products">
          <img src="${product.productImage}">
          <p class="discount">${product.productDiscount}%</p>
          <p id="Product-description">${product.productName}</p>
          <p id="Price">R${product.productPrice}</p>
          <p id="${product.productName}" class="added-to-cart">Added\u2713</p>
          <button class="add-to-cart" data-product="${product.productName}" data-product-id="${product.productID}">add to Cart</button>
        </div>
      `;
    }
  });

  doughnutsProductsElement.innerHTML = doughnutsHtml;

 
}

// Call the fetchProductData function when the page loads
window.addEventListener('load', fetchProductData);


//  adding to curt 
// Use event delegation to handle "Add to Cart" button clicks
document.addEventListener('click', (event) => {
  if (event.target && event.target.classList.contains('add-to-cart')) {
    const productName = event.target.dataset.product;
    const productID = event.target.dataset.productId; 
    const productQuantity = 0; 

    // Send a POST request to cart.inc.php script
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../includes/cart.inc.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the data to send to the PHP script
    const data = `productID=${encodeURIComponent(productID)}&productQuantity=${encodeURIComponent(productQuantity)}`;

    xhr.onreadystatechange = function () {
     
      if (xhr.readyState === 4 && xhr.status === 200) {
        
        const response = JSON.parse(xhr.responseText);
        // Find the corresponding paragraph element and update its text
        const addedParagraph = document.getElementById(productName);
        if (response.success === true) {
          
            addedParagraph.style.opacity="1";
            setTimeout(() => {
              addedParagraph.style.opacity="0";
            }, 1000);
             
        }else{

          addedParagraph.style.opacity="1";
          addedParagraph.innerText = 'Error! adding Item';
          
          setTimeout(() => {
            addedParagraph.style.opacity="0";
          }, 1000);


        }

        
        
      }
    };

    // Send the data to the PHP script
    xhr.send(data);
  }
});



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
