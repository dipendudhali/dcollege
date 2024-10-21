<?php include 'header.php';?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./Images/College 1.jpg" class="d-block w-100" height="600" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Welcome to Dhali's College</h2>
                <p>Ranked #1 in NIRF College Ranking</p>
                <?php
                        $sql="SELECT * FROM about";
                        $result = mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($result);
                ?>
                <button type="button" class="btn btn-danger mx-2">
                    Engineering #
                    <?php echo $row['engineering_rank'] ?>
                </button><button type="button" class="btn btn-warning mx-2">
                    Business #
                    <?php echo $row['business_rank'] ?>
                </button><button type="button" class="btn btn-info mx-2">
                    College #
                    <?php echo $row['college_rank'] ?>
                </button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./Images/College 3.jpg" class="d-block w-100" height="600" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Excellent Academic Excellence</h2>
                <p>Maximum of our students are placed</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./Images/College 5.jpg" class="d-block w-100" height="600" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Libary</h2>
                <p>A wide range of books and journals</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container my-4">
    <div class="row">
        <?php
              $sql="SELECT * FROM person";
              $result = mysqli_query($con,$sql);
              while($row = mysqli_fetch_array($result))
              { ?>
        <div class="col-lg-4 panel">
            <img src="<?php echo $row['photo'] ?>" class="bd-placeholder-img rounded-circle" width="140" height="140"
                role="img" alt="..." />
            <h2 class="fw-normal" align="center">
                <?php echo $row['designation'] ?>
            </h2>
            <h4 align="center">
                <b>
                    <?php echo $row['name'] ?>
                </b>
            </h4>
            <p>
                <?php echo substr($row['speech'],0,100) ?>...
            </p>
            <form action="person.php" method="post">
                <button type="submit" class="btn btn-danger" name="myString" value="<?php echo $row['id'] ?>">
                    View Details>>
                </button>
            </form>
        </div>
        <?php }
            ?>
    </div>
</div>
<div class="container my-4 mt-5">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">About Us</h2>
            <?php
                    $sql="SELECT * FROM about";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                ?>
            <p class="lead">
                <?php echo substr($row['info'],0,800) ?>
            </p>
        </div>
        <div class="col-md-5 my-4 pt-4">
            <div class="col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="<?php echo $row['photo'] ?>" width="500" height="300" role="img"
                        alt="About Image">
                    <div class="overlay">
                        <h2>Our Oldest Building</h2>
                        <a class="info" href="#">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-4">
    <h1 align="center">Faculties</h1>
    <div class="row gy-3 my-3">
        <?php
                $sql="SELECT * FROM faculties";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result))
                { 
            ?>
        <div class="col-md-3">
            <div class="card">
                <img src="<?php echo $row['faculty_photo'] ?>" class="card-img-top" alt="..." />
                <div class="card-body">
                    <p class="card-text">
                        Faculty of
                        <?php echo $row['faculty_name'] ?>
                    </p>
                    <form action="academic.php" method="post">
                        <button type="submit" class="btn btn-danger" name="myString"
                            value="<?php echo $row['faculty_id'] ?>">
                            Know More
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include 'footer.php';?>