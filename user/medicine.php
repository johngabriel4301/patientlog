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
    <title>Medicine</title>
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
                <a href="homeU.php?id=<?= $id;?>"><li class="li1 home" onmouseover="hover()" onmouseout="mouseOut()"><i class="fa-solid fa-house"></i><span class="home">HOME</span></li></a>
                <a href="profile.php?id=<?= $id;?>"><li class="li1 prof"onmouseover="hover1()" onmouseout="mouseOut1()"><i class="fa-solid fa-circle-user"></i><span class="prof">PROFILE</span></li></a>
                <a href="medicine.php?id=<?= $id;?>"><li class="li2 meds" ><i class="fa-solid fa-capsules"></i><span class="med">MEDICINE</span></li></a>
                <a href="account.php?id=<?= $id;?>"><li class="li1 accs" onmouseover="hover2()" onmouseout="mouseOut2()"><i class="fa-solid fa-user"></i><span class="acc">ACCOUNT</span></li></a>
            </ul>

            <ul class="sidebar">
                <div class="log-i">
                    <li class="icon-x"><i class="fa-solid fa-xmark" onclick="sideNav1()"></i></li>
                </div> 
                <a href="homeU.php?id=<?= $id;?>"><li class="li1 home" onmouseover="hover()" onmouseout="mouseOut()"><i class="fa-solid fa-house"></i><span class="home">HOME</span></li></a>
                <a href="profile.php?id=<?= $id;?>"><li class="li1 prof"onmouseover="hover1()" onmouseout="mouseOut1()"><i class="fa-solid fa-circle-user"></i><span class="prof">PROFILE</span></li></a>
                <a href="medicine.php?id=<?= $id;?>"><li class="li2 meds" ><i class="fa-solid fa-capsules"></i><span class="med">MEDICINE</span></li></a>
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

   <div class="container3">
        <div class="txt">
            <h1>TYPE OF CONDITION</h1>
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="Search condition" class="searchbar" onkeyup="search()"> 
            </div>
        </div>

        <div class="boxes">
            <?php
                $query = "SELECT DISTINCT medCondition FROM medicine ORDER BY medCondition ASC";
                $run_query = mysqli_query($con, $query);

                if(mysqli_num_rows($run_query)>0){
                    while($row = mysqli_fetch_array($run_query)){                     
             ?>
            <div class="box">
                    <h2><?= $row['medCondition'];?></h2>

                    <table class="table2">
                        <thead>
                            <tr>
                                <th>Medicine Name</th>
                                <th>No. of Stocks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cond = $row['medCondition'];
                            $query1 = "SELECT * FROM medicine WHERE medCondition = '$cond' ORDER BY recomMedicines ASC";
                            $run_query1 = mysqli_query($con, $query1);
    
                            while($row1 = mysqli_fetch_array($run_query1)){
                            
                            ?>
                            <tr>
                                <td><?= $row1['recomMedicines'];?></td>
                                <td><?= $row1['medStocks'];?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
            </div>

            <?php          
                            
                        }
                    }else{
                        echo "<h1 style = 'color: rgba(0, 0, 0, 0.3); width:100%; display:flex; justify-content:center;'>
                        No Medical Conditions Found!
                        </h1>";
                    }
            ?>

        </div>
        
   </div>

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
            icon3.style.color = "#E7DFD8";
        }
        function mouseOut1(){
            icon3.style.color = "#54504D";
        }

        function hover2(){
            icon2.style.color = "#E7DFD8";
        }
        function mouseOut2(){
            icon2.style.color = "#54504D";
        }

        
   </script>

    <script>
        const search =() => {
            var searchbar, filter, boxes, div, cond, i, txtValue;
            searchbar = document.querySelector('.searchbar');
            filter = searchbar.value.toUpperCase();
            boxes = document.querySelector('.boxes');
            div = document.querySelectorAll('.box');
            cond = document.querySelectorAll('h2');

            for (i = 0; i < cond.length; i++) {
              const match = div[i].querySelectorAll('h2')[0];
              if (match) {
                txtValue = match.textContent || match.innerHTML;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  div[i].style.display = "";
                } else {
                  div[i].style.display = "none";
                }
              }
            }
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