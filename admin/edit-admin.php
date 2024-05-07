<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';
    
    if(!isset($_SESSION['password'])){
        header("location: ../admin/accounts.php"); 
        exit(0);
    }
    $query = "SELECT * FROM admin";
    $run_query = mysqli_query($con, $query);

    $row = mysqli_fetch_array($run_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
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
            <h1>Make Changes</h1>
        </div>

        <div class="login solo">
            <a href="accounts.php"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>
   </nav> 
    <div class="container3">
        <form action="../function/Afunction.php?un=<?= $row['username'];?>" method="POST" class="form3">
            <div class="txt1">
                <h2>You can now edit admin information</h2>
            </div>
            <div class="inp">
                <label for="username">Username</label>
                <input type="text" name="username" id="" required value="<?= $row['username'];?>">
            </div>
            
            <div class="inp">
                <label for="med">New Password</label>
                <input type="password" name="password1" id="" required value="<?= $row['password'];?>">
            </div>

            <div class="inp">
                <label for="stock">Confirm New Password</label>
                <input type="password" name="password2" id="" required value="<?= $row['password'];?>">
            </div>

            <div class="btn">
                <button type="submit" name="submit11" class="submit">Save</button>
            </div>
        </form>
    </div>
   
</body>
</html>