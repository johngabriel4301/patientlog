<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';
    
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT * FROM patients WHERE patientId = '$id'";
    $run_query = mysqli_query($con, $query);

    $row = mysqli_fetch_array($run_query);

    $bdate = $row['pBday'];
    $bday = new DateTime($bdate);
    $bdayformatted = $bday->format('m-d-Y');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

        <div class="login">
            <a href="newlog.php?id=<?= $id?>"><button class="btn"><i class="fa-solid fa-plus"></i> Newlog</button></a>
            <a href="javascript:window.history.back()"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>
   </nav> 

   <div class="container">
        <h2>NAME: <?php 
                if($row['middleName'] != ''){
                    $mname = $row['middleName'];
                    echo " ".$row['lastName'].", ".$row['firstName']." "."$mname[0].";
                }else{
                    echo " ".$row['lastName'].", ".$row['firstName'];
                }
        ?></h2>
        <h4><b>Age:</b> <?= $row['pAge'];?></h4>
        <h4><b>Gender:</b> <?= $row['pGender'];?></h4>
        <h4><b>Birthday:</b> <?= $bdayformatted?></h4>
        <h4><b>Contact Number:</b> <?= $row['pCpnumber'];?></h4>
        <h4><b>Address:</b> <?= $row['pAddress'];?></h4>
        <h4><b>Email Address:</b> <?= $row['pEmail'];?></h4>
   </div>

   <div class="histmed">
        <h1>LOG & MEDICAL HISTORY</h1>
   </div>

   <table class="table">
    <thead>
        <tr>
            <th class="th1">DATE AND TIME</th>
            <th class="th2">DETAILS</th>
        </tr>
    </thead>
    <tbody>
            <?php
                $query1 = "SELECT * FROM phistory WHERE patientID = '$id' ORDER BY logDateTime DESC";
                $run_query1 = mysqli_query($con, $query1);

                if(mysqli_num_rows($run_query1)>0){
                    while($row1 = mysqli_fetch_array($run_query1)){
                        $date = $row1['logDateTime'];
                        $dateTime = new DateTime($date);
                        $formattedDateTime = $dateTime->format('m-d-Y H:i'); 

            ?>
        
        <tr>
            <td><?= $formattedDateTime;?></td>
            <td><?= $row1['medHist'];?></td>
        </tr>

        <?php
            }
        }else{
            echo "<td colspan ='2'>No Logs Found!</td>";
        }
        ?>
    </tbody>
   </table>
</body>
</html>