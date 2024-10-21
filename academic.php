<?php 
  include 'header.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department = $_POST['myString'];
  }
?>

    <div class="container-lg mx-7">
      <div class="row mx-3">
        <?php
          $sql="SELECT * FROM $department";
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_array($result))
          {
        ?>
        <div class="col-md-3 academic_column" height="300">
          <div class="departments shadow-sm p-4 rounded bg-white">
            <div class="icon my-3 text-danger fs-2">
              <i class="<?php echo $row['logo'] ?>"></i>
            </div>
            <h3 class="fs-5 py-2">Department Of <?php echo $row['dept_name'] ?></h3>
            <p>Phone No:<?php echo $row['phone'] ?></p>
            <p>Email:<?php echo $row['email'] ?></p>
            <p>No. Of Faculties:<?php echo $row['capacity'] ?></p>
            <p>H.O.D. : <?php echo $row['hod'] ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
<?php include 'footer.php';?>