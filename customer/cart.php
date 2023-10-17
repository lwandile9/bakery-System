<?php include_once "header.php"; ?> 
<Main id="cart-products">
    <h2>Review your order:</h2>
    <div class="cart-summary">
        <h3>Order Summary</h3>
        <div class="container">
            <p>Products <span id="items-span">(0)</span>:</p>
            <p id="sub-total">R0</p>
            <p>Delivery fee:</p>
            <p id="handling">R0</p>
            <h4>Order Total:</h3>
            <p id="total">R0</p>
        </div>
        <div id="pick-date">
            <h5>Pick Delivery Time:</h5>
            <label>
                <input type="datetime-local" id="datetimepicker">
            </label>
           
        </div>
        <button id="place-order">Place an order</button>
    </div>
    <div id="cart-products-container" class="order">
        <!-- Cart products will be added here -->
        
    </div>

</Main>
<footer id="main-footer">
    <p>&copy;My Bakery.co.za</p>
    <div>
       <p><b>Customer care</b>: :078396003</p>
       <p>33HA2100851@MYBOSTON.CO.ZA</p>
    </div> 
  </footer>
 
</div>
  <script src="../js/cart.js"></script>
  <script src="../js/data.js"></script>
</body>
</html>