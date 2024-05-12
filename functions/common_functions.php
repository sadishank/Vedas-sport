<link rel="stylesheet" href="product.css">

<?php
// include ('./includes/connect.php');


// geting products

function getProducts()
{
    global $con;
    if (!isset($_GET['brand'])) {
        $select_query = "Select * from `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);
        
        echo "<div class='container'>";
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];

            echo "<div class='card'>
                    <img src='./admin/product_images/$product_image1' alt='$product_name'>
                    <div class='imgbody'>
                        <h2>$product_name</h2>
                        <p>$product_description</p>
                        <h4>Price: Rs. $product_price/-</h4>
                        <a href='product.php?add_to_cart=$product_id'>Add to cart</a>
                    </div>
                </div>";
        }
        echo "</div>";
    }
}


//for brand filter//

function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2>This Brand is out of Stock Currently";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];
            echo "<div class='column'>
                <div class='card'>
                    <img class='productimage' src='./admin/product_images/$product_image1'/>
                    <div class='imgbody'>
                        <h2>$product_name</h2>
                        <p>  $product_description</p>
                        <h4> Price: Rs. $product_price/- </h4>

                        <a href='product.php?add_to_cart=$product_id'>Add to cart</a>
                    </div>
                </div>
            </div>
     </div>";
        }
    }
}

//for brands//
function getbrands()
{
    global $con;
    $select_brands = "Select * from `brands` order by brand_name";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_name = $row_data['brand_name'];
        $brand_id = $row_data['brand_id'];
        echo " <li><a href='product.php?brand=$brand_id'>$brand_name</a></li>";

    }
}


//for ipaddress// 
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//add to cart function//
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address = '$ip' and product_id = $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('THis item is already in cart')</script>";
            echo "<script>window.open('product.php','_self')</script";
        } else {
            $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('The item is added in cart')</script>";
            echo "<script>window.open('product.php','_self')</script";

        }



    }
}



// function for cart items to display//

function cart_items()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);



    }
}



?>