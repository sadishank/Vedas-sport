<?php
include ('../includes/connect.php');
include ('../functions/common_functions.php');

@session_start();

if (isset($_POST['login'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $select_query = "SELECT * FROM `register` WHERE username = '$user_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // after logged in and not logged in

    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_name;
        if (password_verify($user_password, $row_data['password'])) {
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_name;
                echo "<script>alert('Successfully logged in')</script>";
                echo "<script>window.open('../home.php','_self')</script>";

            } else {
                $_SESSION['username'] = $user_name;
                echo "<script>alert('Login sucessfull')</script>";
                header("Location: cash.php?alert=You_had_some_items_in_cart");

            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";

        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
    <style>
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

        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <div class="head">

                <div class="top">
                    <div class="logo">
                        <img src="../images/logo.png" alt="" />
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
                                echo "<a href='../cart.php'>My Cart</a>";
                                echo "<a href='profile.php'>My Profile</a>";
                                echo "<a href='logout.php'>Logout</a>";

                            } else {
                                echo "<a href='../cart.php'>My Cart</a>";
                                echo "<a href='login.php'>Login</a>";
                                echo "<a href='register.php'>Register</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav">
                <ul>
                    <li><a href="../home.php">home</a></li>
                    <li><a href="../product.php">product</a></li>
                    <li><a href="../about_us.php">about us</a></li>
                    <li><a href="../contact_us.php">contact us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="quote">
            <h1>Vedas Sports</h1>
            <p>Enhance your sporting career with us.</p>
        </div>

        <div class="login_box">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="login" class="login">Log In</button><br>
                <p><a href="forget_pass.html" class="span">Forgot Password?</a></p>
                <hr><br>
            </form>
            <a href="register.php"><button type="submit" class="creat">Create New Account</button></a><br>
            <a href="./product.php"><button type="submit" class="guest"><i class="fa-solid fa-user"></i> Enter as
                    Guest</button></a>
        </div>
    </div>

    <div class="footer">
        <div class="row">
            <div class="col">
                <img src="../images/logo.png" alt="logo" class="foot_logo">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, ipsa necessitatibus sint
                    eligendi perspiciatis repudiandae est ullam officia officiis hic id fugit, reiciendis cumque
                    rem, iusto mollitia sequi excepturi natus.</p>
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
                <h3>Links<div class="underline"><span></span></div>
                </h3>
                <ul>
                    <li><a href="../home.php">home</a></li>
                    <li><a href="../product.php">product</a></li>
                    <li><a href="../about_us.php">about us</a></li>
                    <li><a href="../contact_us.php">contact us</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>feedback<div class="underline"><span></span></div>
                </h3>
                <form>
                    <i class="fa-regular fa-message"></i>
                    <input type