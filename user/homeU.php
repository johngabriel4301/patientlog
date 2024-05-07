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
    <title>Home-Patient</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">'
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />'
</head>
<body>
    <nav>
        <div class="links">
            <li class="icon-bars"><i class="fa-solid fa-bars" onclick="sideNav()"></i></li>
            <a href="../index.php"><img src="../imgs/Logo.png" alt=""></a>

            <ul class="desktop">
                <a href="homeU.php?id=<?= $id;?>"><li><i class="fa-solid fa-house"></i><span class="home">HOME</span></li></a>
            </ul>

            <ul class="sidebar">
                <div class="log-i">
                    <li class="icon-x"><i class="fa-solid fa-xmark" onclick="sideNav1()"></i></li>
                </div> 

                <a href="homeU.php?id=<?= $id;?>"><li class="li2 home"><i class="fa-solid fa-house"></i><span class="home">HOME</span></li></a>

                <div class="login">
                    <a href="../log/Ulogout.php"><button class="log">Logout</button></a>
                </div>
            </ul>
        </div>

        <div class="login desktop">
            <a href="../log/Ulogout.php"><button class="log">Logout</button></a>
        </div>
   </nav> 
    <div class="container1">
        <div class="conts">
                <div class="profile">
                    <i class="fa-regular fa-user"></i>
                </div>
                <a href="profile.php?id=<?= $id;?>"><button class="btn">PROFILE</button></a>
        </div>
        <div class="conts">
                <i class="fa-solid fa-capsules"></i>
                <a href="medicine.php?id=<?= $id;?>"><button class="btn">MEDICINE</button></a>
        </div>
        <div class="conts">
                <i class="fa-solid fa-user"></i>
                <a href="account.php?id=<?= $id;?>"><button class="btn">ACCOUNT</button></a>
        </div>
    </div>

    <script>
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