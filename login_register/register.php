<?php
include ('../includes/connect.php');
include ('../functions/common_functions.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="register.css">
</head>
<style>
* {
    margin: 0%;
    padding: 0%;
}

body {
    background-image: url(../images/b.jpg);
    background-size: cover;
    text-align: center;
    font-family: arial;
    height: 100vh;
}

.logo {
    padding-top: 30px;
}

a {
    text-decoration: none;
}

.content {
    background-color: rgba(97, 89, 89, 0.8);
    border-radius: 20px;
    border-width: 1px;
    width: 55vh;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 2vh;
    margin: 3% 0;
    box-shadow: 0 0 8vh 0 rgba(139, 16, 2, 1);
}

.name_head {
    color: rgb(243, 33, 33);
}

.name_tail {
    color: rgb(1, 1, 255);
}

h2 {
    padding: 0 0 10px 0;
    font-size: 30px;
}

.content p {
    padding-bottom: 10px;
}

input {
    margin-top: 1vh;
    height: 25px;
    border: solid rgb(6, 6, 6);
    background-color: rgb(97, 89, 89);
    color: aliceblue;
    border-radius: 5px;
    border-width: 1px;
    padding: 5px;
}

.first_name,
.last_name {
    float: left;
    width: 25vh;
}

.last_name {
    float: right;
    width: 25vh;
}

.email_phone {
    width: 53vh;
}

.password {
    width: 53vh;
    margin-bottom: 1vh;
}

button {
    background: transparent;
    border-color: rgb(7, 7, 7);
    padding: 1.7vh;
    margin-top: 2vh;
    width: 25vh;
    border-radius: 50px;
    border-width: 1px;
    border-style: solid;
    font-weight: bold;
    font-size: 15px;
    color: whitesmoke;
}

.sign_up button:hover {
    border: 1px solid rgb(243, 33, 33);
}

.sign_up button:focus {
    border: 1px solid rgb(243, 33, 33);
    outline: none;
}

.account {
    margin: 20px 0 10px 0;
}

.account a {
    text-decoration: none;
    color: snow;
}

.account a:hover {
    color: black;

}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Show the dropdown content when hovering over the profile section */
.profile:hover .dropdown-content {
    display: block;
}

/* Style the links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change the background color of links on hover */
.dropdown-content a:hover {
    background-color: #f1f1f1;
}


input:hover {
    border: 1px solid rgb(243, 33, 33);
}

input:focus {
    border: 1px solid rgb(243, 33, 33);
    outline: none;
}
</style>

<body>
    <div class="logo">
        <img src="../images/logo.png" alt="logo">
    </div>

    <div class="content">

        <h2>Create a New Account</h2>
        <p>It's quick and easy.</p>
        <hr>

        <form action="" method="post">
            <input type="text" placeholder="First Name" name="firstname" class="first_name" required>
            <input type="text" class="last_name" name="lastname" placeholder="Last Name" required> <br>
            <input type="text" name="email" placeholder="Email or Mobile Number" class="email_phone" required><br>
            <input type="password" name="password" placeholder="New Password" required class="password"><br>
            <br>
            <hr>
            <div class="sign_up">
                <input type="submit" value="signup" name="user_signup">
            </div>
        </form>

        <div class="account">
            <a href="login.php">Already have an account?</a>
        </div>

    </div>
</body>

</html>

<?php
if (isset($_POST['user_signup'])) {
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_ip = getIPAddress();


    // same email repeating
    $select_query = "Select * from `register` where email='$user_email' or firstname = '$user_firstname' ";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Email or firstname is already taken')</script>";

    } else {// inserting in db
        $insert_query = "Insert into `register` (firstname,lastname,email,password,user_ip)
        values ('$user_firstname','$user_lastname','$user_email','$hash_password','$user_ip')";
        $sql_execute = mysqli_query($con, $insert_query);
        echo "<script>alert('New user registered sucessfully')</script>";

    }


    //not logged in but cart selected and clicked registered after selecting item//

    $select_cart_items = "Select * from `cart_details` where ip_address = '$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['email'] = $user_email;
        echo "<script>alert('You have some items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../product.php','_self')</script>";

    }
}
?>