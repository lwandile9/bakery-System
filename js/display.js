
const breadProductsElement = document.getElementById("bread-container");
const cookiesProductsElement = document.getElementById("cookies-container");
const doughnutsProductsElement = document.getElementById("doughnuts-container");
const piesProductsElement = document.getElementById("pies-container");


  // displaying bread catagory 
 let  breadHtml=''
breadProducts.forEach((product)=>{

  breadHtml+=` <div class="products">
  <img src="${product.image}" ><p class="discount">${product.productDiscount}%</p>
  <p id="Product-description">${product.productName}</p>
  <p id="Price">R${product.productPrice}</p>
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
  <button class="add-to-cart" data-product="${product.productName}">add to Cart</button>
</div>
    `; 

});

doughnutsProductsElement.innerHTML=doughnutsHtml;


// adding to cart 


let btnAddCartElement= document.querySelectorAll(".add-to-cart");
const cartQuantity = document.getElementById("main-cart");



btnAddCartElement.forEach((button)=>{
  

  button.addEventListener("click",()=>{
  let data =button.getAttribute("data-product");
  let json_str = getCookie('mycookie');
  let cartData = JSON.parse(json_str);
  cartData.push({
        productName:data,
        quantity:1
        

     })

    
     cartQuantity.innerText=2;
    
  })


});


 // functions 

 function showDiscount(value ,element){

    if(value<=3){
      element.style="dislpay:none"
    }{
      element.style="dislpay:flex"
    }
 
 }

