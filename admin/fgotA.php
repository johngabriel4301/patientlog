<?php
session_start();
    require '../config/dbconn.php';

    if(!isset($_SESSION['recovC'])){
        echo "<script>document.location='../admin/recoverA.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
                    <label for="password">Enter new password</label>
                    <input type="password" name="password1" required>
                </div>

                <div class="inps">
                    <label for="password">Confirm new password</label>
                    <input type="password" name="password2" required>
                </div>

                <button type="submit" name="submit2" class="login">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>