<?php
include ('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "select * from `user_orders` where order_id=$order_id";
    $result = mysqli_query($con,$select_data);
    $row_fetch= mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount= $row_fetch['amount'];
}
$update_orders = "update `user_orders` set order_status"
?>