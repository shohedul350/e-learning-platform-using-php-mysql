<?php

    include("../database/db_connection.php");
    session_start();
    echo "hello";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("location: ../pages/dashboard.php");
        // $username = mysqli_real_escape_string($db, $_POST['username']);
        // $password = mysqli_real_escape_string($db, $_POST['password']);
        // $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
        // $result = mysqli_query($db, $sql);
        // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        // $count = mysqli_num_rows($result);
        // echo "ok";
        // if ($count == 0) {
        //     $_SESSION['login_user'] = $username;
        //     header("location: dashboard.php");
        // } else {
        //     $error = "Your Login Name or Password is invalid";
        //     echo $error;
        // }
    }
?>