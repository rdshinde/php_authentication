<?php



function emptyInputs($firstName,$lastName,$branch,$rollno, $email,$pwd,$pwdRepeat){
    $res = null;
    if(empty($firstName) || empty($lastName) || empty($branch) || empty($email) || empty($pwd) || empty($pwdRepeat) || empty($rollno)){
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

function createUser($conn, $firstName, $lastName, $branch, $rollno, $email,$pwd){
    $sql = "INSERT INTO users (usersFirstname, usersLastname, usersBranch, usersrollno, usersEmail,  usersPassword) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(! mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?err=stmtFailed");
        exit();
    }
    else{
        $hashedPwd = base64_encode($pwd);
        mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $branch, $rollno, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?err=none");
        exit();
    }
}

function addFeedback($conn, $name, $branch, $rollno, $subject, $feedback){
    $sql = "INSERT INTO feedbacks (sname, sbranch, srollno, fsubject, feedback) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(! mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?err=stmtFailed");
        exit();
    }
    else{
        
        mysqli_stmt_bind_param($stmt, "sssss", $name, $branch, $rollno, $subject, $feedback);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php?err=none");
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

function emptyFeedbackInputs($name, $branch, $rollno, $subject, $feedback){
    $res = null;
    if(empty($name) || empty($branch) || empty($rollno) || empty($subject) || empty($feedback)){
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
        $_SESSION["name"] = $emailExists["usersFirstname"];
        $_SESSION["lastname"] = $emailExists["usersLastname"];
        $_SESSION["branch"] = $emailExists["usersBranch"];
        $_SESSION["rollno"] = $emailExists["usersrollno"];
        $_SESSION["isAdmin"] = $emailExists["isAdmin"];
       
        header("location: ../index.php");
        exit();
    }

}

function emptyMessageInputs($msg){
    $res = null ;
    if(empty($msg)){
        $res = true; 
    }else{
        $res = false;
    }
    return $res;
}

function sendMail($conn, $name, $branch, $rollno, $topic, $from, $msg){
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO messages (mfor, branch, rollno, topic, mfrom, msg, mtimestamp) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(! mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../feedback.php?err=stmtFailed");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $branch, $rollno, $topic, $from, $msg, $timestamp);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../feedback.php?err=message_sent");
        exit();
    }
}

?>
