<?php
include ('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM register WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("location: ../home.php");
    exit();
} else {
    echo "<script>alert('Wrong email or password. Please try again.'); setTimeout(function(){ window.location.href = 'login.php'; }, 1000);</script>";
}
?>