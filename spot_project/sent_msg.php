<?php 
  include_once 'base.php';
  include_once 'includes/dbh.inc.php';
  if(isset($_GET["delete_feedback"])){
    $id = $_GET["delete_feedback"];
    $query = "DELETE FROM feedbacks WHERE feedbackId=$id"; 
    $result = mysqli_query($conn,$query);
    header('Location: '.$_SERVER['PHP_SELF'].'?err=deleted');
    exit();

  }



?>

        <div class="container px-lg-2 my-5">
            <?php
                if(isset($_GET['err'])){
                    if($_GET['err'] == "deleted"){
                        echo '<div class="alert alert-warning text-center" role="alert">
                        <b>Feedback Deleted Successfully!</b>
                    </div>';
                    }
                    if($_GET['err'] == "message_sent"){
                        echo '<div class="alert alert-success text-center" role="alert">
                        <b>Message Sent Successfully!</b>
                    </div>';
                    }
                    if($_GET['err'] == "stmtFailed"){
                        echo '<div class="alert alert-danger text-center" role="alert">
                        <b>Something went wrong!</b>
                    </div>';
                    }
                    if($_GET['err'] == "emptyInputs"){
                        echo '<div class="alert alert-danger text-center" role="alert">
                        <b>Message cannot be empty!</b>
                    </div>';
                    }
                }
            ?>
        <div class="p-3 p-lg-2 bg-light rounded-3">
            <h1 class="display-5 text-center mb-5">Messages Sent</h1>
            <div class="m-1 m-lg-1">
                <section>
                <div
                    class="
                    container
                    p-3
                    col-lg-6 col-xxl-12 col-centered
                    text-center
                    d-flex
                    flex-wrap
                    justify-content-evenly
                    ">
                    <?php
                    $sql = "SELECT * FROM messages";
                    $results = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($results);
                    if($resultCheck > 0){
                      while($row = mysqli_fetch_assoc($results)){
                        $name = $row["mfor"];
                        $id = $row["msgId"];
                        $branch = $row["branch"];
                        $rollno = $row["rollno"];
                        $subject = $row["topic"];
                        $msg = $row["msg"];
                        $timestamp = $row["mtimestamp"];
                        echo '<article>
                        <div class="card mb-3" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title h5"> To: '.$name.'</h5>
                                <h6 class="card-subtitle mb-2 text-muted h6"><small>'.$branch.' ('.$rollno.')'.'</small></h6>
                                <p class="card-subtitle mb-2 h5"><strong> Response to: '.$subject.'</strong></p><span><small> Time: '.$timestamp.'</small></span>
                                <p class="card-text lead">'.$msg.'</p>
                            </div>
                        </div>
                        </article>';
                                    }
                                }
                                else{
                                echo '<h2 class="d-flex justify-content-center align-items-center flex-column dispaly-6"> No Data Found </h2>';
                                }
                            ?>
                        
                   </div>
                </section>
            </div>
        </div>
    </div>    
    </body>
</html>