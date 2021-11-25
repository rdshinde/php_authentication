<?php 
  include_once 'base.php';
  include_once 'includes/dbh.inc.php';
?>

        <div class="container px-lg-2 my-5">
            <?php
                if(isset($_GET['err'])){
                    if($_GET['err'] == "deleted"){
                        echo '<div class="alert alert-success" role="alert">
                        <b>Feedback Deleted Successfully!</b>
                    </div>';
                    }
                }
            ?>
        <div class="p-3 p-lg-2 bg-light rounded-3">
            <h1 class="display-5 text-center mb-5">Feedbacks Received</h1>
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
                    $sql = "SELECT * FROM feedbacks";
                    $results = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($results);
                    if($resultCheck > 0){
                      while($row = mysqli_fetch_assoc($results)){
                        $name = $row["sname"];
                        $id = $row["feedbackId"];
                        $branch = $row["sbranch"];
                        $rollno = $row["srollno"];
                        $subject = $row["fsubject"];
                        $feedback = $row["feedback"];
                        echo '<article>
                        <div class="card mb-3" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title h5">'.$name.'</h5>
                                <h6 class="card-subtitle mb-2 text-muted h6"><small>'.$branch.' ('.$rollno.')'.'</small></h6>
                                <p class="card-subtitle mb-2 h5"><strong>'.$subject.'</strong></p>
                                <p class="card-text lead">'.$feedback.'</p>
                                <form action"includes/feedback.inc.php" method="GET"><button type="submit" name="delete_feedback" value="'.$id.'" class="btn btn-sm btn-danger mx-3">Delete</button>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#message" data-bs-whatever="@mdo">Message</button>
                            </div>
                        </div>
                            <div class="modal fade" id="message" tabindex="-1" aria-labelledby="Message" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> New message </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                            <form method="POST" action="includes/message.inc.php">
                                                <div class="mb-3">
                                                    <label for="student-name" name="name" class="col-form-label">student Name:</label>
                                                    <input type="text" class="form-control" value="'.$name.'" id="student-name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="student-branch" name="branch" class="col-form-label" hidden>Branch:</label>
                                                    <input type="text" class="form-control" value="'.$branch.'" id="student-branch" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="student-rollno" name="rollno" class="col-form-label" hidden>Roll No:</label>
                                                    <input type="text" class="form-control" value="'.$rollno.'" id="student-rollno" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="student-topic" name="topic" class="col-form-label" hidden>Topic:</label>
                                                    <input type="text" class="form-control" value="'.$rollno.'" id="student-topic" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" name="message" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                                <button type="submit" name="send-message" class="btn btn-success">Send message</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        
                                        </div>
                                    </div>
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
