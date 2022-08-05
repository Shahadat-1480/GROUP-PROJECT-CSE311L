<?php
function emptyInputSignup($name, $email ,$username , $password,$repeatpassword){
    $result=false;
    if(empty($name)|| empty($email)|| empty($username)|| empty($password)|| empty($repeatpassword)){
        $result = true;
    }
    return $result;
}

function invalidUid($usermane){
    $result=false;
    if(!preg_match("/^[a-zA-Z0-9 ]*$/",$usermane)){
        $result = true;
    }
    return $result;
}

function invalidEmail($email ){
    $result=false;
    if(!filter_VAR($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    return $result;
}

function pwdMatch( $password,$repeatpassword){
    $result=false;
    if($password !== $repeatpassword){
        $result = true;
    }
    return $result;
}

function uidExists($conn, $username ,$email) {
   $sql ="SELECT * FROM users WHERE UserUid = ? OR userEmail = ?;";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../register.pnp?error=usernametaken");
   }

    mysqli_stmt_bind_param($stmt,"ss",$username ,$email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);
   if($row = mysqli_fetch_assoc($resultData)){
        return $row;
   }
   else{
     $result=false;
     return $result;
   }
   mysqli_stmt_close($stmt);

} 
function createUser($conn, $name ,$email, $username, $password){
    $sql ="INSERT INTO users(userName,UserEmail,userUid,userPwd) VAlUES(?,?,?,?);";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../register.pnp?error=usernametaken");
   }
   $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name ,$email, $username, $hashedPwd);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location:../register.pnp?error=none");

    
}

function emptyInputlogin($username , $password,){
    $result=false;
    if(empty($username)|| empty($password)){
        $result = true;
    }
    return $result;
}
function loginUser($conn,$username,$password){
    $uidExists = uidExists($conn,$username,$username);

    if($uidExists ==false){
       header("location:../signin.pnp?error=wronglogin");
       exit();
    }

    $Pwdhashed = $uidExists["userPwd"];
    $checkPwd = password_verify($password,$Pwdhashed);
    if($checkPwd ==false){
     header("location:../signin.pnp?error=wronglogin");
       exit();
    }
    else if($checkPwd == true){
        session_start();
        $_SESSION["userId"] = $uidExists["userUid"];
    header("location:../index.pnp?error=wronglogin");
       exit();

    }
}
?>