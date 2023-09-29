<?php

session_start();

function logoutUser() {
  
    $_SESSION = array();
    session_destroy();
    header("Location:../index.php"); 
    exit();
}

if (isset($_GET["logout"])) {
    logoutUser();
}