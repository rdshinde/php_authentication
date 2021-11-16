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
          rounded-3
        "
      >
        <h1 class="display-3 text-info p-lg-2 mt-0">Signup Page</h1>
        <!-- Error Message Display -->
        <?php
          if(isset($_GET['err'])){
            if($_GET['err'] == "emptyInputs"){
                echo '<div class="alert alert-danger" role="alert">
                <b>Please fill all necessary inputs.</b>
              </div>';
            }
            else if($_GET['err'] == "invalidEmail"){
              echo '<div class="alert alert-danger" role="alert">
                <b>Invalid Email.</b>
              </div>';
            }
            else if($_GET['err'] == "passwordNotMatching"){
              echo '<div class="alert alert-danger" role="alert">
                <b>Passwords should match.</b>
              </div>';
            }
            else if($_GET['err'] == "emailExists"){
              echo '<div class="alert alert-danger" role="alert">
                <b>Email alredy registered. Try another.</b>
              </div>';
            }
          }
        ?>
        <section class="container p-3 col-md-6">
          <form class="form-group" action="includes/signup.inc.php" method="post">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">First Name</span>
              <input
                type="text"
                class="form-control"
                name="firstname"
                aria-label="name"
                aria-describedby="basic-addon1"
              />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Last Name</span>
              <input
                type="text"
                class="form-control"
                name="lastname"
                aria-label="lastname"
                aria-describedby="basic-addon1"
              />
            </div>
            <div class="input-group mb-3">
              <select
                class="form-select"
                name="branch"
                id="inputGroupSelect04"
                aria-label="Select Branch "
              >
                <option selected>Select Branch</option>
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
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input
                type="email"
                name="email"
                class="form-control"
                id="email"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="mb-3">
              <label for="password1" class="form-label">Create Password</label>
              <input
                type="password"
                name="password"
                id="password1"
                class="form-control"
                aria-describedby="passwordHelpBlock"
              />
            </div>
            <div class="mb-3">
              <label for="password2" class="form-label">Confirm Password</label>
              <input
                type="password"
                name="confirm-password"
                id="password2"
                class="form-control"
                aria-describedby="passwordHelpBlock"
              />
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
              <button type="submit" name="submit" class="btn btn-info">SignUp</button>
            </div>
          </form>
        </section>

        <div class="container col-md-6">
          <a href="login.php" class="signup-page"
            >Already Registered? Login here.</a
          >
        </div>
        
      </div>
    </main>
    <script>
      function showPassword() {
        var ele = document.getElementById("password2");
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
