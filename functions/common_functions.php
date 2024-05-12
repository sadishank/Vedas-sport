<?php
include ('../includes/connect.php');
?>

<!-- geting products -->
function getproducts(){
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
        <img src='./admin/product_images/$product_image1' />
        <div class='imgbody'>
            <h2>$product_name</h2>
            <p> $product_description</p>
            <a href='#'>Add to cart</a>
            <a href='#'>View More</a>
        </div>
    </div>
</div>
</div>";
}
}