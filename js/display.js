
const breadProductsElement = document.getElementById("bread-container");
const cookiesProductsElement = document.getElementById("cookies-container");
const doughnutsProductsElement = document.getElementById("doughnuts-container");
const piesProductsElement = document.getElementById("pies-container");
const cartQuantityElement = document.getElementById("main-cart");


// Retrieve the cart from localStorage
const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
cartQuantityElement.innerText = countQuantity();





  // displaying bread catagory 
 let  breadHtml=''
breadProducts.forEach((product)=>{

  breadHtml+=` <div class="products">
  <img src="${product.image}" ><p class="discount">${product.productDiscount}%</p>
  <p id="Product-description">${product.productName}</p>
  <p id="Price">R${product.productPrice}</p>
   <p id="${product.productName}" class="added-to-cart">Added&#10003;</p>
  <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
</div>
    `; 

});

breadProductsElement.innerHTML=breadHtml;

 // displaying Cookies catagory 
 let  cookiesHtml=''
 cookiesProducts.forEach((product)=>{

  cookiesHtml+=` <div class="products">
  <img src="${product.image}"><p class="discount">${product.productDiscount}%</p>
  <p id="Product-description">${product.productName}</p>
  <p id="Price">R${product.productPrice}</p>
  <p id="${product.productName}" class="added-to-cart">Added&#10003;</p>
  <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
</div>
    `; 

});

cookiesProductsElement.innerHTML=cookiesHtml;

 // displaying Doughnuts catagory 
 let  doughnutsHtml=''
 doughnutsProducts.forEach((product)=>{

  doughnutsHtml+=` <div class="products">
  <img src="${product.image}"><p class="discount">${product.productDiscount}%</p>
  <p id="Product-description">${product.productName}</p>
  <p id="Price">R${product.productPrice}</p>
  <p id="${product.productName}" class="added-to-cart">Added&#10003;</p>
  <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
</div>
    `; 

});

doughnutsProductsElement.innerHTML=doughnutsHtml;


// adding to cart 
let btnAddCartElement = document.querySelectorAll(".add-to-cart");

btnAddCartElement.forEach((button) => {
  button.addEventListener("click", () => {
    const productName = button.dataset.product;
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
    cartQuantityElement.innerText =countQuantity();

    let addedText = document.getElementById(productName);

    addedText.style.opacity = 1;
    setTimeout(() => {
      addedText.style.opacity = 0;
    }, 2000);
  });
});









