<?php
include ('../includes/connect.php');
include ('../functions/common_functions.php');
@session_start();
$user_ip = getIPAddress();
$get_user = "Select * from `register` where user_ip = '$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .online {
            background-image: url('../images/online.jpg');
            background-size: cover;
            width: 50%;
            height: 100%;
            position: relative;
        }

        .offline {
            background-image: url('../images/offline.jpg');
            background-size: cover;
            width: 50%;
            height: 100%;
            position: relative;
        }

        .heading {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 7rem;
            color: white;
            font-weight: bold;



        }

        .headingof {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 7rem;
            color: Green;
            font-weight: bold;


        }

        .cod {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 3rem;

        }

        a {
            display: inline-block;
            background-color: green;
            color: whitesmoke;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        a:hover {
            background-color: red;
            color: white;
            transition: 0.5s ease-in-out;
        }

        p {
            font-size: 3rem;
            text-decoration: underline;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container online">
        <div class="heading">ONLINE</div>
        <p>Our online service is currently down</p>
    </div>
    <div class="container offline">
        <div class="headingof">OFFLINE</div>
        <div class="cod">
            <a href="order.php?user_id=<?php echo $user_id ?>">PAY COD</a>
        </div>
    </div>
</body>

</html>