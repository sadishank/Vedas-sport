<?php
if (isset($_GET['delete_users'])) {
    $user_id = $_GET['delete_users'];
    $delete_users = "Delete from `register` where user_id = $user_id";
    $result_users = mysqli_query($con, $delete_users);
    if ($result_users) {
        echo "<script>alert('User Deleted successfully.')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
}
?>