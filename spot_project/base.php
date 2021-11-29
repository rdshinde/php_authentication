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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="mainNav">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="./index.php">Feedback System</a>
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
            
           <?php
              if(isset($_SESSION["userid"]) && $_SESSION["isAdmin"] === 1){
                echo '<li class="nav-item dropdown m-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin Section
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="./feedback.php">Feedbacks</a></li>
                  <li><a class="dropdown-item" href="./students_list.php">Registered Students</a></li>
                  <li><a class="dropdown-item" href="./sent_msg.php">Messages Sent</a></li>
                </ul>
              </li>';
              echo '<li class="nav-item ">
                <a class="nav-link px-lg-3 py-3 py-lg-4 " href="includes/logout.inc.php"
                  ><span class="btn btn-danger btn-sm">Logout</span></a
                >
              </li>';
              }

              if(isset($_SESSION["userid"])&& $_SESSION["isAdmin"] === 0){
                echo '<li class="nav-item ">
                <a class="nav-link px-lg-3 py-3 py-lg-4 " href="recieved_msg.php"
                  ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg></a
                >
              </li>';
                echo '<li class="nav-item ">
                <a class="nav-link px-lg-3 py-3 py-lg-4 " href="includes/logout.inc.php"
                  ><span class="btn btn-danger btn-sm">Logout</span></a
                >
              </li>';
                
              }
              else if(!isset($_SESSION["userid"])){
                echo '<li class="nav-item">
                
              <li class="nav-item">
              <a class="nav-link px-lg-3 py-3 py-lg-4" href="./signup.php"
                ><span class="btn btn-info btn-sm">Signup</span></a
              >
               </li>';
              }
              
              
            ?>
            
            
          </ul>
        </div>
      </div>
    </nav>
    