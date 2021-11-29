<?php 
  include_once 'base.php';
  include_once 'includes/dbh.inc.php';
?>

        <div class="container px-lg-2 my-5">
            <!-- alerts -->
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