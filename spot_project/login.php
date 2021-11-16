<?php 
  include_once 'base.php';
?>
    <main class="container mt-5">
      <div
        class="
          shadow
          d-flex
          flex-column
          align-items-center
          justify-content-center
          p-3
        "
      >
        <h1 class="display-3 text-info p-lg-2 mt-0">Login Page</h1>
        <section class="container p-3 col-md-6">
          <!-- Error Message Display -->
        <?php
          if(isset($_GET['err'])){
            if($_GET['err'] == "emptyInputs"){
                echo '<div class="alert alert-danger" role="alert">
                <b>Please fill all necessary inputs.</b>
              </div>';
            }
            else if($_GET['err'] == "wrongLogin"){
              echo '<div class="alert alert-danger" role="alert">
                <b>Invalid Email.</b>
              </div>';
            }
            else if($_GET['err'] == "wrongPassword"){
              echo '<div class="alert alert-danger" role="alert">
                <b>Passwords should match.</b>
              </div>';
            }
            else if($_GET['err'] == "none"){
              echo '<div class="alert alert-success" role="alert">
                <b>Account created successfully! Please Login.</b>
              </div>';
            }
          }
        ?>
          <form class="form-group" action="includes/login.inc.php" method="post">
            <form>
              <div class="mb-3">
                <label for="email" class="form-label"
                  >Email address</label
                >
                <input
                  type="email"
                  name="email-login"
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
                />
                
              </div>
              <div class="mb-3">
                <label for="password" class="form-label"
                  >Password</label
                >
                <input type="password" name="password-login" id="password" class="form-control" aria-describedby="passwordHelpBlock">
              </div>
              
              <div class="mb-3 form-check">
                <input
                  type="checkbox"
                  name="show-password"
                  class="form-check-input"
                  id="show-password"
                />
                <label class="form-check-label" for="show-password"
                  >See Password</label
                >
              </div>
              <div class="d-flex w-100 align-items-center justify-content-center">
              <button type="submit" name="submit-login" class="btn btn-info">Login</button></div>
            
          </form>
        </section>

        <div class="container col-md-6">
            <a href="signup.php" class="signup-page">Not Registered? SignUp here.</a>
        </div>
      </div>
    </main>
    <script>
        function showPassword() {
          var ele = document.getElementById("password");
          if (ele.type === "password") {
            ele.type = "text";
          } else {
            ele.type = "password";
          }
        }
        document.querySelector('#show-password').addEventListener('click',showPassword);
      </script>
  </body>
</html>
