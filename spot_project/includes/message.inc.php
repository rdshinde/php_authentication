<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST["send-message"])){
    
    $name = $_POST["name"];
    $branch = $_POST["branch"];
    $rollno = $_POST["rollno"];
    $topic = $_POST["topic"];
    $from = $_POST["from"];
    $msg = $_POST["message"];

    if(emptyMessageInputs($msg) !== false){
        header("location: ../feedback.php?err=emptyInputs");
        exit();
    }
    
    sendMail($conn, $name, $branch, $rollno, $topic, $from, $msg);
    mysqli_close($conn);

}
else{
    header("location: ../feedback.php");
}
?>