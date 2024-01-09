<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../css/style.css">
    
     <style>
        .contact_row {
    padding: 100px 0;
    display: flex;
    gap: 200px;
    justify-content: center;
    align-items: center;
}
.contact_row h2{
     font-size: 36px;
            color: var(--brand_color);
            margin-bottom: 20px;
            padding: 60px 20px;
}

.contact_icon span i {
    font-size: 160px;
    color: var(--brand_color);
}

.contact_box h2 {
    font-size: 30px;
    color: #fff;
    margin-bottom: 20px;
}

.contact_box form input {
    display: block;
    width: 350px;
    height: 40px;
    margin: 20px 0;
    outline: none;
    border: none;
    padding: 10px 20px;
    background: #ecf0f1;
    border-radius: 20px;
}

::placeholder {
    color: #7f8c8d;
    font-size: 16px;
}

.text_area {
    width: 350px;
    height: 100px;
    border-radius: 15px;
    padding: 20px;
    background: #ecf0f1;
    border: none;
    outline: none;
}

.send_button {
    margin-top: 30px;
    display: block;
    border: none;
    width: 350px;
    height: 40px;
    border-radius: 30px;
    background: var(--brand_color);
    font-size: 18px;
    color: #fff;

}

    </style>
</head>
<body>
    <!-- ===== main menu part start =====  -->
    <header id="main_menu">
        <div class="container">
            <div class="main_menu">
                <div class="logo_part">
                    <a href="/index.php">
                        <h2>E-learning</h2>
                    </a>
                </div>
                <div class="nav_item_">
                    <ul>
                        <li><a href="../../elearning">Home</a></li>
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
    <section>
        
         <div class="contact_row">
                <div>
                    <h2>Contact Us</h2>
                </div>
                <div class="contact_icon" data-aos="fade-down"  data-aos-duration="2000">
                    <span><i class="fa-regular fa-envelope"></i></span>
                </div>
                <div class="contact_box" data-aos="fade-up"  data-aos-duration="2000">
                    <h2>Contact Me.</h2>
                    <form>
                        <input type="text" placeholder="Name">
                        <input type="email" placeholder="Email">
                        <textarea class="text_area" placeholder="Massage"></textarea>
                        <button class="send_button" type="submit">Send</button>
                    </form>
                </div>
                </div>
    </section> 
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