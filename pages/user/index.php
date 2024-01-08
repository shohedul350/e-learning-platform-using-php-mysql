
<?php
// Database connection
include("../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Execute the query
$userCountQuery = "SELECT COUNT(*) as userCount FROM users";
$userResult = mysqli_query($conn, $userCountQuery);
$userCount = mysqli_fetch_assoc($userResult)['userCount'];

// Fetch category count
$categoryCountQuery = "SELECT COUNT(*) as categoryCount FROM categories";
$categoryResult = mysqli_query($conn, $categoryCountQuery);
$categoryCount = mysqli_fetch_assoc($categoryResult)['categoryCount'];

// Fetch course count
$courseCountQuery = "SELECT COUNT(*) as courseCount FROM courses";
$courseResult = mysqli_query($conn, $courseCountQuery);
$courseCount = mysqli_fetch_assoc($courseResult)['courseCount'];

// Fetch the result
// $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../css/adminDashboardStyle.css">
</head>
<body>
    <?php  $pageTitle = "Welcome to User Panel!";
    include './header.php';?>
    <!-- sidebar include -->
    <?php include './sidebar.php';?>
    <div class="content" style="display:flex; justify-content:center">
    <div class="info-card">
            <h3>Total Join Course</h3>
            <p>  <?php echo $userCount; ?></p>
        </div>

    </div>
    </body>
</html>