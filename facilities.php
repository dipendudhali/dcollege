<?php
  include 'header.php';
  $facility = $_POST['myString'];
  $sql="select * from facilities where ID = $facility";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
?>
    <div class="jumbotron jumbotron-fluid" style="background-color: #e3f2fd;">
      <div class="container">
        <h1 class="display-4 text-center"><?php echo $row['type'] ?></h1>
      </div>
    </div>
    <div class="container-lg">
      
    </div>
<?php include 'footer.php';?>