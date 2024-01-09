
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
    courses.price,
    categories.id AS category_id,
    categories.name AS category_name,
    users.id AS instructor_id,
    users.name AS instructor_name,
    courses.release_date
    FROM courses LEFT JOIN categories ON courses.category_id = categories.id
LEFT JOIN users ON courses.instructor_id = users.id";


$sql_search = "SELECT 
    courses.id ,
    courses.title,
    courses.description,
    courses.popular,
    courses.isHome,
    courses.price,
    categories.id AS category_id,
    categories.name AS category_name,
    users.id AS instructor_id,
    users.name AS instructor_name,
    courses.release_date
    FROM courses LEFT JOIN categories ON courses.category_id = categories.id
LEFT JOIN users ON courses.instructor_id = users.id WHERE courses.title LIKE '%$src%'";


// Delete
if (isset($_GET['delete_course'])) {
    $delete_id = $_GET['delete_course'];
    $sql = "DELETE FROM courses WHERE id=$delete_id";
    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header("Location: /elearning/pages/admin/courses/index.php"); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if(isset($_GET['src'])){
    $src = $_GET['src'];
    $result = $conn->query($sql_search);
}
else{
    $result = $conn->query($sql);
}
// $result = $conn->query($sql);
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
    <?php  $pageTitle = "Courses!";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
    <div class="content">

    <h1>Course Management</h1>
    <a href="create.php">
    <button style="background-color: #4CAF50;
                border: none;
                color: white;
                padding: 10px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 12px;
                margin: 10px 10px 10px 0px;
                cursor: pointer;">
   Create Course
</button>
</a>



    <form action="" method="get">
    <input type="text" name="src" placeholder="Search....">
    <button type="submit">Search</button>
</form>


<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Popular</th>
        <th>Category ID</th>
        <th>Instructor ID</th>
        <th>Release Date</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['popular']}</td>
                    <td>{$row['category_name']}</td>
                    <td>{$row['instructor_name']}</td>
                    <td>{$row['release_date']}</td>
                    <td>{$row['price']}</td>

                    <td>
                    <span>
                    <a href='index.php?delete_course=" . $row['id'] . "' 
                    style='color: red; text-decoration: none; margin-right: 10px;'>
                    Delete</a>
        
                    <a href='index.php?edit_course=" . $row['id'] . "' 
                    style='color: red; text-decoration: none; margin-right: 10px;'>
                    Edit</a>
                    </td>
                  
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