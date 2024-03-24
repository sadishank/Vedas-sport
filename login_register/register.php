<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create_New_Account</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <h1><a href="index.html"><span class="name_head">Vedas</span> <span class="name_tail">Sports</span></a></h1>
    <div class="content">
        <h2>Create a New Account</h2>
        <p>It's quick and easy.</p>
        <hr>
        <form method="POST" action="registerconn.php">
            <input type="text" placeholder="First Name" name="firstname" class="a" required>
            <input type="text" class="b" placeholder="Last Name" name="lastname" required> <br>
            <input type="text" placeholder="Email address" name="email" class="c" required><br>
            <input type="password" placeholder="Password" name="password" required class="d"><br>
            <label for="birthday" class="birthday">Birthday</label> <br>
            <label for="gender">Gender</label>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Others
            </div>
            <label for="Gender" name="gender" class="gender">Gender</label><br>
            <div class="genderbox">
        <div class="male">
            <input type="radio" name="my gender" required>
            <p> Male</p>
        </div>
        <div class="female">
            <input type="radio" name="my gender" required>
            <p>Female</p>
        </div>
        <div class="others">
            <input type="radio" name="my gender" required>
            <p>Others</p>
        </div>
            
    </div>
    <div class="sign_up">
        <button type="submit">Sign Up</button>
    </div>
    <div class="account">
        <a href="login.php">Already have an account?</a>

        </form>
    </div>
    </div>
</body>

</html> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <div class="logo">
        <img src="images/logo1.png" alt="logo">
    </div>

    <div class="content">

        <h2>Create a New Account</h2>
        <p>It's quick and easy.</p>
        <hr>

        <form action="registerconn.php" method="post">
            <input type="text" placeholder="First Name" name="firstname" class="first_name" required>
            <input type="text" class="last_name" name="lastname" placeholder="Last Name" required> <br>
            <input type="text" name="email" placeholder="Email or Mobile Number" class="email_phone" required><br>
            <input type="password" name="password" placeholder="New Password" required class="password"><br>
            <br>
            <hr>
            <div class="sign_up">
                <button type="submit">Sign Up</button>
            </div>
        </form>

        <div class="account">
            <a href="login.php">Already have an account?</a>
        </div>

    </div>
</body>

</html>