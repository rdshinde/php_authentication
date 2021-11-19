<?php 
  include_once 'base.php';
?>
    <main class="container d-flex justify-content-center align-items-center">
      <div class="row display-3 m-5 p-lg-5 shadow rounded h-100 text-info ">

      
      <h1 class="d-flex justify-content-center align-items-center flex-column ">
      <?php
              if(isset($_SESSION["userid"])){
                echo 'Welcome'."  "."<b style='color:red;'>".$_SESSION["name"]."</b>" ;
              }
              else{
                echo 'Welcome To Authentication Homepage';
              }
            ?>
       
      </h1>
      </div>
    </main>
  </body>
</html>
