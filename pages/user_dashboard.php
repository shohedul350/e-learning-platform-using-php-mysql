
<?php
session_start(); 
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    echo "Hello, $name!";
} else {
    echo "User name not found in the session.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the User Dashboard</h1>
 
    <a href="/elearning/index.php">Logout</a>

</body>



</html>