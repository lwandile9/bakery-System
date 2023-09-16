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
        <li><a href="#">Orders</a></li>
        <li><a href="../index.html">Logout</a></li>
         <li><a  href="#">
          <i class="fa fa-shopping-cart" aria-hidden="true">
            <div class="cart-quantity">5</div>
          </i>
          
         </a></li>
        
       </ul>
      
    </nav>

   </header>
 
   <main id="main-content">
    <div class="cell 1">
      <p id="product-type">Bread</p>
      <div class="product-container">
         <div class="products">
           <img src="../imgs/selling-products/brown-b.jpg" alt="Fish">
           <p id="Product-description">BROWN</p>
           <p>R9.90</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/white-b.jpg" alt="Fish">
           <p id="Product-description">WHITE</p>
           <p>R10</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/dumpy-b.jpg" alt="Fish">
           <p id="Product-description">DUMPY</p>
           <p>R5.60</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/yellow-b.jpg" alt="Fish">
           <p id="Product-description">Yellow </p>
           <p>R11</p>
         </div>
         
      </div>

    </div>
    <div class="cell 2">
      <p id="product-type">Cookies</p>
      <div class="product-container">
         <div class="products">
           <img src="../imgs/selling-products/bar-c.jpg" alt="Fish">
           <p id="Product-description">Bar</p>
           <p id="Price">R41</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/mooled.c.jpg" alt="molded cookie">
           <p id="Product-description">Molded</p>
           <p id="price">R 44.90</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/pressed-c.jpg" alt="Fish">
           <p id="Product-description">Pressed</p>
           <p id="price">R18</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/Refrigerator-c.jpg" alt="Fish">
           <p id="Product-description">Refrigerator </p>
           <p id="price">R42</p>
         </div>
         
      </div>

    </div>
    
    <div class="cell 3">
      <p id="product-type">Doughnuts</p>
      <div class="product-container">
         <div class="products">
           <img src="../imgs/selling-products/cruller-d.jpg" alt="Fish">
           <p id="Product-description">Crullers</p>
           <p id="price">R3</p>
          
         </div>
         <div class="products">
           <img src="../imgs/selling-products/mochi-d.jpg" alt="Fish">
           <p id="Product-description">Mochi</p>
           <p id="price">R15</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/glazed-d.jpg" alt="Fish">
           <p id="Product-description">Glazed</p>
           <p id="price">R10.90</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/vegan-d.jpg" alt="Fish">
           <p id="Product-description">Vegan </p>
           <p id="price">R4.60</p>
         </div>
         
      </div>

    </div>
    <div class="cell 4">
      <p id="product-type">Pies</p>
      <div class="product-container">
         <div class="products">
           <img src="../imgs/selling-products/Blueberry-pies.jpg" alt="Fish">
           <p id="Product-description">Blueberry</p>
           <p id="price">R200</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/pumpkin-pie.jpg" alt="Fish">
           <p id="Product-description">Pumpkin</p>
           <p id="price">R44.90</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/peach-pie.jpg" alt="Fish">
           <p id="Product-description">Peach </p>
           <p id="price">R90.70</p>
         </div>
         <div class="products">
           <img src="../imgs/selling-products/pot-pie.jpg" alt="Fish">
           <p id="Product-description">Pot pie</p>
           <p id="price">R91.90</p>
         </div>
         
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

  <script  src="../js/display.js" type=""></script>
   
   <!-- snip -->
<script>
    let data = <?php echo json_encode($_GET["name"], JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
    alert("Welcome back " + data);
</script>
<!-- snip -->

</body>
</html>