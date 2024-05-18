<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="about_us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
</head>
</head>
<style>
    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;

    }

    body {
        overflow-x: hidden;
    }

    /* Dropdown button */
    .dropbtn {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
        white-space: nowrap;
        /* Prevents text from wrapping to next line */
        overflow: hidden;
        /* Hides any content that overflows horizontally */
        text-overflow: ellipsis;
        /* Displays ellipsis (...) when content is clipped */
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Add this to your existing CSS */
    .dropdown-content {
        /* existing styles */
        white-space: nowrap;
        /* Prevents text from wrapping to next line */
        overflow: hidden;
        /* Hides any content that overflows horizontally */
        text-overflow: ellipsis;
        /* Displays ellipsis (...) when content is clipped */
    }
</style>

<body>

    <div class="container">

        <video autoplay muted loop id="background_video">
            <source src="images/v.mp4" type="video/mp4">
        </video>

        <div class="header">


            <div class="head">

                <div class="top">
                    <div class="logo">
                        <img src="images/logo.png" alt="logo">
                    </div>

                    <div class="dropdown">
                        <button class="dropbtn">
                            <?php
                            // Username display
                            if (!isset($_SESSION['username'])) {
                                echo "Guest";
                            } else {
                                echo $_SESSION['username'];
                            }
                            ?>
                        </button>
                        <div class="dropdown-content">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "<a href='cart.php'>My Cart</a>";
                                echo "<a href='login_register/profile.php'>My Profile</a>";
                                echo "<a href='./login_register/logout.php'>Logout</a>";

                            } else {
                                echo "<a href='cart.php'>My Cart</a>";
                                echo "<a href='./login_register/login.php'>Login</a>";
                                echo "<a href='login_register/register.php'>Register</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="nav">
                    <ul>
                        <li onclick="location.href='home.php';">home</li>
                        <li onclick="location.href='product.php';">product</li>
                        <li onclick="location.href='about_us.php';">about us</li>
                        <li onclick="location.href='contact_us.php';">contact us</li>
                    </ul>
                </div>


            </div>

            <div class="content">

                <div class="waviy">
                    <span style="--i:1">V</span>
                    <span style="--i:2">E</span>
                    <span style="--i:3">D</span>
                    <span style="--i:4">A</span>
                    <span style="--i:5">S</span>
                    <span style="--i:6"></span>
                    <span style="--i:7">s</span>
                    <span style="--i:8">p</span>
                    <span style="--i:9">o</span>
                    <span style="--i:10">r</span>
                    <span style="--i:11">t</span>
                    <span style="--i:12">s</span>
                </div>

                <div class="info">

                    <h3>We are vedas sports.</h3>

                    <p>
                        The best sports store in NEPAL. <br>
                        East or West we are the best.
                    </p>

                </div>

            </div>


        </div>

        <div class="teams">

            <h3>Meet Our Leadership</h3>

            <div class="owners_profile">

                <div class="card">
                    <div class="card-inner">
                        <div class="front-face">
                            <img src="images/dinesh.jpg">
                        </div>
                        <div class="back-face">
                            <h2>Mr.Bazgain</h2>
                            <p>I'm Software Developer.</p>
                            <p class="details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut neque quis
                                optio voluptatum
                                reiciendis ex libero adipisci, expedita deserunt culpa consectetur deleniti esse
                                excepturi corrupti ipsam tempora doloribus autem ipsa hic earum. Similique tempora
                                molestias officia reprehenderit sequi quod, quisquam ipsum recusandae magni, impedit
                                laudantium, facere aperiam aut consequatur architecto?
                            </p>
                            <div class="social-media">
                                <a href="https://www.facebook.com/mr.bajgain"> <i
                                        class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                            <div class="button"><a href="#">Resume</a></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <div class="front-face">
                            <img src="images/sadishan.jpg">
                        </div>
                        <div class="back-face">
                            <h2>Mr.Sadishan Khadka</h2>
                            <p>I'm Software Developer.</p>
                            <p class="details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut neque quis
                                optio voluptatum
                                reiciendis ex libero adipisci, expedita deserunt culpa consectetur deleniti esse
                                excepturi corrupti ipsam tempora doloribus autem ipsa hic earum. Similique tempora
                                molestias officia reprehenderit sequi quod, quisquam ipsum recusandae magni, impedit
                                laudantium, facere aperiam aut consequatur architecto?
                            </p>
                            <div class="social-media">
                                <a href="https://www.facebook.com/mr.bajgain"> <i
                                        class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                            <div class="button"><a href="#">Resume</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <h3>Meet Our Staff</h3>

            <div class="staff_profile">

                <div class="staff">

                    <img src="images/dinesh.jpg" class="dp">

                    <h4>Name Cast</h4>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero dolores maxime id ullam eligendi
                        eos aut, odit, consectetur, amet itaque nisi. Voluptates sunt repudiandae iste incidunt neque
                        autem labore tempore!
                    </p>

                </div>

                <div class="staff">

                    <img src="images/dinesh.jpg" class="dp">

                    <h4>Name Cast</h4>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero dolores maxime id ullam eligendi
                        eos aut, odit, consectetur, amet itaque nisi. Voluptates sunt repudiandae iste incidunt neque
                        autem labore tempore!
                    </p>

                </div>

                <div class="staff">

                    <img src="images/dinesh.jpg" class="dp">

                    <h4>Name Cast</h4>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero dolores maxime id ullam eligendi
                        eos aut, odit, consectetur, amet itaque nisi. Voluptates sunt repudiandae iste incidunt neque
                        autem labore tempore!
                    </p>

                </div>

                <div class="staff">

                    <img src="images/dinesh.jpg" class="dp">

                    <h4>Name Cast</h4>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero dolores maxime id ullam eligendi
                        eos aut, odit, consectetur, amet itaque nisi. Voluptates sunt repudiandae iste incidunt neque
                        autem labore tempore!
                    </p>

                </div>

            </div>

        </div>


        <div class="footer">
            <div class="row">

                <div class="col">
                    <img src="images/logo.png" alt="logo" class="foot_logo">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, ipsa necessitatibus sint
                        eligendi perspiciatis repudiandae est ullam officia officiis hic id fugit, reiciendis cumque
                        rem, iusto mollitia sequi excepturi natus.
                    </p>
                </div>

                <div class="col">
                    <h3>Office <div class="underline"><span></span></div>
                    </h3>
                    <p>Purnachandi Road</p>
                    <p>Jawalakhel, Lalitpur</p>
                    <p>Bagmati province, Nepal</p>
                    <p class="email_id">vedascollege@gmail.com</p>
                    <h4>0123456789</h4>
                </div>

                <div class="col">
                    <h3>Links<div class="underline"><span></span></h3>
                    <ul>
                        <li onclick="location.href='home.php';">home</li>
                        <li onclick="location.href='products.php';">product</li>
                        <li onclick="location.href='about_us.php';">about us</li>
                        <li onclick="location.href='contact_us.php';">contact us</li>
                    </ul>
                </div>

                <div class="col">
                    <h3>feedback<div class="underline"><span></span></h3>
                    <form>
                        <i class="fa-regular fa-message"></i>
                        <input type="text" placeholder="What should we change!!!" required>
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </form>

                    <div class="social_icons">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </div>

            </div>

            <hr>

            <p class="copyright">Developed by <b>Dinesh Bajgain </b>& <b>Sadishan Khadka</b>.</p>

        </div>

    </div>


</body>

</html>