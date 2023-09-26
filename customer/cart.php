<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY Bakery</title>
  <link rel="stylesheet" href="../styles/ganeral.css">
 
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>
   <header class="cart-header"><p>Checkou (8 items)</p></header>
    <Main id="cart-products">
         <h2>Review your order</h2>
        <div class="cart-summary">
            <h3>Order Summary</h3>
             <div class="container">
            <p>Products <span id="items-span">(8)</span>:<p id="sub-total">R174.48</p>  
            <p>Delevery fee:</p><p id="handling">R14.48</p> 
            <h4>Order Total: </h3> <p id="total">R102.48</p>
             </div> 
             <div id="pick-date">
              <h5>Pick Delevery Date:</h3>
             <Label><input name="pick-date"type="radio">October 3</Label>
             <Label><input name="pick-date"type="radio">October 3</Label>
             <Label><input name="pick-date"type="radio">September 27</Label>
             </div>
            <button>Place an order</button>  
        </div>
        <div
        <div class="order">
         
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
            

         </div>
         <div class="card">
            <div class="image-container">
                <img src="../imgs/selling-products/mooled.c.jpg"> 
           </div>
            
            <div class="product-details">
                <p>Basic home bread</p>
                <p>R330</p>
                <p>Quantity:3 </p>
                <button>Delete Item</button>
            </div>
            

         </div>
         <div class="card">
            <div class="image-container">
                <img src="../imgs/selling-products/brown-b.jpg"> 
           </div>
            
            <div class="product-details">
                <p>Basic home bread</p>
                <p>R330</p>
                <p>Quantity:3 </p>
                <button>Delete Item</button>
            </div>
            

         </div>
        </div>
        


    </Main>

</body>
</html>