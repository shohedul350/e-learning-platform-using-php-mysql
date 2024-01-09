
<?php
// session_start();
// Database connection
include("../../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch user data
$userId = $_SESSION['id'];
// $sql = "SELECT * FROM users WHERE id= '$userId'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     $userData = $result->fetch_assoc();
// } else {
//     return false;
// }
// CRUD Operations Start
// echo $userId
// Read
$result = $conn->query("SELECT 
    joincourses.id AS id,
    joincourses.join_date,
    courses.id AS course_id,
    courses.title AS courses_title,
    users.id AS user_id,
    users.name AS user_name,
    users.email AS user_email
FROM
    joincourses
    LEFT JOIN courses ON joincourses.course_id = courses.id
    LEFT JOIN users ON joincourses.user_id = users.id WHERE joincourses.user_id = 4");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../css/adminDashboardStyle.css">
    <link rel="stylesheet" type="text/css" href="../../../css/category.css">
</head>
<body>
    <!-- header include -->
    <?php  $pageTitle = "";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
    <div class="content">

    <h2>Join List</h2>


<!-- search section -->
<form action="" method="get">
    <input type="text" name="src" placeholder="Search....">
    <button type="submit">Search</button>
</form>
<!-- Display -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>join Date</th>
        <th>Course Name</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['user_name'] . "</td>";
        echo "<td>" . $row['user_email'] . "</td>";
        echo "<td>" . $row['join_date'] . "</td>";
        echo "<td>" . $row['courses_title'] . "</td>";
    }
    ?>
</table>


</div>
</body>
</html>