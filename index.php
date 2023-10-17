<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bakery ordering System</title>
  <link rel="stylesheet" href="styles/ganeral.css">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="../styles/customer.css">
</head>
<body>
     <header>
       <h1>Thina's Backeries</h1>
     </header>
     <Main >
        <form action="includes/login.inc.php" method="post"  class="login-form" onsubmit="return validateForm()">

          <label>
            Username:<input name="userName" id="Login-Username"required placeholder="Username">
          </label>
          <label>
            Password:<input name="password" id="Login-Password" required  placeholder="Password">
          </label>
          <button name="submit" id="btnLogin">Login</button>
          <p>Don't have an account? <a href="signup.php">Signup</a></p>

        </form>
         
     </Main>  

     <?php
   if(isset($_GET["error"])){
    $error=$_GET["error"];

       
   switch ($error) {
     case "wrongLogin":
       echo '<p id ="errorMessages">Login details do no exists!</p>';
       break;
     case "wrongPassword":
       echo '<p id ="errorMessages">Wrong Login Details!</p>';
       break;
     case "success":
       echo '<p id ="errorMessages">Login using the email as Username </p>';
       break;
     case "userNotLoggedIn":
       echo '<p id ="errorMessages">Please LogIn to place an order!</p>';
       break;
     default:
       echo '<p id ="errorMessages">Something went try Again!</p>';
   }
  }
 

   ?>

<footer id="main-footer">
    <p>&copy;My Bakery.co.za</p>
    <div>
       <p><b>Customer care</b>: 078396003</p>
       <p>33HA2100851@MYBOSTON.CO.ZA</p>
    </div> 
  </footer>
 
</div>
  <script src="../js/cart.js"></script>
  <script src="../js/data.js"></script>
</body>
</html>
