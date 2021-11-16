<?php

if(isset($_POST["submit"])){
    
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $branch = $_POST["branch"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["confirm-password"];
    
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyInputs($firstName,$lastName,$branch,$email,$pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?err=emptyInputs");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?err=invalidEmail");
        exit();
    }
    if(pwdCheck($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?err=passwordNotMatching");
        exit();
    }
    if(emailExists($conn , $email)!== false){
        header("location: ../signup.php?err=emailExists");
        exit();
    }
    createUser($conn, $firstName, $lastName, $branch, $email, $pwd);
    mysqli_close($conn);








}
else{
    header("location: ../signup.php");
}
?>