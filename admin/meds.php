<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicines</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <div class="links">
            <ul>
                <a href="../index.php"><li class="title">Patient Log</li></a>
                <a href="homeA.php"><li><i class="fa-solid fa-house-chimney"></i><span>Dashboard</span></li></a>
                <a href="patientsA.php"><li><i class="fa-solid fa-circle-user"></i><span>Patients</span></li></a>
                <a href="meds.php"><li class="target"><i class="fa-solid fa-capsules"></i><span>Medicines</span></li></a>
                <a href="accounts.php"><li><i class="fa-solid fa-user"></i><span>Accounts</span></li></a>
            </ul>
        </div>

        <div class="btn">
            <a href="../log/Alogout.php"><button class="logout">Logout</button></a>
        </div>
    </nav>

    <div class="navs">
            <div class="h1">
                <div class="search">
                    <input type="search" placeholder="Search condition" class="searchbar" onkeyup="search()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>  
            </div>

            <div class="opts">
                <a href="meds-add.php"><button class="add"><i class="fa-solid fa-square-plus"></i> Add</button></a>
                <a href="../index.php"><img src="../imgs/Logo.png" alt=""></a>
            </div>   
    </div>

    <div class="container3">
        <div class="txt">
            <h1>Medical Conditions Covered by our Medicine</h1>
        </div>
        <div class="boxes">

        <?php
            $query = "SELECT DISTINCT medCondition FROM medicine ORDER BY medCondition ASC";
            $run_query = mysqli_query($con, $query);

            if(mysqli_num_rows($run_query)>0){
                while($row = mysqli_fetch_array($run_query)){

                    $cond = $row['medCondition'];
                    $query2 ="SELECT recomMedicines FROM medicine WHERE medCondition = '$cond'";
                    $run_query2 = mysqli_query($con, $query2);
                    $num_rows = mysqli_num_rows($run_query2);
        ?>
            <div class="box1">
                <div class="cname">
                    <h4><?= $row['medCondition'];?></h4>
                </div>
                <div class="num">
                    <h2><?= $num_rows;?> Meds</h2>
                </div>
                <div class="more">
                    <a href="medDisplay.php?cond=<?= $row['medCondition'];?>">More Info <i class="fa-solid fa-circle-arrow-right"></i></a>
                </div>
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
        const search =() => {
            var searchbar, filter, boxes, div, cond, i, txtValue;
            searchbar = document.querySelector('.searchbar');
            filter = searchbar.value.toUpperCase();
            boxes = document.querySelector('.boxes');
            div = document.querySelectorAll('.box1');
            cond = document.querySelectorAll('h4');

            for (i = 0; i < cond.length; i++) {
              const match = div[i].querySelectorAll('h4')[0];
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
    </script>

</body>
</html>