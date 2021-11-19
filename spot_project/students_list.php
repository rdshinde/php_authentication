<?php 
  include_once 'base.php';
  include_once 'includes/dbh.inc.php';
?>
    <main class="container d-flex justify-content-center align-items-center flex-column">
      <div class=" container display-3 m-5 p-lg-2 rounded h-100 text-info rounded ">

      
      <h1 class="d-flex justify-content-center align-items-center flex-column ">Registered Students</h1>
      </div>
          <div class="container table-responsive shadow p-5 rounded border col-lg-8 col-xs-12 col-centered">
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
                $sql = "SELECT * FROM users WHERE isAdmin=0";
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
    </main>
  </body>
</html>
