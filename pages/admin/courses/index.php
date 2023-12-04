
<?php
// Database connection
include("../../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD Operations Start

$sql = "SELECT 
   courses.id ,
    courses.title,
    courses.description,
    courses.popular,
    courses.isHome,
    categories.id AS category_id,
    categories.name AS category_name,
    users.id AS instructor_id,
    users.name AS instructor_name,
    courses.release_date
    FROM courses LEFT JOIN categories ON courses.category_id = categories.id
LEFT JOIN users ON courses.instructor_id = users.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../css/adminDashboardStyle.css">
    <link rel="stylesheet" type="text/css" href="../../../css/courses.css">
</head>
<body>
    <!-- header include -->
    <?php  $pageTitle = "Courses!";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
    <div class="content">

    <h1>Course Management</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Popular</th>
        <th>Home</th>
        <th>Category ID</th>
        <th>Instructor ID</th>
        <th>Release Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['popular']}</td>
                    <td>{$row['isHome']}</td>
                    <td>{$row['category_name']}</td>
                    <td>{$row['instructor_name']}</td>
                    <td>{$row['release_date']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No courses found</td></tr>";
    }
    ?>

</table>

</div>
</body>
</html>