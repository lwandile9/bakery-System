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
    
        <form action="inc/signup.php" method="post"  class="login-form">

          <label>
            Name:<input name="username" id="Login-Username" required placeholder="Username">
          </label>

          <label>
           Surname:<input name="password" id="Login-Password" required placeholder="Password">
          </label>

          <label>
            Email:<input name="username" id="Login-Username" required placeholder="Username">
          </label>
          <label>
            cell Number:<input name="username" id="Login-Username" required placeholder="Username">
          </label>
          <label>
            Address</Address>:<input name="password" id="Login-Password" required placeholder="Password">
          </label>

          <button id="btnLogin">Signup</button>
          <p>Already have an account? <a href="index.html">Login</a></p>

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