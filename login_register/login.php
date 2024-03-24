<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vedas Sports</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
</head>

<body>

    <div class="container">

        <div class="header">

            <div class="head">

                <div class="top">
                    <div class="logo">
                        <img src="images/logo1.png" alt="" />
                    </div>

                    <div onclick="location.href='cart.html';" class="profile">
                        <span><i class="fa-solid fa-user"></i> PROFILE </span>
                    </div>
                </div>

                <div class="nav">
                    <ul>
                        <li onclick="location.href='../home.php';">home</li>
                        <li onclick="location.href='../products.php';">product</li>
                        <li onclick="location.href='../about_us.php';">about us</li>
                        <li onclick="location.href='../contact_us.php';">contact us</li>
                    </ul>
                </div>


            </div>


        </div>


        <div class="content">

            <div class="quote">

                <h1>Vedas Sports</h1>

                <p>
                    Enhance your sporting career with US.
                </p>

            </div>

            <div class="login_box">

                <form action="loginconn.php" method="post">
                    <input type="email" name="email" placeholder="Email or Phone Number" required> <br>
                    <input type="password" name="password" placeholder="Password" required> <br>
                    <a href="home.php"><button type="submit" class="login">Log In</button></a> <br>
                    <p><a href="forget_pass.html" class="span">Forgot Password?</a></p>
                    <hr> <br>
                </form>
                <a href="register.php"><button type="submit" class="creat">Creat New Account</button></a> <br>
                <a href="../products.php"><button type="submit" class="guest"><i class="fa-solid fa-user"></i> Enter as
                        Guest</button></a>

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
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
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