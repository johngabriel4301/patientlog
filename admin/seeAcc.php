<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

    if(!isset($_SESSION['id'])){
        header("Location: ../admin/accounts.php");
        exit(0);
    }

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);

        $query = "SELECT * FROM patients WHERE patientId = '$id'";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Account</title>
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
            <h1>Private Account Information</h1>
        </div>

        <div class="login solo">
            <a href="accounts.php"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>
   </nav> 
    <div class="container3">
        <form action="" method="POST" class="form3">
            <div class="txt1">
                <h2>Please handle the data with privacy!</h2>
            </div>
            <div class="inp">
                <label for="username">Email</label>
                <input type="text"  readonly value="<?= $row['pEmail'];?>">
            </div>
            
            <div class="inp">
                <label for="username1">Contact Number</label>
                <input type="text"  readonly value="<?= $row['pCpnumber'];?>">
            </div>

            <div class="inp">
                <label for="password">Password</label>
                <input type="text"  readonly value="<?= md5($row['patientPass']);?>">
            </div>
        </form>
    </div>
   
</body>
</html>