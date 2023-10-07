<?php include_once "header.php"; ?> 
<Main id="cart-products">
    <h2>Review your order:</h2>
    <div class="cart-summary">
        <h3>Order Summary</h3>
        <div class="container">
            <p>Products <span id="items-span">(8)</span>:</p>
            <p id="sub-total">R174.48</p>
            <p>Delivery fee:</p>
            <p id="handling">R14.48</p>
            <h4>Order Total:</h3>
            <p id="total">R102.48</p>
        </div>
        <div id="pick-date">
            <h5>Pick Delivery Date:</h5>
            <label><input name="pick-date" type="radio">October 3</label>
            <label><input name="pick-date" type="radio">October 3</label>
            <label><input name="pick-date" type="radio">September 27</label>
        </div>
        <button>Place an order</button>
    </div>
    <div id="cart-products-container" class="order">
        <!-- Cart products will be added here -->
        
    </div>



</Main>
<footer id="main-footer">
    <p>&copy;My Bakery.co.za</p>
    <div>
       <p><b>Customer care</b>: 062191040</p>
       <p>Lwandiletoto@gmail.com</p>
    </div> 
  </footer>
 
</div>
  <script src="../js/cart.js"></script>
  <script src="../js/data.js"></script>
</body>
</html>