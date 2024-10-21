<?php
    include 'loginModal.php';
    include 'signupModal.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="./Images/logo.png" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="academics.php" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Academics
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Faculties</a></li>
                        <li><a class="dropdown-item" href="#">Undergraduate Courses</a></li>
                        <li><a class="dropdown-item" href="#">Postgraduate Courses</a></li>
                        <li><a class="dropdown-item" href="#">Doctoral Programs</a></li>
                        <li><a class="dropdown-item" href="student.php">Students Corner</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Admission
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">UG</a></li>
                        <li><a class="dropdown-item" href="#">PG</a></li>
                        <li><a class="dropdown-item" href="#">PhD</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                </li>
            </ul>
            <!-- <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
            <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button> -->
            <a href="admission.php" target="_blank">
                <button type="button" class="btn btn-primary mx-2">Admission</button>
            </a>
        </div>
    </div>
</nav>


