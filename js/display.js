
const breadProductsElement = document.getElementById("bread-container");
const cookiesProductsElement = document.getElementById("cookies-container");
const doughnutsProductsElement = document.getElementById("doughnuts-container");
const piesProductsElement = document.getElementById("pies-container");


  // displaying bread catagory 
 let  breadHtml=''
breadProducts.forEach((product)=>{

  breadHtml+=` <div class="products">
  <img src="${product.image}">
  <p id="Product-description">${product.productName}</p>
  <p id="Price">R${product.productPrice}</p>
</div>
    `; 

});

breadProductsElement.innerHTML=breadHtml;

 // displaying Cookies catagory 
 let  cookiesHtml=''
 cookiesProducts.forEach((product)=>{

  cookiesHtmlHtml+=` <div class="products">
  <img src="${product.image}">
  <p id="Product-description">${product.productName}</p>
  <p id="Price">R${product.productPrice}</p>
</div>
    `; 

});

breadProductsElement.innerHTML=cookiesHtmlHtml;

