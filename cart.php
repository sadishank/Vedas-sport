<?php
include ('./includes/connect.php');
include ('functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <style>
        /* Table styling */
        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid black;
            margin-top: 20px;

        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: goldenrod;
        }

        /* Decrease the size of the image */
        .dbimg {
            height: 150px;
            width: 150px;

            object-fit: contain;

        }

        /* Decrease the size of the quantity box */
        input[type="text"][name="quantity"] {
            width: 50px;

            padding: 5px;

        }

        /* Container styling */
        .container {
            margin: 20px auto;
            max-width: 800px;
            padding: 0 15px;
        }

        /* Row styling */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Heading styling */
        h1 {
            text-align: center;
            margin-top: 20px;
        }

        /* Form styling */
        form {
            margin-top: 20px;
        }

        /* Button styling */
        input[type="submit"],
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        /* Message styling */
        h2 {
            text-align: center;
            margin-top: 20px;
        }

        /* Total amount styling */
        div {
            text-align: center;
            margin-top: 20px;
        }

        /* Link styling */
        a {
            text-decoration: none;
            color: white;
        }

        /* Link button styling */
        button a {
            color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
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
    </style>
    <link rel="stylesheet" href="product.css">
</head>

<body>
    <div class="header">

        <div class="head">

            <div class="top">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                </div>

                <div class="profile">
                    <span><i class="fa-solid fa-user"></i>Profile</span>
                    <div class="dropdown-content">
                        <a href="cart.php">Your Cart</a>
                        <a href="logout.php">Logout</a>
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
        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <h1>Your Cart Contents:</h1>
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table>

                        <!-- code to display data from db -->
                        <?php
                        // global $con;
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address = '$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "  <thead>
                                <tr>
                                    <th>Name of Product</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>price</th>
                                    <th>Select</th>
                                    <th colspan='2'>Status</th>
    
                                </tr>
                            </thead>
                            <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "Select * from `products` where product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price["product_price"]);
                                    $price_table = $row_product_price['product_price'];
                                    $product_name = $row_product_price['product_name'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $product_name ?>
                                        </td>
                                        <td><img class="dbimg" src="./admin/product_images/<?php echo $product_image1 ?>" alt="">
                                        </td>
                                        <td><input type="text" name="quantity"></td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['quantity'];
                                            $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$get_ip_add'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>
                                        <!-- <td><input type="text" name="size"></td> -->
                                        <td>
                                            <?php echo $price_table ?>/-
                                        </td>
                                        <td><input type="checkbox" name="removeitems[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Update item" name="update_cart">
                                            <input type="submit" value="delete item" name="delete_cart">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2>The Cart is Empty! Please first add products to cart.</h2>";

                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                    $ip = getIPAddress();
                    $cart_query = "Select * from `cart_details` where ip_address = '$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<div>
                            <h3>Total amount: Rs: <strong>$total_price</strong>/-</h3>
                            <input type='submit' value='Explore more Products' name='Explore_More_products'>
                            <button><a href='./login_register/cash.php'>Payment Checkout</a></button>
                        </div>";
                    } else {
                        echo "No items in the cart.";

                    }
                    if (isset($_POST['Explore_More_products'])) {
                        echo "<script>window.open('product.php','_self' );</script>";
                    }

                    ?>
                    <!-- for total amount -->

            </div>
        </div>
        </form>
        <!-- functions to delete thte items -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['delete_cart'])) {
                foreach ($_POST['removeitems'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id = $remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }
        }

        echo $remove_item = remove_cart_item();
        ?>