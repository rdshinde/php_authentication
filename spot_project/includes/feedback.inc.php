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

if(isset($_GET["delete_feedback"])){
    $id = $_GET["delete_feedback"];
    $query = "DELETE FROM feedbacks WHERE feedbackId=$id"; 
    $result = mysqli_query($conn,$query);
    header("location: ../feedback.php?err=deleted");
    exit();
}

?>