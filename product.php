<?php
include ('./includes/connect.php');
include ('functions/common_functions.php');

$firstletter = "Profile";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $firstletter = substr($email, 0, strpos($email, '@'));  //
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
</head>
<style>
    .container {
        /* display: flex; */
        /* flex-wrap: wrap; */
        /* justify-content: space-between; */
        /* padding: auto; */
        margin-left: 100px;
        align-items: center;
        margin-top: 20px;
        width: 90%;
        display: grid;
        grid-template-columns: auto auto auto auto;
        padding: 20px;
        grid-gap: 50px;
        text-align: center;
    }

    .card {
        width: 250px;
        height: 400px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .card h2 {
        font-size: 1.2em;
        margin-bottom: 5px;
    }

    .card p {
        font-size: 1em;
        color: #666;
        margin-bottom: 10px;
    }

    .card h4 {
        font-size: 1.1em;
        color: #333;
        margin-bottom: 10px;
    }

    .card a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        transition: background-color 0.3s;
    }

    .card a:hover {
        background-color: #0056b3;
    }



    /* Hide the dropdown content by default */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Style the brands as buttons */

    .brand_head {
        text-align: center;
        padding: 10px;
    }

    .brand_name {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        text-decoration: none;
    }

    .brands a {
        padding: 5px 10px;
        margin-right: 10px;
        margin-bottom: 10px;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        transition: background-color 0.3s;
    }

    /* Change the background color of brand buttons on hover */
    .brands a:hover {
        background-color: #0056b3;
    }


    /* Show the dropdown content when hovering over the profile section */
    .profile:hover .dropdown-content {
        display: block;
    }

    /* Style the links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change the background color of links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .card {
        background-color: wheat;
    }
</style>

<body>
    <div class="header">

        <div class="head">

            <div class="top">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                </div>

                <div class="profile">
                    <span><i class="fa-solid fa-user"></i>
                        <?php echo $firstletter ?>
                    </span>
                    <div class="dropdown-content">
                        <a href="cart.php">Your Cart</a>
                        <!-- <a href="logout.php">Logout</a> -->
                        <?php if (!isset($_SESSION['email'])) {
                            echo "<a href='./login_register/login.php'>Login</a>";
                        } else {
                            echo "<a href='./login_register/logout.php'>Logout</a>";

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

        <div class="brand_head">
            <h2>Available Brands:</h2>
            <ul>

                <!-- This is to connect and fetch by admin in db and show in front end -->
                <div class="brands">
                    <div class="brand_name">
                        <a href="product.php">Show all</a>
                        <?php
                        getbrands(); ?>
                    </div>
                </div>
            </ul>
        </div>
        <!-- calling cart function -->
        <?php
        cart(); ?>
        <div class="product_info">
            <!-- fetching productts -->
            <?php
            getProducts();
            get_unique_brands(); ?>
        </div>





</body>

</html>