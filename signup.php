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
            Name:<input name="name"  required placeholder="Username">
          </label>

          <label>
           Surname:<input name="surname" required placeholder="Password">
          </label>

          <label>
            Email:<input name="email" required placeholder="Username">
          </label>
          <label>
            Cell Number:<input name="phoneNumber"  required placeholder="Username">
          </label>
          <label>
            Pasword</Address>:<input name="password"  required placeholder="Password">
          </label>
          <label>
            Address</Address>:<input name="address" required placeholder="Password">
          </label>

          <button name="signup" id="btnLogin">Signup</button>
          <p>Already have an account? <a href="index.php">Login</a></p>

        </form>
        
     </Main>  
     <footer>
      <p>&copy; ... Bakery </p>
      <p class="social-media-links">
        <i class="fa-brands fa-facebook"></i>
      </p>
     </footer>
  <script src="js/login-validation.js"></script>
</body>
</html>