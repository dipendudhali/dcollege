<?php
	include 'header.php';
	$person = $_POST['myString'];
?>
      <div class="jumbotron jumbotron-fluid" style="background-color: #e3f2fd;">
        <div class="container">
          <?php
            	$sql = "select * from person where ID = $person";
            	$result = mysqli_query($con,$sql);
            	$row = mysqli_fetch_array($result);
          ?>
          <h1 class="display-4 text-center">Our <?php echo $row['designation'] ?></h1>
        </div>
      </div>
      <div class="container-lg">
        <div class="row min-vh-100 align-items-center align-content-center">
          <div class="col-md-6">
            <div class="home-img text-center">
             <img src="<?php echo $row['photo'] ?>" class="bd-placeholder-img rounded-circle" width="280" height="280" role="img" alt="Profile Pic">
            </div>
          </div>
          <div class="col-md-6 order-md-first">
            <div class="home-text">
             <p class="text-muted mb-1">Hello I'm</p>
             <h1 class="text-primary text-uppercase fs-1"><span class="input"></span></h1>
             <p><?php echo $row['speech'] ?></p>
             <a href="#" class="btn btn-primary" px-3 mt-3>More >></a>
            </div>
          </div>  
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
      var typed = new Typed(".input",{
        strings:["<?php echo $row['name'] ?>","<?php echo $row['designation'] ?> of Dhali's College"],
        typeSpeed: 70,
        backSpeed: 60,
        loop:true
      });
      </script>
<?php include 'footer.php';?>