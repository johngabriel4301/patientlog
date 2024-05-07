<?php
session_start();
    require '../config/dbconn.php';
    unset($_SESSION['username2']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
</head>
<body>
    <div class="container">
        <div class="mcon">
            <div class="imgfield">
                <img src="../imgs/Logo.png" alt="">
            </div>
            <form action="../function/Ufunction.php" method="POST" class="inpfield">
                <h3 class="h3">FORGOT PASSWORD?</h3>
                <div class="inps">
                    <label for="username">Email/Cellphone Number</label>
                    <input type="text" name="username" required>
                </div>

                <button type="submit" name="submit3" class="login">Confirm</button>
            </form>
        </div>
    </div>
</body>
</html>