<?php
require_once "productsconn.php";

$result = $mysqli->query("SELECT * FROM products_tbl");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .add-button {
            text-align: center;
            margin-top: 20px;
        }

        .add-button a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Product List</h2>
        <div class="add-button">
            <a href="add_products.php">Add Product</a>
        </div>
        <table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>";
                    if ($row["image"]) {
                        echo "<img src='path_to_your_images_folder/" . $row["image"] . "' alt='Product Image'>";
                    }
                    echo "</td>";
                    echo "<td><a href='update_product.php?id=" . $row["id"] . "'>Update</a> | <a href='delete_product.php?id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No products found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>