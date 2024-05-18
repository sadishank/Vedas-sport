<?php
session_start();
include ('../includes/connect.php');
include ('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../images/checkout.jpg');
            /* Add your background image here */
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
        }

        .logo img {
            height: 70px;
            margin-bottom: 20px;
        }


        .nav {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .nav ul {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .nav ul li {
            cursor: pointer;
            padding: 10px 20px;
            font-weight: 900;
            text-align: center;
        }

        .nav ul a {
            text-decoration: none;
            color: #fff;
        }

        .nav ul li:hover {
            border-radius: 30px;
            background: linear-gradient(to left, rgb(32, 32, 31), rgb(246, 32, 8), rgb(32, 32, 31));
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

        body {
            overflow-x: hidden;
        }

        .content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            max-width: 800px;
            margin: 40px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="../images/logo.png" alt="Logo">
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
            <div class="nav">
                <ul>
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="../product.php">Product</a></li>
                    <li><a href="../about_us.php">About Us</a></li>
                    <li><a href="../contact_us.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <?php
            if (isset($_SESSION['username'])) {
                get_user_order();
                if (isset($_GET['my_orders'])) {
                    include ('my_orders.php');
                }
            }
            ?>
        </div>
    </div>
</body>

</html>