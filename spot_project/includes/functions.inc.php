<?php
require_once "signup.inc.php";

function emptyInputs($firstName,$lastName,$branch,$email,$pwd,$pwdRepeat){
    $res = null;
    if(empty($firstName) || empty($lastName) || empty($branch) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $res = true; 
    }else{
        $res = false;
    }
    return $res;
}
function invalidEmail($email){
    $res = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;
}

function pwdCheck($pwd, $pwdRepeat){
    $res = null;
    if(strlen($pwd)< 8){
        $res = true;
    }
    else if($pwd !== $pwdRepeat){
        $res = true;
    }
    else{
        $res = false;
    }
    return $res;
}

function emailExists($conn , $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?err=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$email);
    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($data)){
        return $row;
    }else{
        $res = false;
        return $res;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstName,$lastName,$branch, $email,$pwd){
    $sql = "INSERT INTO users (usersFirstname, usersLastname, usersBranch, usersEmail,  usersPassword) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(! mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?err=stmtFailed");
        exit();
    }
    else{
        $hashedPwd = base64_encode($pwd);
        mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $branch, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?err=none");
        exit();
    }
}

function emptyLoginInputs($email, $pwd){
    $res = null;
    if(empty($email) || empty($pwd)){
        $res = true; 
    }else{
        $res = false;
    }
    return $res;
}

function loginUser($conn,$email,$pwd){
    $emailExists = emailExists($conn , $email);

    if($emailExists === false){
        header("location: ../login.php?err=wrongLogin");
        exit();
    }
    $pwdHashed = $emailExists["usersPassword"];
    $checkPwd = null;
    if($pwdHashed === base64_encode($pwd)){
        $checkPwd = true;
    }
    else{
        $checkPwd = false;
    }

    if($checkPwd === false){
        header("location: ../login.php?err=wrongPassword");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $emailExists["usersId"];
        $_SESSION["useremail"] = $emailExists["usersEmail"];
       
        header("location: ../index.php");
        exit();
    }

}

?>
