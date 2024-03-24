<?php
include ('../../includes/connect.php');
if (isset ($_POST['add_brand'])) {
    $brand_name = $_POST['brand_name'];

    $select_query = "Select * from `brands` where brand_name='$brand_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Brand is already present !')</script>";

    } else {
        $insert_query = "insert into `brands` (brand_name) values ('$brand_name')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been added successfully')</script>";

        }
    }
}

?>

<h2>Add New brands to the collection !</h2>

<form action="" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Brand Name</span>
        <input type="text" class="form-control" aria-label="Sizing example input" name="brand_name"
            aria-describedby="inputGroup-sizing-default">
    </div>
    <div>
        <input type="submit" class="form-control" aria-label="Sizing example input" value="Add Brand" name="add_brand">
    </div>
</form>