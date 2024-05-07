<?php
    require '../config/dbconn.php';
    require '../log/Ulogin.php';

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
    <link rel="stylesheet" href="../css/user.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <nav>
        <div class="links">
            <li class="icon-bars"><i class="fa-solid fa-bars" onclick="sideNav()"></i></li>
            <a href="../index.php"><img src="../imgs/Logo.png" alt=""></a>

            <ul class="desktop">
                <a href="homeU.php?id=<?= $id;?>"><li class="li1 home" onmouseover="hover()" onmouseout="mouseOut()"><i class="fa-solid fa-house"></i><span class="home">HOME</span></li></a>
                <a href="profile.php?id=<?= $id;?>"><li class="li2 prof" ><i class="fa-solid fa-circle-user"></i><span class="prof">PROFILE</span></li></a>
                <a href="medicine.php?id=<?= $id;?>"><li class="li1 meds" onmouseover="hover1()" onmouseout="mouseOut1()"><i class="fa-solid fa-capsules"></i><span class="med">MEDICINE</span></li></a>
                <a href="account.php?id=<?= $id;?>"><li class="li1 accs" onmouseover="hover2()" onmouseout="mouseOut2()"><i class="fa-solid fa-user"></i><span class="acc">ACCOUNT</span></li></a>
            </ul>

            <ul class="sidebar">
                <div class="log-i">
                    <li class="icon-x"><i class="fa-solid fa-xmark" onclick="sideNav1()"></i></li>
                </div> 
                <a href="homeU.php?id=<?= $id;?>"><li class="li1 home" onmouseover="hover()" onmouseout="mouseOut()"><i class="fa-solid fa-house"></i><span class="home">HOME</span></li></a>
                <a href="profile.php?id=<?= $id;?>"><li class="li2 prof" ><i class="fa-solid fa-circle-user"></i><span class="prof">PROFILE</span></li></a>
                <a href="medicine.php?id=<?= $id;?>"><li class="li1 meds" onmouseover="hover1()" onmouseout="mouseOut1()"><i class="fa-solid fa-capsules"></i><span class="med">MEDICINE</span></li></a>
                <a href="account.php?id=<?= $id;?>"><li class="li1 accs" onmouseover="hover2()" onmouseout="mouseOut2()"><i class="fa-solid fa-user"></i><span class="acc">ACCOUNT</span></li></a>
                
                <div class="login">
                    <a href="../log/Ulogout.php"><button class="log">Logout</button></a>
                </div>
            </ul>

            
        </div>

        <div class="login desktop">
            <a href="../log/Ulogout.php"><button class="log">Logout</button></a>
        </div>
   </nav> 

   <div class="container2">
        <h2>NAME: 
            <?php
                if($row['middleName'] != ''){
                    $mname = $row['middleName'];
                    echo " ".$row['lastName'].", ".$row['firstName']." "."$mname[0].";
                }else{
                    echo " ".$row['lastName'].", ".$row['firstName'];
                }
            ?>
        </h2>
        <h4><b>Age:</b> <?= $row['pAge'];?></h4>
        <h4><b>Gender:</b> <?= $row['pGender'];?></h4>
        <h4><b>Birthday:</b> <?= $bdayformatted;?></h4>
        <h4><b>Contact Number:</b> <?= $row['pCpnumber'];?></h4>
        <h4><b>Address:</b> <?= $row['pAddress'];?></h4>
        <h4><b>Email Address:</b> <?= $row['pEmail'];?></h4>
   </div>

   <div class="histmed">
        <h1>LOG & MEDICAL HISTORY</h1>
   </div>

   <table class="table1">
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

   <script>
     const icon = document.querySelector('.fa-house');
    const icon1 = document.querySelector('.fa-capsules');
    const icon2 = document.querySelector('.fa-solid.fa-user');
    const icon3 = document.querySelector('.fa-circle-user');
    
    function hover(){
        icon.style.color = "#E7DFD8";
    }

    function mouseOut(){
        icon.style.color = "#54504D";
    }

    function hover1(){
        icon1.style.color = "#E7DFD8";
    }
    function mouseOut1(){
        icon1.style.color = "#54504D";
    }

    function hover2(){
        icon2.style.color = "#E7DFD8";
    }
    function mouseOut2(){
        icon2.style.color = "#54504D";
    }

    const sideNav = () =>{
        const slide = document. querySelector('.sidebar');

        slide.style.left = "0";  
    }

    const sideNav1 = () =>{
        const slide = document. querySelector('.sidebar');

        slide.style.left = "-14rem";  
    }
   </script>
</body>
</html>