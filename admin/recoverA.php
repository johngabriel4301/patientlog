<?php
session_start();
    require '../config/dbconn.php';

    unset($_SESSION['recovC']);
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
</head>
<body>
    <div class="container">
        <div class="mcon">
            <div class="imgfield">
                <img src="../imgs/Logo.png" alt="">
            </div>
            <form action="../function/Afunction.php" method="POST" class="inpfield">
                <h3 class="h3">FORGOT PASSWORD?</h3>
                <div class="inps">
                    <label for="username">Username</label>
                    <input type="text" name="username" required >
                </div>
                <div class="inps">
                    <label for="password">Enter Recovery Code</label>
                    <input type="password" name="recovC">
                </div>

                <button type="submit" name="submit1" class="login">Confirm</button>

                <h5><pre>Note:  Contact your developer for recovery code</pre></h5>
            </form>
        </div>
    </div>
</body>
</html>