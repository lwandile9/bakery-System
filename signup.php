<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bakery ordering System</title>
  <link rel="stylesheet" href="styles/ganeral.css">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

     <header>
      <div>
        <img src="imgs/Logo.png" alt="Bakery">
     </div>
       <h1>My Backeries</h1>
        
     </header>
     <Main >
    
        <form action="includes/signup.inc.php" method="post"  class="login-form">

          <label>
            Name:<input name="name"  required placeholder="Name">
          </label>

          <label>
           Surname:<input name="surname" required placeholder="Surname">
          </label>

          <label>
            Email:<input name="email" required placeholder="Email: Example@gamil.com">
          </label>
          <label>
            Cell Number:<input name="phoneNumber"  required placeholder="Phone Number">
          </label>
          <label>
            Pasword</Address>:<input name="password"  required placeholder="Password">
          </label>
          <label>
            Address</Address>:<input name="address" required placeholder="physical address">
          </label>

          <button name="signup" id="btnLogin">Signup</button>
          <p>Already have an account? <a href="index.php">Login</a></p>

        </form>
        
     </Main>  
     <?php


   if(isset($_GET["error"])){
     $error=$_GET["error"];

        
    switch ($error) {
      case "emptyInputs":
        echo '<p id ="errorMessages">empty Inputs</p>';
        break;
      case "emailExists":
        echo '<p id ="errorMessages">Email already registered...please login instead</p>';
        break;
      case "invalideEmail":
        echo 'Invalide Email!';
        break;
      default:
        echo '<p id ="errorMessages">Something went wrong, try again</p>';
    }



   }

   include_once "footer.php";
   ?>
