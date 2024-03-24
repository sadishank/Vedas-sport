<?php
require_once "config.php";

$sql = "SELECT name, quantity, price, description, image FROM products_tbl";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Product List</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Quantity</th><th>Price</th><th>Description</th><th>Image</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td><img src='path_to_your_images_folder/" . $row["image"] . "' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No products found";
}

$mysqli->close();
?>