<?php
if (isset($_POST["signup"])){

    require_once "functions.inc.php";
    require_once "dbh.inc.php";

    $name = sanitizeInput($_POST["name"]);
    $surname = sanitizeInput($_POST["surname"]);
    $email = sanitizeInput($_POST["email"]);
    $phoneNumber = sanitizeInput($_POST["phoneNumber"]);
    $password = sanitizeInput($_POST["password"]);
    $address = sanitizeInput($_POST["address"]);
    
    

    if(emptyInputSignup($name,$surname,$email,$phoneNumber,$password,$address)!==false){

        header("location:../signup.php?error=emptyInputs");
        exit();

    }

    if(invalidEmail($email) !==false){

        header("location:../signup.php?error=invalideEmail");
        exit();

    }

    if(emailExists($conn,$email)!==false){

        header("location:../signup.php?error=emailExists");
        exit();

    }

    createUser($conn,$name,$surname,$email,$phoneNumber,$password,$address);


}else{

    header("location: ../signup.php?error=invalidRequest");
    exit();
}