<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
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
                <a href="patientsA.php"><li class="target"><i class="fa-solid fa-circle-user"></i><span>Patients</span></li></a>
                <a href="meds.php"><li><i class="fa-solid fa-capsules"></i><span>Medicines</span></li></a>
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
                    <input type="search" placeholder="Search patient name" class="searchbar" onkeyup="search()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            
            <div class="opts">
                <a href="createA.php"><button class="add"><i class="fa-solid fa-square-plus"></i> Add</button></a>
                <a href="../index.php"><img src="../imgs/Logo.png" alt=""></a>
            </div> 
            
    </div>

    <div class="container2">
        <table class="table3">
            <thead>
                <tr>
                    <th colspan="6" class="hdr">Patient Information</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody class="table">
                <?php
                    $query = "SELECT * FROM patients ORDER BY lastName ASC";
                    $run_query = mysqli_query($con, $query);

                    if(mysqli_num_rows($run_query)>0){
                        while($row = mysqli_fetch_array($run_query)){


                ?>
                <tr>
                    <td>
                        <?php
                            if($row['middleName'] != ''){
                                $mname = $row['middleName'];
                                echo " ".$row['lastName'].", ".$row['firstName']." "."$mname[0].";
                            }else{
                                echo " ".$row['lastName'].", ".$row['firstName'];
                            }
                        ?>
                    </td>
                    <td><?= $row['pAge'];?></td>
                    <td><?= $row['pGender'];?></td>
                    <td><?= $row['pCpnumber'];?></td>
                    <td><?= $row['pEmail']?></td>
                    <td>
                        <a href="viewP.php?id=<?= $row['patientId'];?>"><button class="view"><i class="fa-regular fa-eye"></i>View</button></a>
                    </td>
                </tr>

            <?php
                    }
                }else{
                    echo "<td colspan = '6'>No Patients Found</td>";
                }
            ?>
            </tbody>
        </table>
    </div>
    
    <script>
        const search =() => {
            var input, filter, table, tr, td, i, txtValue;
            input = document.querySelector('.searchbar');
            filter = input.value.toUpperCase();
            table = document.querySelector('.table');
            tr = table.querySelectorAll('tr');

            for (i = 0; i < tr.length; i++) {
              td = tr[i].querySelectorAll('td')[0];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
        }

    </script>
    
</body>
</html>