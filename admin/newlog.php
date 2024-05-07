<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

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
    <title>Create Log</title>
    <link rel="stylesheet" href="../css/sidepageA.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <div class="links">
            <a href="index.php"><img src="../imgs/Logo.png" alt=""></a>
            <h1>Patient's Profile</h1>
        </div>

        <div class="login solo">
            <a href="javascript:window.history.back()"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>
   </nav> 

   <div class="container2">
        <form action="../function/Afunction.php?id=<?= $id?>" method="POST" class="form1">
            <div class="txt">
                <h1>Create a New <br>Log for Mr/Ms <br>
                    <?php
                        if($row['middleName'] != ''){
                            $mname = $row['middleName'];
                            echo " ".$row['lastName'].", ".$row['firstName']." "."$mname[0].";
                        }else{
                            echo " ".$row['lastName'].", ".$row['firstName'];
                        }
                    ?>
                 </h1>
            </div>    

            <div class="inp">
                <textarea name="newlog" id="newlog" cols="30" rows="10"></textarea>

                <div class="btn">
                    <button type="submit" name="submit3">Submit</button>
                </div>
            </div>
        </form>
   </div>
    

</body>
</html>