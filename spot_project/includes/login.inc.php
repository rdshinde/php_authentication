<?php

if(isset($_POST['submit-login'])){
    $email = $_POST['email-login'];
    $password = $_POST['password-login'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyLoginInputs($email, $password) !== false){
        header("location: ../login.php?err=emptyInputs");
        exit();
    }

    loginUser($conn,$email,$password);

    
}else{
    header("location: ../login.php");
    exit();
}