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
  <link rel="stylesheet" href="../styles/orders.css">
  <link rel="stylesheet" href="../styles/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
</head>
<body>
<div class="container">
   <header id="main-header">

    <div id="Logo">
 
    <?php
    $response;
    if (isset($_SESSION["userID"])) {
      $name =$_SESSION["userName"];
      echo '<div id="Profile">'. $name.'</div>';
      if ($name==="Myuser"){
        echo '<a href="../admin/admin-dashboard.php" id="admin"><i class="fa">&#xf2be;</i>';
      }
     $id=  ($_SESSION["userID"]);
     $response ="Logout";
    }

     else if (isset($_SESSION["LoginLogout"])){

      $response =$_SESSION["LoginLogout"];

     }else{

      $response ="Logout";

     }
    ?>
   
    </div>

    <nav class="top-nav">
        <ul id="myLinks">
            <li id="home"><a href="customer-dashboard.php">home</a></li>
            <li id="orders"><a href="orders.php">Orders</a></li>
            <li id="logout"><a href="../includes/logout.inc.php?data=<?php echo($response);?>"><?php echo($response);?></a></li>
            <li id="cart"><a href="cart.php"
                <i class="fa fa-shopping-cart" aria-hidden="true">
                <div id="main-cart" class="cart-quantity"></div>
                </i>
            </a></li>
            
    </ul>

      
    </nav>
    <script>

// Get the current page's URL
let currentPageURL = window.location.href;
 // changing background color of an active page
// Check if the URL contains a specific substring to determine the current page
if (currentPageURL.includes("customer-dashboard.php")) {
  document.getElementById("home").style.backgroundColor = "rgb(85, 80, 243)";
} else if (currentPageURL.includes("orders.php")) {
  document.getElementById("orders").style.backgroundColor = "rgb(85, 80, 243)";
} else if (currentPageURL.includes("../index.php")) {
  document.getElementById("logout").style.backgroundColor= "rgb(85, 80, 243)";
} else if (currentPageURL.includes("cart.php")) {
  document.getElementById("cart").style.backgroundColor = "rgb(85, 80, 243)";

}


</script>
    
 
   </header>