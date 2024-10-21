<?php
session_start();

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    $login_identifier = $_POST['login_identifier'];
    $password = $_POST['password'];

    // Check if the login identifier is a username, email, or phone number
    $query = "SELECT * FROM `userinfo` WHERE username='$login_identifier' OR email='$login_identifier' OR phone='$login_identifier'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['name'];
            header("Location: index.php?loginsuccess=true");
            exit();
        } else {
            $showError = "Invalid password";
        }
    } else {
        $showError = "Invalid username, email, or phone number";
    }

    mysqli_close($con);
}

header("Location: index.php?loginsuccess=false&error=$showError");
exit();
?>
