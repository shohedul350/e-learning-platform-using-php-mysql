
<?php
// Database connection
include("../../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM categories");
$instructor = $conn->query("SELECT * FROM users");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category_id = $_POST['category_id'];
  $instructor_id = $_POST['instructor_id'];
  $release_date = $_POST['releaseDate'];
  $popular = isset($_POST['popular']) ? 1 : 0;
  $is_home = isset($_POST['isHome']) ? 1 : 0;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../css/adminDashboardStyle.css">
    <link rel="stylesheet" type="text/css" href="../../../css/courses.css">
    <link rel="stylesheet" type="text/css" href="../../../css/createCourse.css">

</head>
<body>
    <!-- header include -->
    <?php  $pageTitle = "Courses!";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
    <div class="content">

    <h1>Create Course</h1>

    <form id="courseForm" action="#" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <span id="titleError" class="error"></span>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <span id="descriptionError" class="error"></span>

        <label for="category">Category:</label>
        <select id="category_id" name="category_id">
        <?php

if ($result->num_rows > 0) {
    // Fetch data from the result set
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];  
        $name = $row['name'];
        echo "<option value=\"$id\">$name</option>";
    }
} else {
    echo "<option value=\"\">No categories found</option>";
}
?>
</select>

        <label for="instructor">Instructor:</label>
        <select id="instructor_id" name="instructor_id">
        <?php

if ($instructor->num_rows > 0) {
    // Fetch data from the result set
    while ($row = $instructor->fetch_assoc()) {
        $id = $row['id'];  
        $name = $row['name'];
        echo "<option value=\"$id\">$name</option>";
    }
} else {
    echo "<option value=\"\">No instructor found</option>";
}
?>
</select>

        <label for="releaseDate">Release Date:</label>
        <input type="date" id="releaseDate" name="releaseDate">

        <label for="popular">Popular:</label>
        <input type="checkbox" id="popular" name="popular">

        <label for="isHome">Featured on Homepage:</label>
        <input type="checkbox" id="isHome" name="isHome">

        <input type="submit" value="Submit">
    </form>

</div>
</body>
</html>