<?php
include ('../../includes/connect.php');
if (isset ($_POST['add_products'])) {
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];


    if ($product_name == '' or $product_brand == '' or $product_description == '' or $product_image1 == '' or $product_price == '') {
        echo "<script> alert! please complete the form.</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "../product_images/$product_image1");

        $add_products = "Insert into `products` (product_name,brand_id,product_image1,product_description,product_price) values ('$product_name','$product_brand','$product_image1','$product_description','$product_price')";
        $result_query = mysqli_query($con, $add_products);
        if ($result_query) {
            echo "<script>Sucessfully inserted the Product</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Add Products to Inventory</h1>
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"
                        placeholder="Enter name of product" required>


                    <!-- For brands which it belongs -->
                    <div>
                        <select name="product_brand" id="">
                            <option value="">Select a Brand</option>
                            <?php
                            $select_query = "Select * from `brands`";
                            $result_query = mysqli_query($con, $select_query);
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                $brand_name = $row['brand_name'];
                                $brand_id = $row['brand_id'];
                                echo "<option value='$brand_id'>$brand_name</option>";
                            }
                            ?>

                        </select>
                    </div><br>

                    <label for="product_image1" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product_image1" name="product_image1" required>

                    <label for="productDescription" class="form-label">Product Description</label>
                    <textarea class="form-control" name="product_description" required
                        placeholder="Enter Description about product"></textarea>

                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" id="productPrice" name="product_price"
                        placeholder="Enter  Price of Product" required> <br>


                    <input type="submit" name="add_products" value="Add Product">
                </div>
            </form>
        </div>
    </div>
</body>

</html>