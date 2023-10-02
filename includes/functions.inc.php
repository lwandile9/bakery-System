<?php
function sanitizeInput($input) {

    $input = trim($input);
    $input = strip_tags($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

function emptyInputSignup($name, $surname, $email, $phoneNumber, $password, $address) {

    if (empty($name) || empty($surname) || empty($email) || empty($phoneNumber) || empty($password) || empty($address)) {
        return true; // At least one input field is empty.
    } else {
        return false; // None of the input fields are empty.
    }
}

function invalidEmail($email) {
    
    return filter_var(!$email, FILTER_VALIDATE_EMAIL);
}
function emailExists($conn, $email) {
    $sql = "SELECT * FROM tblusers WHERE usersEmail=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return $row; // Email exists; return user data.
        } else {
            return false; // Email does not exist.
        }

        mysqli_stmt_close($stmt);
    }
}


function createUser($conn, $name, $surname, $email, $phoneNumber, $password, $address) {
    $sql = "INSERT INTO tblusers (usersName, usersSurname, usersEmail, usersPhoneNumber, usersPassword, usersAddress) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=sqlerror");
        exit();
    } else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $surname, $email, $phoneNumber, $hashedPwd, $address);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php?error=success");
        exit();
    }
}

//loging in


function emptyInputLogin($userName,$password ) {

    if (empty($userName) || empty($password) ) {
        return true; // At least one input field is empty.
    } else {
        return false; // None of the input fields are empty.
    }
}

function loginUser($conn ,$userName,$password){

    $userExist=emailExists($conn, $userName);
    if($userExist===false){

        header("location:../index.php?error=wrongLogin");
        exit();
        
    }

    $passwordHashed=$userExist ["usersPassword"];
    $checkPassword =password_verify($password,$passwordHashed);

    if($checkPassword ===false){
        header("location:../index.php?error=wrongPassword");
         exit();
    }else if($checkPassword=== true){
        session_start();

        $_SESSION["userID"]=$userExist["usersId"];
        $_SESSION["userName"]=$userExist["usersName"];
        header("location: ../customer/customer-dashboard.php?login=success");
         exit();

    }

}
