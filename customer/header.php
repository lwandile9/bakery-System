<?php
session_start();
?>
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
    <?php
    
    if (isset($_SESSION["userID"])) {
      echo '<p>'.$_SESSION["userName"].'</p>
      <i class="fa">&#xf2be;</i>';
    }
    ?>
    
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