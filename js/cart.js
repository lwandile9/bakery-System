
const cart = [];


function countQuantity(){
    let totalCartQuantity=0;
    storedCart.forEach((object)=>{
  
      totalCartQuantity+=object.cartQuantity;   
  
  
   } )
    return totalCartQuantity
  }





