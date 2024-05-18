<?php include ('../includes/connect.php');
include ('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Our online payment recieving service is down so only Cash on delivery.</h1>

    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `register` where user_ip = '$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    <div>
        <a href="order.php?user_id=<?php echo $user_id ?>">PAY COD</a>
    </div>
</body>

</html>