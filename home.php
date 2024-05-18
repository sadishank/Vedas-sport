<?php

include ('./connection.php');
include ('functions/common_functions.php');
session_start();
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: cursive;
        scroll-behavior: smooth;
    }

    ::placeholder {
        color: rgb(0, 0, 0);
    }

    body {
        background-color: black;
        overflow-x: hidden;
    }

    .container {
        width: 100%;
    }


    #background_video {
        position: absolute;
        right: 0;
        bottom: 0;
        /* min-width: 100%; 
    min-height: 100%; */
        z-index: -1;
        /* object-fit: fill; */
        /* background-size: cover; */
    }

    .head {
        height: 15vh;
        display: flex;
    }

    .top {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        margin: 30px 0 0 50px;
    }

    .logo img {
        height: 70px;
    }

    .profile {
        background: linear-gradient(to left, rgb(243, 243, 240), rgb(21, 84, 25));
        border-radius: 30px;
        padding: 0.8rem 1.4rem;
        text-transform: capitalize;
        word-spacing: 0.2rem;
        margin-bottom: 5px;
        margin-right: 3rem;
        cursor: pointer;
        transition: transform .5s;
    }

    .profile i {
        display: none;
    }


    .profile:hover i {
        display: inline-block;
        padding-right: 5px;
    }


    .profile:hover {
        transform: scale(1.1);
    }


    .nav {
        text-transform: uppercase;
        background-color: rgba(243, 243, 240, 0.9);
        border-radius: 50px;
        position: absolute;
        left: 40%;
        top: 5%;
        transform: translateX(-30%);
        display: flex;
        justify-content: space-between;
        z-index: 1;
        opacity: 70%;
    }


    .nav ul {
        display: flex;
        list-style: none;
    }


    .nav ul li {
        cursor: pointer;
        padding: .5rem 2.5rem;
        font-weight: 900;
        text-align: center;
    }

    .nav ul a {
        text-decoration: none;
        color: black;
    }


    .nav ul li:hover {
        border-radius: 60px;
        background: linear-gradient(to left, rgba(243, 243, 240, 0.5), rgb(21, 84, 25), rgba(243, 243, 240, 0.5));
    }


    .waviy {
        position: relative;
        text-align: center;
        -webkit-box-reflect: below -15px linear-gradient(transparent, rgba(0, 0, 0, .5));
        font-size: 50px;
        padding-top: 5rem;
    }

    .waviy span {
        position: relative;
        display: inline-block;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        animation: waviy 1s infinite;
        animation-delay: calc(.1s * var(--i));

    }

    @keyframes waviy {

        0%,
        40%,
        100% {
            transform: translateY(0)
        }

        20% {
            transform: translateY(-30px)
        }
    }

    .content {
        height: 85vh;
        text-align: center;
        color: snow;
    }

    .footer {
        background: linear-gradient(to right, rgb(21, 84, 25), snow);
        width: 100%;
        position: absolute;
        /* bottom: 0; */
        color: black;
        border-top-left-radius: 40px;
        font-size: 13px;
        line-height: 20px;
        padding: 100px 0 30px;
    }

    .row {
        width: 85%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }

    .col {
        flex-basis: 25%;
        padding: 10px;
    }

    .col:nth-child(2),
    .col:nth-child(2),
    .col:nth-child(3) {
        flex-basis: 15%;
    }

    .foot_logo {
        width: 200px;
        margin-bottom: 30px;
    }

    .col h3 {
        width: fit-content;
        margin-bottom: 40px;
        position: relative;
    }

    .email_id {
        width: fit-content;
        border-bottom: 1px solid rgb(0, 0, 0);
        margin: 20px 0;
    }

    .col ul li {
        list-style: none;
        margin-bottom: 12px;
    }

    .col ul li a {
        text-decoration: none;
        color: rgb(0, 0, 0);
    }

    .col form {
        padding-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-bottom: 1px solid rgb(0, 0, 0);
        margin-bottom: 50px;
    }

    .col form .fa-regular {
        font-size: 18px;
        margin-right: 10px;
    }

    .col form input {
        width: 100%;
        background: transparent;
        color: rgb(0, 0, 0);
        border: 0;
        outline: none;
    }

    .col form button {
        background: transparent;
        border: 0;
        outline: none;
        cursor: pointer;
    }

    .col form .fa-solid {
        font-size: 16px;
        color: rgb(0, 0, 0);
    }

    .social_icons .fa-brands {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
        color: snow;
        background: rgb(0, 0, 0);
        margin-right: 15px;
    }

    .footer hr {
        width: 98%;
        border-bottom: 1px solid rgb(5, 5, 5);
        margin: 20px auto;
    }

    .copyright {
        text-align: center;
    }

    .underline {
        width: 100%;
        height: 5px;
        background: gray;
        border-radius: 3px;
        position: absolute;
        top: 25px;
        left: 0;
        overflow: hidden;
    }

    .underline span {
        width: 15px;
        height: 100%;
        background: rgb(0, 0, 0);
        border-radius: 3px;
        position: absolute;
        top: 0;
        left: 10px;
        animation: moving 2s linear infinite;
    }

    @keyframes moving {
        0% {
            left: -20px;
        }

        100% {
            left: 100%;
        }
    }

    @media (max-width: 800px) {
        .footer {
            bottom: unset;
        }

        .col {
            flex-basis: 100%;
        }

        .col:nth-child(2),
        .col:nth-child(2),
        .col:nth-child(3) {
            flex-basis: 100%;
        }
    }

    @media(min-aspect-ratio:16/9) {
        #background_video {
            height: auto;
            width: 100%;
        }

    }

    @media (max-aspect-ratio:16/9) {
        #background_video {
            width: auto;
            height: 100%;
        }
    }


    .product_page {
        /* height: 100vh; */
        background-color: rgb(238, 240, 234);
    }

    .product_page h3 {
        padding: 3rem 0 2rem 0;
        color: rgb(6, 6, 6);
        text-align: center;
        text-transform: uppercase;
        font-size: 30px;
        text-decoration: underline;
    }

    .new_product {
        display: grid;
        grid-template-columns: auto auto auto auto;
        padding: 20px;
        grid-gap: 50px;
        text-align: center;
    }

    .product {
        border: 1px solid black;
        border-radius: 30px;
        padding: 20px;
    }

    .product .dp {
        height: 200px;
        width: 200px;
        border-radius: 50%;
    }

    .product .dp {
        background-color: rgb(21, 84, 25);
        padding: 3px;
        margin: 10px;
    }

    .product h4 {
        color: black;
        padding: 20px;
    }

    .product p {
        /* border: 1px solid rgba(255, 255, 255, 0.2); */
        border-radius: 30px;
        padding: 10px;
        color: black;
    }

    .product_page_link {
        display: flex;
        justify-content: center;
    }



    .product_page_link p {
        padding: 20px;
    }

    .product_page_link a {
        color: rgb(4, 4, 4);
        text-decoration: none;
    }

    .product_page_link i {
        padding-left: 10px;
    }

    .product_page_link p:hover {
        transform: scale(1.3);
        transition: 1s;
    }



    .waviy {
        position: relative;
        text-align: center;
        -webkit-box-reflect: below -15px linear-gradient(transparent, rgba(0, 0, 0, .5));
        font-size: 50px;
        padding-top: 5rem;
    }

    .waviy span {
        position: relative;
        display: inline-block;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        animation: waviy 1s infinite;
        animation-delay: calc(.1s * var(--i));

    }

    @keyframes waviy {

        0%,
        40%,
        100% {
            transform: translateY(0)
        }

        20% {
            transform: translateY(-30px)
        }
    }

    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
</head>

<body>

    <div class="container">



        <div class="header">

            <video autoplay muted loop id="background_video">
                <source src="images/background.mp4" type="video/mp4">
            </video>

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

        </div>


    </div>


    <div class="product_page">

        <h3>NEW ARRIVALS</h3>

        <div class="new_product">

            <div class="product">

                <img src="images/al_rihla.jpg" class="dp">

                <h4>Adidas AL RIHLA League Football - FIFA 2023</h4>
                <p>
                    This Adidas football has passed with FIFA test on circumference, weight, rebound, and water
                    absorption. It has graphics on it inspired by the FIFA world cup. It also comes with a butyl
                    bladder that requires less pumping and more playing.
                </p>

            </div>

            <div class="product">

                <img src="images/bat.jpg" class="dp">

                <h4>CA PLUS SM-18</h4>
                <p>
                    7 STAR CRICKET BAT TOP QUALITY PAKISTAN BRANDED HARD BALL BAT ENGLISH WILLOW CRICKET BAT
                </p>

            </div>

            <div class="product">

                <img src="images/basketball.jpg" class="dp">

                <h4>Spalding TF-1000</h4>
                <p>
                    This indoor basketball will be Spalding’s choice for high school and college athletes. You
                    will find this basketball in a good amount of high schools and colleges around the country.
                    The composite basketball surface will provide for a soft touch and will allow for great
                    handling with personal use or in gameplay.
                </p>

            </div>

            <div class="product">

                <img src="images/futsal_shoe.jpg" class="dp">

                <h4>K-Leather Upper</h4>
                <p>
                    Crazy Adidas Predator 20+ 'Animal' Special-Edition Boots Released Most Expensive Boot Ever
                    Footy Headlines
                </p>

            </div>

        </div>

        <div class="product_page_link">
            <p><a href="product.html">View all Products <i class="fa-solid fa-arrow-right"></i></a></p>
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