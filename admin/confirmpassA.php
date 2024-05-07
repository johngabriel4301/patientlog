<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';
    $id = mysqli_real_escape_string($con, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>
    <link rel="stylesheet" href="../css/sidepageA.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <nav>
        <div class="links create">
            <a href="index.php"><img src="../imgs/Logo.png" alt=""></a>
            <h1>Private Access of Accounts</h1>
        </div>

        <div class="login solo">
            <a href="accounts.php"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>
   </nav> 
    <div class="container3">
        <form action="../function/Afunction.php?id=<?= $id;?>" method="POST" class="form3">
            <div class="txt1">
                <h2>Enter admin password to see private data of accounts</h2>
            </div>
            <div class="inp">
                <label for="password">Enter Password</label>
                <input type="password" name="pass1" id="" required>
            </div>
            
            <div class="inp">
                <label for="med">Confirm Password</label>
                <input type="password" name="pass2" id="" required>
            </div>

            <div class="btn">
                <button type="submit" name="submit15" class="submit">Confirm</button>
            </div>
        </form>
    </div>
   
</body>
</html>