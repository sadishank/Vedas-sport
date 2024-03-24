<?php
include ('./includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="contact_us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
</head>

<body>

    <div class="header">

        <div class="head">

            <div class="top">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                </div>

                <div onclick="location.href='cart.html';" class="profile">
                    <span><i class="fa-solid fa-user"></i> PROFILE </span>
                </div>
            </div>

            <div class="nav">
                <ul>
                    <li onclick="location.href='home.php';">home</li>
                    <li onclick="location.href='products.php';">product</li>
                    <li onclick="location.href='about_us.php';">about us</li>
                    <li onclick="location.href='contact_us.php';">contact us</li>
                </ul>
            </div>


        </div>

        <h2>Available Brands:</h2>
        <ul>

            <!-- This is to connect and fetch by admin in db and show in front end -->
            <?php
            $select_brands = "Select * from `brands`";
            $result_brands = mysqli_query($con, $select_brands);
            // $row_data = mysqli_fetch_assoc($result_brands);
            // echo $row_data['brand_name'];
            
            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                $brand_name = $row_data['brand_name'];
                $brand_id = $row_data['brand_id'];
                echo " <li><a href='welcome.php?brand=$brand_id'>$brand_name</a></li>";

            }
            ?>

        </ul>