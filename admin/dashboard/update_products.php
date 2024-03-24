<?php
require_once "productsconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    // Image handling
    if ($_FILES["image"]["name"]) {
        $image = $_FILES["image"]["name"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    } else {
        // If no new image is selected, keep the existing image
        $sql = "SELECT image FROM products_tbl WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($existing_image);
            $stmt->fetch();
            $image = $existing_image;
            $stmt->close();
        }
    }

    $sql = "UPDATE products_tbl SET name = ?, quantity = ?, price = ?, description = ?, image = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("siisss", $name, $quantity, $price, $description, $image, $id);
        if ($stmt->execute()) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating product: " . $mysqli->error;
        }
        $stmt->close();
    }
}

if (isset ($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT name, quantity, price, description, image FROM products_tbl WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($name, $quantity, $price, $description, $image);
        $stmt->fetch();
        $stmt->close();
    }
} else {
    echo "Product ID not specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>

<body>
    <h2>Update Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required><br><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $price; ?>" step="0.01" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea><br><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        <input type="submit" name="submit" value="Update Product">
    </form>
</body>

</html>