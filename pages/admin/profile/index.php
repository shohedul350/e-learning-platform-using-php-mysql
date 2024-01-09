<?php
session_start();
// Database connection
include("../../../database/db_connection.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        
/**
 * update user information
 */
if(isset($_POST['updateBio'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = $conn->query("UPDATE `users` SET `name`='$name',`email`='$email' WHERE `id` = '$id'");
}

/**
 * update user password
 */
if(isset($_POST['updatePass'])){
    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = $conn->query("UPDATE `users` SET `password`='$password' WHERE `id` = '$id'");
}

// Fetch user data
$userId = $_SESSION['id'];; 
$sql = "SELECT * FROM users WHERE id= '$userId'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../css/adminDashboardStyle.css">

    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
        h2 {
  color: #333;
}

form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input {
  padding: 8px;
  margin-bottom: 10px;
}

button {
  padding: 8px 15px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  cursor: pointer;
}

    </style>
</head>
<body>
    <?php  $pageTitle = "Welcome to Admin Panel!";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
  

    <div class="container">
   
      <h1>Welcome, <?php echo $userData['name']; ?>!</h1>
        <p>Email: <?php echo $userData['email']; ?></p>

        <h2>Update Bio</h2>
        <form method="post" action="">
            <input type="text" name="id" value="<?php echo $userData['id']; ?>" hidden>
        <input type="text" name="name" value="<?php echo $userData['name']; ?>">
        <input type="email" name="email" value="<?php echo $userData['email']; ?>">
            <input type="submit" name="updateBio" value="Update Profile">
        </form> 

        <h2>Update password</h2>
        <form method="post" action="">
            <input type="text" name="id" value="<?php echo $userData['id']; ?>" hidden>
            <input type="password" name="password" placeholder="New Password">
            <input type="submit" name="updatePass" value="Update Password">
        </form> 
    </div>

    </body>
</html>