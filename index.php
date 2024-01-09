
<?php
// Database connection
include("./database/db_connection.php");

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
LEFT JOIN users ON courses.instructor_id = users.id LIMIT 3";


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
    <title>E-learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- ===== main menu part start =====  -->
    <header id="main_menu">
        <div class="container">
            <div class="main_menu">
                <div class="logo_part">
                    <a href="./index.php">
                        <h2>E-learning</h2>
                    </a>
                </div>
                <div class="nav_item_">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="../elearning/pages/about.php">About</a></li>
                        <li><a href="../elearning/pages/courses.php">Course</a></li>
                        <li><a href="../elearning/pages/newsBlog.php">News</a></li>
                        <li><a href="../elearning/pages/contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="login_part">
                    <ul>
                        <li><a href="pages/login.php">Login</a></li>
                        <li><a class="signup" href="pages/login.php">sign up</a></li>
                        <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- ----- main menu part end ----- -->

    <!-- ===== hero part start =====  -->
    <section id="hero_part">
        <div class="container">
            <div class="hero_row">
                <div class="hero_text_part">
                    <div class="hero_title">
                        <h3>Learn with our expert's</h3>
                        <h1>Start Learning
                            <span>Web Design</span> in
                            E-Learning Platform.
                        </h1>
                        <p>Elevate Education with E-Learning platform. Your Gateway to Interactive Learning Excellence!</p>
                    </div>
                    <div class="hero_buttons">
                        <div class="signup_button"><a href="pages/login.php">Sign Up</a></div>
                        <div class="play_button">
                            <a href="#"><i class="fa-solid fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="hero_image_part">
                    <img src="https://ethemestudio.com/demo/larna/images/feature/home4-feature-img1.png" alt="hero image">
                </div>
            </div>
        </div>
    </section>
    <!-- ----- hero part end ----- -->

    <!-- ===== awesome part start =====  -->
    <section id="awesome">
        <div class="container">
            <div class="awesome_head">
                <h3>Our awesome Mentor</h3>
                <h1>10 Years Experience in Education</h1>
                <p>With a decade of expertise in education, our seasoned team brings a wealth of experience to cultivate a dynamic and
                enriching learning environment.</p>
            </div>
            <div class="awesome_cards">
                <div class="awesomeCard_item">
                    <div class="awesomeCard_icon">
                        <img src="https://ethemestudio.com/demo/larna/images/icon/hm4-intro-icon1.png" alt="card icon">
                    </div>
                    <div class="awesomeCard_text">
                        <h2>Learn Everything</h2>
                        <p>Empowering Minds, Igniting Curiosity, and Fueling a Lifelong Journey of Discovery.</p>
                    </div>
                    <div class="awesomeCard_button">
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="awesomeCard_item">
                    <div class="awesomeCard_icon">
                        <img src="https://ethemestudio.com/demo/larna/images/icon/hm4-intro-icon2.png" alt="card icon">
                    </div>
                    <div class="awesomeCard_text">
                        <h2>Top Quality Education</h2>
                        <p> Top Quality Education: Elevating Minds, Inspiring Excellence. Your Gateway to a Future of Success</p>
                    </div>
                    <div class="awesomeCard_button">
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="awesomeCard_item">
                    <div class="awesomeCard_icon">
                        <!-- <img src="../images/awesomeCard_icon3.png" alt="card icon"> -->
                        <img src="https://ethemestudio.com/demo/larna/images/icon/hm4-intro-icon3.png" alt="card icon">
                    </div>
                    <div class="awesomeCard_text">
                        <h2>Get Certified</h2>
                        <p>Get Certified: Elevate Your Skills, Earn Credentials, and Unlock Endless Opportunities with Every Completed Course</p>
                    </div>
                    <div class="awesomeCard_button">
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ----- awesome part end ----- -->

    <!-- ----- courses part start ----- -->
    <section id="courses">
        <div class="container">
            <div class="course_head">
                <h1>Check Our Recent Courses</h1>
            </div>

            <div class="course_button" >
               <a href="../elearning/pages/courses.php">View All Courses</a>
            </div>

            <div class="course_cards">
            <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
            <div class='course_item'>
                <div class='course_icon'>
                <img src='uploads/" . $row['feature_image'] . "' alt='card icon'>
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

    <!-- ----- award part start ----- -->
    <section id="hero_part">
        <div class="">
            <div class="hero_row">
                 <div class="hero_image_part">
                    <img src="https://ethemestudio.com/demo/larna/images/feature/hm4-feature-img2.png" alt="hero image">
                </div>
                <div class="hero_text_part">
                    <div class="hero_title">
                        <h1>
                            <span>Award winning </span> course management.
                        </h1>
                        <p>Our all courses are world class quality. anyone can learn in anywhere in the world. all of courses is easy to describe and easy to understand</p>
                    </div>
                    <div class="hero_buttons">
                        <div class="signup_button"><a href="pages/login.php">Sign Up</a></div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- ----- award part end ----- -->
    
<!-- =====footer part start =====  -->
<footer id="footer">
    <div class="container">
        <div class="footer_row">
            <div class="footer_column">
                <div class="logo_part">
                    <a href="#">
                        <h2>E-learning</h2>
                    </a>
                </div>
                <div class="footer_paragraph">
                    <p>Explore the world of possibilities with our thoughtfully crafted footer. In this space, we connect you to essential
                    links, provide easy navigation, and offer a glimpse into our commitment to excellence. Your journey with us extends
                    seamlessly to the bottom, ensuring a holistic and enriching experience</p>
                </div>
                <div class="footer_icons">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></i></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="footer_column">
                <div class="important_links">
                    <div class="importantLinks_head">
                        <h2>Important links</h2>
                    </div>
                    <div class="importantLinks_items">
                        <div class="importantLinks_item">
                            <ul>
                                <li><a href="#">All Courses</a></li>
                                <li><a href="#">Instructors</a></li>
                                <li><a href="#">Premium Plans</a></li>
                                <li><a href="#">Blogs</a></li>
                            </ul>
                        </div>
                        <div class="importantLinks_item">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">FAQ & Help</a></li>
                                <li><a href="#">Certificate</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_column">
                <div class="footer_image">
                    <img src="https://ethemestudio.com/demo/larna/images/footer/home4-footer-img.png" alt="footer image">
                </div>
            </div>
        </div>

    </div>
    <div class="copyright_row">
        <p>All rights reserved rakibul and Shohedul &copy; 2023</p>
    </div>
</footer>
<!-- ----- footer part end ----- -->
</body>
</html>