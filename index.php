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
    
        <form action="inc/login.php" method="post"  class="login-form">

          <label>
            Username:<input name="username" id="Login-Username" required placeholder="Username">
          </label>
          <label>
            Password:<input name="password" id="Login-Password" required placeholder="Password">
          </label>
          <button id="btnLogin">Login</button>
          <p>Don't have an account? <a href="signup.html">Signup</a></p>

        </form>
        
     </Main>  
     <footer id="main-footer">
      <p>&copy;MY Bakery.co.za</p>
      <div>
         <p>Customer care: 062191040</p>
         <p>Cpmplaints: Lwandiletoto@gmail.com</p>
      </div>
       
    </footer>
  <script src="js/login-validation.js"></script>
</body>
</html>