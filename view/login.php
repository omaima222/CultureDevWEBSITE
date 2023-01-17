<?php
 require_once '../controller/Admin_controller.php';
 $Admin = new Admin_controller();
 $Admin->log();
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
    <form action="" method="POST" class="loginForm">
        <h1 class="loginTitle">Log in</h1>
        <section>
            <div class="logDiv">
                <?php if (isset($_SESSION['loginError'])) { ?>
                    <div class="error"><?= $_SESSION['loginError']; ?></div>
                <?php }
                unset($_SESSION['loginError']); ?>
            </div>
            <div class="logDiv">
                <label for="email">Email</label>
                <input type="text" name="logemail" required>
            </div>
            <div class="logDiv">
                <label for="password">Password</label>
                <input type="text" name="logpassword" required>
            </div>
            <button class="logSubmit" name="logSubmit"  type="submit">S U B M I T</button>
        </section>
    </form>
</body>
</html>