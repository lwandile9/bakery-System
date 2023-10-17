<?php
session_start();
function logoutUser() {
   
    unset($_SESSION['userID']);
    header("Location:../customer/customer-dashboard.php?response=Login"); 
    $_SESSION['LoginLogout'] = 'Login';
    exit();
 
}
function transferTOUserLogin() {
   
    header("Location:../index.php"); 
    exit();
}

if (isset($_GET["data"])) {
    $data= $_GET["data"];
    switch ($data) {
        case "Login":
            transferTOUserLogin();
            break;
        case "Logout":
            logoutUser();
            break;
        default:
        header("Location:../index.php?error=loginlogoutDataNotFound"); 
    }
  
}