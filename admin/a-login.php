<?php
    session_start();
    require '../config/dbconn.php';

    if(isset($_SESSION['username'])){
       header("Location: homeA.php"); 
       exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
</head>
<body>
    <div class="container">
        <div class="mcon">
            <form action="../function/Afunction.php" method="POST" class="inpfield">
                <h3>ADMIN LOGIN</h3>
                <div class="inps">
                    <label for="username">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="inps">
                    <label for="password">Password</label>
                    <input type="password" name="patientPass">
                </div>

                <a href="recoverA.php" class="fgot">Forgot Password?</a>

                <button type="submit" name="submit" class="login">Login</button>
            </form>
            <div class="imgfield">
                <img src="../imgs/Logo.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>