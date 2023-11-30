<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>
    <!-- ===== main menu part start =====  -->
    <header id="main_menu">
        <div class="container">
            <div class="main_menu">
                <div class="logo_part">
                    <a href="home.html">
                        <h2>E-learning</h2>
                    </a>
                </div>
                <div class="nav_item_">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Course</a></li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="login_part">
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a class="signup" href="#">sign up</a></li>
                        <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>



    <!-- ----- main menu part end ----- -->
    <!-- ===== login part start =====  -->
    <section id="login">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form method="post" action="../pages/login_process.php">
                    <label for="chk" aria-hidden="true">Sign In</label>
                    <!-- <input type="text" name="txt" placeholder="User name" required=""> -->
                    <input type="email" value="shohedul350@gmail.com" name="email" placeholder="Email" required="">
                    <input type="password" value="123456" name="password" placeholder="Password" required="">
                    <button>Sign up</button>
                </form>
            </div>

            <div class="login">
                <form>
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button>Login</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ----- login part end ----- -->

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
                        <p>Explore the world of possibilities with our thoughtfully crafted footer. In this space, we
                            connect you to essential
                            links, provide easy navigation, and offer a glimpse into our commitment to excellence. Your
                            journey with us extends
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
                        <img src="../images/footer_image.svg" alt="footer image">
                    </div>
                </div>
            </div>
    
        </div>
        <div class="copyright_row">
            <p>All rights reserved eThemeStudio &copy; 2023</p>
        </div>
    </footer>
    <!-- ----- footer part end ----- -->

</body>

</html>