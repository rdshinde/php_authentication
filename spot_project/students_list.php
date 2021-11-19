<?php 
  include_once 'base.php';
  include_once 'includes/dbh.inc.php';
?>
    <main class="container d-flex justify-content-center align-items-center flex-column">
      <div class="row display-3 m-5 p-lg-5 shadow rounded h-100 text-info ">

      
      <h1 class="d-flex justify-content-center align-items-center flex-column ">
      <?php
              if(isset($_SESSION["userid"])){
                echo 'Welcome Admin'."  "."<b style='color:red;'>".$_SESSION["name"]."</b>" ;
              }
              else{
                echo 'Welcome To Authentication Homepage';
              }

              
            ?>
       
      </h1>
      </div>
              <div>
              <div class="table-responsive">
          <table class="table table-hover p-3">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Branch</th>
                <th scope="col">Email</th>
                
              </tr>
            </thead>
            <tbody>
                <?php 
                
                $sql = "SELECT * FROM users";
                  $results = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($results);

                  if($resultCheck > 0){
                    $sr = 1;
                    while($row = mysqli_fetch_assoc($results)){
                      $firstname = $row["usersFirstname"];
                      $lastname = $row["usersLastname"];
                      $branch = $row["usersBranch"];
                      $email = $row["usersEmail"];
                      echo '<tr>
                      <th scope="row">'.$sr.'</th>
                      <td>'.$firstname.'</td>
                      <td>'.$lastname.'</td>
                      <td>'.$branch.'</td>
                      <td>'.$email.'</td>
                          </tr>';
                        $sr = $sr+1;
                      
                    }
                  }
                  else{
                    echo '<h1 class="d-flex justify-content-center align-items-center flex-column "> No Data Found </h1>';
                  }
                ?>
                </tbody>
          </table>
      </div>
              </div>
    </main>
  </body>
</html>
