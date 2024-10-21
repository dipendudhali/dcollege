<?php
  $showAlert=false;
  $showError=false;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
    $username = $_POST['username'];
    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existSql = "SELECT * FROM `userinfo` WHERE username='$username'";
    $result = mysqli_query($con,$existSql);
    $numRow = mysqli_num_rows($result);

    $existEmailSql = "SELECT * FROM `userinfo` WHERE email='$email'";
    $emailResult = mysqli_query($con,$existEmailSql);
    $emailNumRow = mysqli_num_rows($emailResult);

    $existPhoneSql = "SELECT * FROM `userinfo` WHERE phone='$phone'";
    $phoneResult = mysqli_query($con,$existPhoneSql);
    $phoneNumRow = mysqli_num_rows($phoneResult);

    if ($numRow>0) {
      $showError='Username Already Exists,Please try with another username';
    }
    else if($emailNumRow > 0){
      $showError='Email Already Exists,Please try with another email';
    }
    else if($phoneNumRow > 0){
      $showError='Phone Already Exists,Please try with another phone number';
    }
    else{
      if ($password == $cpassword) {
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $Sql = "INSERT INTO `userinfo`(`name`, `username`, `reg_no`, `email`, `phone`, `password`, `Date`) VALUES ('$name','$username','$regno','$email','$phone','$hash',current_timestamp())";
        $result = mysqli_query($con,$Sql);
        if ($result) {
          $showAlert=true;
          header("Location:index.php?signupsuccess=true");
          exit();
        }
      }
      else{
        $showError='Passwords do not match';
      }
    }
    header("Location:index.php?signupsuccess=false&error=".urlencode($showError));
  }
?>