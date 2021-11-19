<?php 
  include_once 'base.php';
  include_once 'spot_project/includes/dbh.inc.php';
?>
    <main class="container d-flex justify-content-center align-items-center">
      <div class="row display-3 m-5 p-lg-5 shadow rounded h-100 text-info ">

      
      <h1 class="d-flex justify-content-center align-items-center flex-column ">
      <?php
              if(isset($_SESSION["userid"])){
                echo 'Welcome'."  "."<b style='color:red;'>".$_SESSION["name"]."</b>".$_SESSION["isAdmin"] ;
              }
              else{
                echo 'Welcome To Authentication Homepage';
              }
            ?>
       
      </h1>
      </div>
              <div>
              <?php
                  $sql = "SELECT * FROM users";
                  $results = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($results);

                  if($resultCheck > 0){
                    
                    while($row = mysqli_fetch_assoc($results)){
                      echo $row;
                    }
                  }
                  else{
                    echo '<h1 class="d-flex justify-content-center align-items-center flex-column "> No Data Found </h1>';
                  }
              ?>
              </div>
    </main>
  </body>
</html>
