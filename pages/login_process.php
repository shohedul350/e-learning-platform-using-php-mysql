<?php
include("../database/db_connection.php");
session_start();
$email = "";
$email    = "";
$errors = array(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);
    if (empty($email)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
          $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_assoc($results);
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['role'] = $row['role'];
            if ($row['role'] === 'user') {
                header('location: ../pages/user_dashboard.php');
            } elseif ($row['role'] === 'admin') {
                header('location: ../pages/admin/index.php');
            }
        }
        echo "Error:". $sql . "<br>". $conn->error;
    }
}
?>
