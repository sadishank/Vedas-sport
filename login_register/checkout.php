<?php
include ('../includes/connect.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Process</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div>
        <?php
        if (!isset ($_SESSION['email'])) {
            include ('login.php');
        } else {
            include ('cash.php');
        }
        ?>
    </div>






</body>

</html>