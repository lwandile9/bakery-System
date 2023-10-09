<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakery System Addmin Page</title>
    <link rel="stylesheet" href="../styles/ganeral.css">
    <link rel="stylesheet" href="../styles/admin/admin.css">
    <link rel="stylesheet" href="../styles/admin/orders.css">
</head>
<body>
    <header>
   
        <div class="logo">

        </div>
        <?php
    
    if (isset($_SESSION["userID"])) {
      echo '<div id="Profile">'.$_SESSION["userName"].'
      <i class="fa">&#xf2be;</i></div>';
    }
    ?>
        <nav id="admin-top-nav">
            <ul>
                <li><a href="../customer/customer-dashboard.php">Customer Page</a></li>
                <li><a href="../index.php">Logout<img src="../imgs/logoutIcon.png"></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <nav class="side-nav">
            <ul>
                <li id="home"><a href="">Home</a></li>
                <li id ="orders"><a href="">Orders</a></li>
                <li id ="menu"><a href="">Menue</a></li>
                <li id="inventory"><a href="">Inventory</a></li>
                
            </ul>
        </nav>
        <section id="display-section">
            <!-- Add an empty div for displaying PHP content -->

            


            </div>


        </section>
    </main>
    <footer></footer>
    
    <script src="../js/admin/display.js"></script>
</body>
</html>