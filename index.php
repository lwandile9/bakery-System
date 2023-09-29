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
      <div>
        <img src="imgs/Logo.png" alt="Bakery">
     </div>
       <h1>My Backeries</h1>
        
     </header>
     <Main >
    
        <form action="includes/login.inc.php" method="post"  class="login-form" onsubmit="return validateForm()">

          <label>
            Username:<input name="userName" id="Login-Username"require  placeholder="Username">
          </label>
          <label>
            Password:<input name="password" id="Login-Password" require  placeholder="Password">
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
     default:
       echo '<p id ="errorMessages">Something went try Again!</p>';
   }
  }
  include_once "footer.php";

   ?>
