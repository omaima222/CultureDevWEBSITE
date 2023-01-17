<?php
 require_once '../controller/Admin_controller.php';
 $Admin = new Admin_controller();
 $Admin->sign();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/sass/main.css">
    <title>Document</title>
</head>
<body class="logBody">
    <form action="" method="POST" enctype="multipart/form-data">
        <h1 class="logTitle">Sign up</h1>
        <section>
            <div class="logDiv">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" required>
            </div>
            <div class="logDiv">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" required>
            </div>
            <div class="logDiv">
                <label for="email">Email</label>
                <input type="text" name="email" required>
            </div>
            <div class="logDiv">
                <label for="password">Password</label>
                <input type="text" name="password" required>
            </div>
            <div class="logDiv">
                <label for="pfp">Profile picture</label>
                <input class="pfp" type="file" name="pfp" accept=" .jpg, .png, .jpeg">
            </div>
            <button class="logSubmit" name="SignSubmit" type="submit">S U B M I T</button>
        </section>
    </form>
    <h1 class="logToSign">Already have an account ? <a href="login.php">Login</a></h1>
</body>
</html>