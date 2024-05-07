<?php
    require '../config/dbconn.php';
    require '../log/Ulogin.php';

    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM patients WHERE patientId = '$id'";
    $run_query = mysqli_query($con, $query);    
    $row = mysqli_fetch_array($run_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/Uaccount.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">'
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />'
</head>
<body>
    <nav>
        <div class="links edit">
            <a href="index.php"><img src="../imgs/Logo.png" alt=""></a>
        </div>

        <div class="title">
                <h1>EDIT PROFILE</h1>
        </div>

   </nav> 
   <form action="../function/Ufunction.php?id=<?= $id;?>" method="POST" class="form1">
        <div class="inp">
            <div class="inps">
                <label for="name">First Name</label>
                <input type="text" name="firstName" required class="inp1" value="<?= $row['firstName'];?>">
            </div>

            <div class="inps">
                <label for="name">Middle Name</label>
                <input type="text" name="middleName" class="inp1" value="<?= $row['middleName'];?>">
            </div>


            <div class="inps">
                <label for="name">Last Name</label>
                <input type="text" name="lastName" required class="inp1" value="<?= $row['lastName'];?>">
            </div>
        </div>

        <div class="inp">
            <div class="inps">
                <label for="age">Age</label>
                <input type="number" name="pAge" required class="inp2" value="<?= $row['pAge'];?>">
            </div>

            <div class="inps">
                <label for="gender">Gender</label>
                <div class="gends">
                    <input type="radio" name="pGender" required value="Male" class="rdio1"> Male
                    <input type="radio" name="pGender" required value="Female" class="rdio"> Female
                </div> 
            </div>

            <div class="inps">
                <label for="bday">Birthday</label>
                <input type="date" name="pBday" required class="inp2" value="<?= $row['pBday'];?>">
            </div>

            <div class="inps">
                <label for="cpnum">Contact Number</label>
                <input type="tel" name="pCpnumber" required  class="inp3" value="<?= $row['pCpnumber'];?>">
            </div>
        </div>

        <div class="inp add">
            <div class="inps">
                <label for="Address">Address</label>
            </div>
            <div class="adds">
                    <input type="text" name="address1" placeholder="Barangay" class="inp1" required>
                    <input type="text" name="address2" placeholder="Municipality" class="inp1" required>
                    <input type="text" name="address3" placeholder="Province" class="inp1"required> 
            </div>
        </div>

        <div class="inp email">
            <div class="inps">
                <label for="email">Email</label>
                <input type="email" name="pEmail" class="inp4" value="<?= $row['pEmail'];?>">
            </div>

        <div class="btns">
            <a href="account.php?id=<?= $id;?>"><button class="cancel" type="button"><i class="fa-regular fa-circle-xmark"></i> Cancel</button></a>
            <button type="submit" name="submit2" class="confirm"><i class="fa-regular fa-circle-check"></i> Confirm</button>
        </div>  
        </div>
   </form>
   
</body>
</html>