<?php
if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $password = $_POST["password"];
    $repeatPassword =$_POST["repeatpassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(emptyInputSignup($name,$email,$username,$password,$repeatPassword)!== false){
        header("location:../register.pnp?error=emptyinput");
        exit();
    }
    if(invalidUid($username)!== false){
        header("location:../register.pnp?error=invalidUid");
        exit();
    }
    if(invalidEmail($email)!== false){
        header("location:../register.pnp?error=invalidEmail");
        exit();
    }
    if(pwdMatch($password, $repeatPassword)!== false){
        header("location:../register.pnp?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $username, $email)!== false){
        header("location:../register.pnp?error=usernametaken");
        exit();
    }
    createUser($conn, $name ,$email, $username, $password);
}
else {
    header("location:../register.pnp");
}