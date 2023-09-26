<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY Bakery</title>
  <link rel="stylesheet" href="../styles/ganeral.css">
 
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/customer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>
<div class="container">
   <header id="main-header">
    <div id="Logo">
      <img src="../imgs/logo.png" alt="">
    
    </div>
    <nav class="top-nav">
       <ul  id="myLinks">
        <li><a href="customer-dashboard.php">home</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="../index.php">Logout</a></li>
         <li><a  href="cart.php">
          <i class="fa fa-shopping-cart" aria-hidden="true">
            <div id="main-cart" class="cart-quantity"></div>
          </i>
          
         </a></li>
        
       </ul>
      
    </nav>

   </header>
 
   <main id="main-content">
    <div class="cell 1">
      <p id="product-type">Bread</p>
      <div id="bread-container" class="product-container">
        
      </div>

    </div>
    <div class="cell 2">
      <p id="product-type">Cookies</p>
      <div id="cookies-container" class="product-container">
        
      </div>

    </div>
    
    <div class="cell 3">
      <p id="product-type">Doughnuts</p>
      <div id="doughnuts-container" class="product-container">
         
      </div>

    </div>
  

   </main>

   
   <footer id="main-footer">
    <p>&copy;MY Bakery.co.za</p>
    <div>
       <p>Customer care: 062191040</p>
       <p>Cpmplaints: Lwandiletoto@gmail.com</p>
    </div> 
  </footer>

</div>
  <script src="../js/cart.js"></script>
  <script src="../js/data.js"></script>
  <script  src="../js/display.js" type=""></script>
  
   

</body>
</html>