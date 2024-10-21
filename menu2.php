<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dhali's College</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Courses
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Bachelor of Arts</a></li>
              <li><a class="dropdown-item" href="#">Master of Arts</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Bachelor of Education</a></li>
              <li><a class="dropdown-item" href="#">Master of Education</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Bachelor of Business Administration</a></li>
              <li><a class="dropdown-item" href="#">Master of Business Administration</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Bachelor of Computer Application</a></li>
              <li><a class="dropdown-item" href="#">Master of Computer Application</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Bachelor of Science</a></li>
              <li><a class="dropdown-item" href="#">Master of Science</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Bachelor of Pharmacy</a></li>
              <li><a class="dropdown-item" href="#">Master of Pharmacy</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Bachelor of Technology</a></li>
              <li><a class="dropdown-item" href="#">Master of Technology</a></li>
            </ul>
          </li>
<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ ?>
          <li class="nav-item">
            <a class="nav-link" href="studenthome.php">My Account</a>
          </li>
<?php } ?>
        </ul>
<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
            <input class="form-control mr-sm-2" name="search" type="search" actiion="search.php" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <p class="text-light my-0 mx-2">Welcome '. $_SESSION['username']. ' </p>
          <a href="logout.php" class="btn btn-outline-success ">Logout</a>';
  }
  else{ 
    echo '<form class="d-flex my-2 my-lg-0" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
          <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>';
  }
?>
      </div>
    </div>
</nav>
<?php 
    include 'loginModal.php';
    include 'signupModal.php';
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Successfully</strong> signed up, now you can log in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']!="true"){
    $showError = urldecode($_GET['error']);
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Sorry!</strong> '.$showError.'.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Successfully</strong> loggedin,Now you access your profile.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Sorry!</strong> ' . $_GET['error'] . '.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
?>