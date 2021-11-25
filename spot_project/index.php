<?php 
  include_once 'base.php';
?>

<header class="pt-5">
  <div class="container px-lg-5 h2 text-center">
<!-- Error Message Display -->
<?php
          if(isset($_GET['err'])){
            if($_GET['err'] == "emptyInputs"){
                echo '<div class="alert alert-danger" role="alert">
                <b>Please fill all necessary fields.</b>
              </div>';
            }
            else if($_GET['err'] == "stmtFailed"){
              echo '<div class="alert alert-danger" role="alert">
                <b>There is a some server error. Please try again later.</b>
              </div>';
            }
            else if($_GET['err'] == "none"){
              echo '<div class="alert alert-success" role="alert">
                <b>Feedback Sent Successfully!</b>
              </div>';
            }
           
          }
?>
</header>
    </div>
      <?php
              if(isset($_SESSION["userid"]) && $_SESSION["isAdmin"] == 0){
                // echo 'Welcome'."  "."<b style='color:red;'>".$_SESSION["name"]."</b>" ;
                echo '<section class="container px-lg-5 my-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                  <h1 class="display-3 text-center ">Welcome, '.$_SESSION["name"].'</h1>
                  <h1 class="display-6 text-center ">Give your feedback here.</h1>
                    <div class="m-4 m-lg-5">
                    <form method="POST" action="includes/feedback.inc.php">
                      <div class="form-group my-4">
                        <label for="name" >Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="'.$_SESSION["name"].' '.$_SESSION["lastname"].'">
                      </div>
                      <div class="input-group mb-3">
                        <select
                          class="form-select"
                          name="branch"
                          id="inputGroupSelect04"
                          aria-label="Select Branch*"
                        >
                          <option selected>'.$_SESSION["branch"].'</option>
                          <option value="Computer Engineering">
                            Computer Engineering
                          </option>
                          <option value="Electronics and Telecommunication Engineering">
                            Electronics and Telecommunication Engineering
                          </option>
                          <option value="Civil Engineering">Civil Engineering</option>
                          <option value="Mechanical Engineering">
                            Mechanical Engineering
                          </option>
                          <option value="Instrumental Engineering">
                            Instrumental Engineering
                          </option>
                          <option value="Automobile Engineering">
                            Automobile Engineering
                          </option>
                        </select>
                      </div>
                      <div class="form-group my-4">
                        <label for="rollno">Roll No.*</label>
                        <input type="text" class="form-control" id="rollno" name="rollno" value="'.$_SESSION["rollno"].'">
                      </div>
                      <div class="form-group my-4">
                        <label for="subject">Subject*</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Eg. About Computer Department">
                      </div>
                      <div class="form-group my-4">
                        <label for="feedback">Feedback*</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
                      </div>
                      <div class="col-12 my-1 text-center">
                        <button type="submit" name="send-feedback" class="btn btn-primary">
                          Send Feedback
                        </button>
                      </div>
                    </form>
                    </div>
                </div>
              </section>
            </body>
          </html>
          ';
                
              }else if($_SESSION["isAdmin"] == 1){
                echo '<header class="py-5">
                <div class="container px-lg-5">
                  <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                      <h1 class="display-5 fw-bold">A Warm Welcome Admin!</h1>
                      </div>
                    </div>
                  </div>
                </header>
                      ';
              }
              else{
                header("location: ./login.php");
              }
            ?>
       
      
    