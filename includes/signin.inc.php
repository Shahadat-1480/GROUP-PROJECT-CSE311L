<?php

if(isset($_POST["submit"])){
    $username =$_POST["uid"];
    $password=$_POST["password"];
   
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

if(emptyInputlogin($username,$password) !== false){
        header("location:../signin.pnp?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $username, $password);


}