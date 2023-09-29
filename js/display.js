const breadProductsElement = document.getElementById("bread-container");
const cookiesProductsElement = document.getElementById("cookies-container");
const doughnutsProductsElement = document.getElementById("doughnuts-container");
const cartQuantityElement = document.getElementById("main-cart");

// Retrieve the cart from localStorage
const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
cartQuantityElement.innerText = countQuantity();

// Function to fetch product data from PHP script
function fetchProductData() {
  // Make an AJAX request to your PHP script that fetches product data
 
  fetch('../includes/getProducts.inc.php')
    .then((response) => response.json())
    .then((data) => {
     
      console.log("Data received:", data);
      displayProducts(data);
    })
    .catch((error) => {
      console.error('Error fetching product data:', error);
    });
}

// Function to display product data on the HTML page
function displayProducts(products) {

  // Displaying bread category
  
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
          <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
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
          <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
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
        <div class="products">
          <img src="${product.productImage}">
          <p class="discount">${product.productDiscount}%</p>
          <p id="Product-description">${product.productName}</p>
          <p id="Price">R${product.productPrice}</p>
          <p id="${product.productName}" class="added-to-cart">Added&#10003;</p>
          <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
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
    let matchingItem;

    storedCart.forEach((item) => {
      if (productName === item.productName) {
        matchingItem = item;
      }
    });

    if (matchingItem) {
      matchingItem.cartQuantity += 1;
    } else {
      storedCart.push({
        productName: productName,
        cartQuantity: 1
      });
    }

    // Update the cart in localStorage
    localStorage.setItem('cart', JSON.stringify(storedCart));

    // Update the cart quantity display
    cartQuantityElement.innerText = countQuantity();

    let addedText = document.getElementById(productName);

    addedText.style.opacity = 1;
    setTimeout(() => {
      addedText.style.opacity = 0;
    }, 2000);
  }
});