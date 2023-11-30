<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <?php
    include("database/db_connection.php");

    $connection_status = "Database Connection: ";
    if ($db) {
        $connection_status .= "<span style='color: green;'>Connected</span>";
    } else {
        $connection_status .= "<span style='color: red;'>Not Connected</span>";
    }

    echo "<p>{$connection_status}</p>";
?>
    <p>Not registered yet? <a href="register.html">Register here</a>.</p>
    <p>Already have an account? <a href="pages/login.php">Login here</a>.</p>
</body>
</html>