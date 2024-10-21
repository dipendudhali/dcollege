<?php
include 'header.php';
// check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: index.php?loginsuccess=false&error=Please log in to continue"); // redirect to login page if not logged in
  exit;
}

// display student's result based on database query
include 'config.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM `studentinfo` WHERE `name`='$username'";
$result = mysqli_query($con, $sql);
?>
  <div class="container my-5">
    <h1>Student Result</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Course</th>
            <th>Department</th>
            <th>Marks Obtained</th>
            <th>Total Marks</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $row['course']; ?></td>
              <td><?php echo $row['department']; ?></td>
              <td><?php echo $row['marks_obtained']; ?></td>
              <td><?php echo $row['total_marks']; ?></td>
              <td><?php echo $row['grade']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<?php include 'footer.php'; ?>