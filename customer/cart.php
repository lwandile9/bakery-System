   <?php
   include_once "header.php";
   ?>
    <Main id="cart-products">
         <h2>Review your order:</h2>
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
        <div  id="cart-products-container" class="order">
         
         
            

         </div>
        </div>
        


    </Main>

 <?php
   include_once "../footer.php";
   ?>
