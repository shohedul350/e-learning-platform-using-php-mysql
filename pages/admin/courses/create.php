<?php
// Database connection
include("../../../database/db_connection.php");
$statusMsg = '';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM categories");
$instructor = $conn->query("SELECT * FROM users");

if (isset($_POST['add_course'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $popular = $_POST['popular'] ? 1 : 0;
    $isHome = $_POST['isHome'] ? 1 : 0;
    $category_id = $_POST['category_id'];
    $instructor_id = $_POST['instructor_id'];
    $release_date = $_POST['releaseDate'];
    $price = $_POST['price'];
    $targetDir = "../../../uploads/";
    $image = $_FILES['feature_image'];
    $imageName  = $image['name'];

    if (!empty($image['name'])) {
        $targetFile = $targetDir . $image['name'];
        move_uploaded_file($image["tmp_name"], $targetFile);
        // if(move_uploaded_file($image["tmp_name"], $targetFilePath)) {
        //     echo "Success";
        // }
        // else {
        //     echo "Error";
        // }
        // if (move_uploaded_file($image["tmp_name"], $targetFilePath)) {
        //     $sql = "INSERT INTO courses (title, description, popular, isHome, category_id, instructor_id, user_id, release_date, feature_image, price)
        // VALUES ('$title', '$description', '$popular', '$isHome' ,'$category_id', '$instructor_id', 1, '2023-01-01',  '$imageName', '$price')";

        //     if ($conn->query($sql) === TRUE) {
        //         echo "New record created successfully";
        //     } else {
        //         echo '<div style="color: red;">Error: ' . $conn->error . '</div>';
        //     }
        // } else {
        //     $statusMsg = "Sorry, there was an error uploading your file.";
        // }
        $sql = "INSERT INTO courses (title, description, popular, isHome, category_id, instructor_id, user_id, release_date, feature_image, price)
        VALUES ('$title', '$description', '$popular', '$isHome' ,'$category_id', '$instructor_id', 1, '2023-01-01',  '$imageName', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo '<div style="color: red;">Error: ' . $conn->error . '</div>';
        }
    }
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
    <?php $pageTitle = "Courses!";
    include '../header.php'; ?>
    <!-- sidebar include -->
    <?php include '../sidebar.php'; ?>
    <div class="content">

        <?php
        echo '<div style="color: red;">Error: ' . $statusMsg . '</div>';
        ?>
        <h1>Create Course</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required value="test">
            <span id="titleError" class="error"></span>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required value="test"></textarea>
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

            <label for="image">Feature Image:</label>
            <input type="file" name="feature_image" accept="image/*" required>


            <label for="price">Price:</label>
            <input type="text" name="price" required>


            <input type="submit" value="Submit" name="add_course">
        </form>

    </div>
</body>

</html>