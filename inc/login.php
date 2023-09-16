<?php


$name="initvalue";

if ($_SERVER["REQUEST_METHOD"]==="POST"){
  $name =$_POST["username"];
  header("Location:../customer/customer-dashboard.php?name=".$name);

exit();

}else{
 
  header("Location:../index.html");
  exit();

}


