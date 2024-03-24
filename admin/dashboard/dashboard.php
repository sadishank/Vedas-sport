<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        .menu {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            display: inline-block;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="adminopt">
        <h1>Admin Dashboard</h1>
        <h3>Welcome Admin</h3>
        <ul class="menu">
            <li><a href="add_products.php">Add Products</a></li>
            <li><a href="#">View Products</a></li>
            <li><a href="dashboard.php?add_brand">Add Brands</a></li>
            <li><a href="#">View Brands</a></li>
            <li><a href="#">Users</a></li>
        </ul>
    </div>

    <div>
        <?php
        if (isset ($_GET['add_brand'])) {
            include ('add_brand.php');
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>