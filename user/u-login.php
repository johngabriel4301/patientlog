<?php
    session_start();
    require '../config/dbconn.php';

    unset($_SESSION['username2']);
    if(isset($_SESSION['username1'])){
        $username1 = $_SESSION['username1'];
        $query = "SELECT * FROM patients WHERE pEmail = '$username1' or pCpnumber = '$username1'";
        $run_query = mysqli_query($con, $query);    
        $row = mysqli_fetch_array($run_query);
        $id = $row['patientId'];

        header("Location: homeU.php?id=$id");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
</head>
<body>
    <div class="container">
        <div class="mcon">
            <form action="../function/Ufunction.php" method="POST" class="inpfield">
                <h3><img src="../imgs/Logo.png" alt="" class="imglog"> LOGIN</h3>
                <div class="inps">
                    <label for="username">Email/Cellphone Number</label>
                    <input type="text" name="username">
                </div>
                <div class="inps">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>

                <a href="recoverU.php" class="fgot">Forgot Password?</a>

                <button type="submit" name="submit" class="login">Login</button>
            </form>
            <div class="imgfield">
                <img src="../imgs/Logo.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>