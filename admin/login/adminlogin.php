<?php
session_start();

require_once "adminconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_login WHERE username = ? AND password = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header("Location: ../dashboard/dashboard.php");
                exit;
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>

<body>
    <h2>Admin Login</h2>
    <?php
    if (isset ($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>