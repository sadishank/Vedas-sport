<?php
include ('./includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
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

        <div>
            <h2>Available Brands:</h2>
            <ul>

                <!-- This is to connect and fetch by admin in db and show in front end -->
                <?php
                $select_brands = "Select * from `brands` order by brand_name";
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
        </div>
        <div class="product">
            <!-- fetching productts -->
            <?php
            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_name'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                echo "<div class='column'>
                <div class='card'>
                    <img src='./admin/product_images/$product_image1'/>
                    <div class='imgbody'>
                        <h2>$product_name</h2>
                        <p>  $product_description</p>
                        <a href='#'>Add to cart</a>
                        <a href='#'>View More</a>
                    </div>
                </div>
            </div>
     </div>";
            }
            ?>
            <!-- <div class="column">
                <div class="card">
                    <img src="./images/ball1.jpeg" />
                    <div class="imgbody">
                        <h2>Nike ball</h2>
                        <p>NIKE NIKE ipsum dolor sit amet, consectetur adipisicing elit. Tempore </p>
                        <a href="#">Add to cart</a>
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
 </div> -->

</body>

</html>