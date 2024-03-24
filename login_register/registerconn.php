<?php require 'connection.php'; ?>
<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$insert = "INSERT INTO register VALUES('$firstname','$lastname','$email','$password', '$gender')";
$result = $conn->query($insert);
if ($result === True) {
    echo "sucess";
} else {
    echo "Failed";
}
