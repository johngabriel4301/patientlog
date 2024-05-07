<?php
    require '../config/dbconn.php';
    require '../log/Ulogin.php';

    $id = mysqli_real_escape_string($con, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/Uaccount.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">'
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />'
</head>
<body>
    <nav>
        <div class="links">
            <a href="index.php"><img src="../imgs/Logo.png" alt=""></a>
        </div>

        <div class="title">
                <h1>CHANGE PASSWORD</h1>
        </div>

   </nav> 
    <form action="../function/Ufunction.php?id=<?= $id;?>" method="POST" class="form2">
        <div class="inps">
            <label for="password">Enter Old Password</label>
            <input type="password" name="opassword" required>
        </div>

        <div class="inps">
            <label for="password">Enter New Password</label>
            <input type="password" name="npass" required>
        </div>

        <div class="inps">
            <label for="password">Confirm New Password</label>
            <input type="password" name="cpass" required>
        </div>

        <div class="btns">
        <a href="account.php?id=<?= $id;?>"><button class="cancel" type="button"><i class="fa-regular fa-circle-xmark"></i> Cancel</button></a>
            <button type="submit" name="submit1" class="confirm"><i class="fa-regular fa-circle-check"></i> Confirm</button>
            
        </div> 
    </form>
</body>
</html>