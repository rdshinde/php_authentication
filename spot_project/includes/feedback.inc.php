<?php
require_once "dbh.inc.php";

if(isset($_POST["send-feedback"])){
    
    $name = $_POST["name"];
    $branch = $_POST["branch"];
    $rollno = $_POST["rollno"];
    $subject = $_POST["subject"];
    $feedback = $_POST["feedback"];
    
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyFeedbackInputs($name, $branch, $rollno, $subject, $feedback) !== false){
        header("location: ../index.php?err=emptyInputs");
        exit();
    }
    addFeedback($conn,$name, $branch, $rollno, $subject, $feedback) ;
    mysqli_close($conn);

}
else{
    header("location: ../index.php");
}



?>