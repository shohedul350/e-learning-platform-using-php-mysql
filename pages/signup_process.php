<?php
include("../database/db_connection.php");
session_start();
$name= "";
$email= "";
$password= "";
$errors = array(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn , $_POST['name']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);
    if (empty($name)) {
    array_push($errors, "Name is required");
    }
    if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  $checkUsernameQuery = "SELECT * FROM users WHERE email='$email'";
  $results = mysqli_query($conn, $checkUsernameQuery);
  if (mysqli_num_rows($results) == 1) {
    header('location: ../pages/login.php');
}else {
  $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "New record created successfully.";
    header('location: ../pages/user/index.php');
  }else{
    echo "Error:". $sql . "<br>". $conn->error;
  }
}
}
}
?>
