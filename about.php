<?php
  include 'header.php';
  $sql="SELECT * FROM about";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
?>
    <div class="jumbotron jumbotron-fluid" style="background-color: #e3f2fd;">
  <div class="container">
    <h1 class="display-4"><span class="input"></span></h1>
    <p class="lead">Ranked #<?php echo $row['college_rank'] ?> in NIRF College Ranking</p>
  </div>
</div>
<div class="container my-4">
  <div class="row"><h1 class="text-center featurette-heading fw-normal lh-1">About Us</h1></div>
  <div class="row featurette">
      <div class="col-md-7">
        <br>
        <p class="lead"><?php echo $row['info'] ?></p>
      </div>
      <div class="col-md-5 my-4">
    <img src="<?php echo $row['photo'] ?>"  width="500" height="300" role="img" alt="..." class="gg">
      </div>
  </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
      var typed = new Typed(".input",{
        strings:["Welcome to Dhali's College","Ranked #<?php echo $row['college_rank'] ?> in NIRF College Ranking","Ranked #<?php echo $row['engineering_rank'] ?> in NIRF Engineering College Ranking","Ranked #<?php echo $row['business_rank'] ?> in Business College Ranking","Ranked #<?php echo $row['pharmacy_rank'] ?> in NIRF Pharmacy College Ranking"],
        typeSpeed: 70,
        backSpeed: 60,
        loop:true
      });
    </script>
<?php include 'footer.php';?>