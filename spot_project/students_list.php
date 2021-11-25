<?php 
  include_once 'base.php';
  include_once 'includes/dbh.inc.php';
?>

<div class="container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center mb-5">Registered Students</h1>
      <div class="m-1 m-lg-1">
        <section>
          <div
            class="
              container
              table-responsive
              shadow
              p-3
              rounded
              border
              col-lg-6 col-xxl-12 col-centered
              text-center
            "
          >
            <table class="table table-hover p-3 text-center">
              <thead>
                <tr>
                  <th scope="col">Sr.No.</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">Lastname</th>
                  <th scope="col">Branch</th>
                  <th scope="col">Roll No.</th>
                  <th scope="col">Email</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php 
                $sql = "SELECT * FROM users WHERE isAdmin=0";
                  $results = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($results);
                  if($resultCheck > 0){
                    $sr = 1;
                    while($row = mysqli_fetch_assoc($results)){
                      $firstname = $row["usersFirstname"];
                      $lastname = $row["usersLastname"];
                      $branch = $row["usersBranch"];
                      $rollno = $row["usersrollno"];
                      $email = $row["usersEmail"];
                      echo '<tr>
                      <th scope="row">'.$sr.'</th>
                      <td>'.$firstname.'</td>
                      <td>'.$lastname.'</td>
                      <td>'.$branch.'</td>
                      <td>'.$rollno.'</td>
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
      </section>
    </div>
  </div>
    </div>
    
  </body>
</html>
