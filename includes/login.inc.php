<?php
 
if ( isset($_POST["submit"])){

  require_once "functions.inc.php";
  require_once "dbh.inc.php";

$userName=sanitizeInput($_POST["userName"]);
$password=sanitizeInput($_POST["password"]);



if(emptyInputLogin($userName,$password)!==false){

  header("location:../index.php?error=emptyInputsLoging");
  exit();

}

loginUser($conn ,$userName,$password);


}else{

    header("location:../index.php?error=invalideRequest");
    exit();
}
