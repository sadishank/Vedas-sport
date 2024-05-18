<?php

include ('../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th,
        td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>My Orders</h2>
        <?php
        $user_name = $_SESSION['username'];
        $get_user = "select * from `register` where username = '$user_name'";
        $result = mysqli_query($con, $get_user);
        $row_fetch = mysqli_fetch_assoc($result);
        $user_id = $row_fetch['user_id'];
        ?>
        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Order Number</th>
                    <th>Amount</th>
                    <th>Total products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_order_details = "select * from `user_orders` where user_id= $user_id";
                $result_orders = mysqli_query($con, $get_order_details);
                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $amount = $row_orders['amount'];
                    $total_products = $row_orders['total_products'];
                    $invoice_number = $row_orders['invoice_number'];
                    $order_date = $row_orders['order_date'];
                    echo "<tr>
                        <td>$number</td>
                        <td>$order_id</td>
                        <td>$amount</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                    </tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>