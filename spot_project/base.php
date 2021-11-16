<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/fde0352739.js"
      crossorigin="anonymous"
    ></script>
    <title>Homepage</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="./index.php">User Authentication</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto py-4 py-lg-0">
            <li class="nav-item">
              <a class="nav-link px-lg-3 py-3 py-lg-4" href="./index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link px-lg-3 py-3 py-lg-4" href="./signup.php"
                >Signup</a
              >
            </li>
            <?php
              if(isset($_SESSION["userid"])){
                echo '<li class="nav-item">
                <a class="nav-link px-lg-3 py-3 py-lg-4" href="includes/logout.inc.php"
                  >Logout</a
                >
              </li>';
              }
              else{
                echo '<li class="nav-item">
                <a class="nav-link px-lg-3 py-3 py-lg-4" href="./login.php"
                  >Login</a
                >
              </li>';
              }
            ?>
            
            
          </ul>
        </div>
      </div>
    </nav>
    