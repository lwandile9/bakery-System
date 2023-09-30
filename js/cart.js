
cartProductContainerElement = document.getElementById("cart-products-container");

const cart = [];


function countQuantity(){
    let totalCartQuantity=0;
    storedCart.forEach((object)=>{
  
      totalCartQuantity+=object.cartQuantity;   
  
  
   } )
    return totalCartQuantity
  }




   let cart1=`
   <div class="card">

   <div class="image-container">
       <img src="../imgs/selling-products/pressed-c.jpg"> 
  </div>
   
   <div class="product-details">
       <p>Basic home bread</p>
       <p>R330</p>
       <p>Quantity:3 </p>
       <button>Delete Item</button>
   </div>
   

</div>`;

   cartProductContainerElement.innerHTML= cart1;




