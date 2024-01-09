
<?php
// Database connection
include("../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD Operations Start


$sql = "SELECT 
   courses.id ,
    courses.title,
    courses.feature_image,
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
    courses.feature_image,
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/courses.css">
</head>
<body>
    <!-- ===== main menu part start =====  -->
    <header id="main_menu">
        <div class="container">
            <div class="main_menu">
                <div class="logo_part">
                <a href="../index.php">
                        <h2>E-learning</h2>
                    </a>
                </div>
                <div class="nav_item_">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../../elearning/pages/about.php">About</a></li>
                        <li><a href="../../elearning/pages/courses.php">Course</a></li>
                        <li><a href="../../elearning/pages/newsBlog.php">News</a></li>
                        <li><a href="../../elearning/pages/contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="login_part">
                    <ul>
                        <li><a href="../../elearning/pages/login.php">Login</a></li>
                        <li><a class="signup" href="pages/login.php">sign up</a></li>
                        <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- ----- main menu part end ----- -->

    <!-- ----- courses part start ----- -->
    <section id="courses" >
        <div class="container">
            <div class="course_head">
                <h1>Our Courses</h1>
            </div>

            <div class="course_cards">


            <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
            <div class='course_item'>
                <div class='course_icon'>
                <img src='../uploads/" . $row['feature_image'] . "' alt='card icon'>
                </div>
                <div class='course_text'>
                    <h2>" . $row['course_title'] . "</h2>
                    <div class='mentor'>
                        <p>By <span class='mentor_name'>" . $row['instructor_name'] . "</span></p>
                    </div>
                    <p>" . $row['description'] . "</p>
                </div>
                <div class='course_price'>
                    <h5>" . $row['price'] . "</h5>
                </div>
                <div class='course_button'>
                    <a href='#'>Join Course</a>
                </div>
            </div>
        ";
    }
} else {
    echo "<p>No courses found</p>";
}
?>

            </div>
        </div>
    </section>
    <!-- ----- courses part end ----- -->
</body>
</html>