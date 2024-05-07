<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

    unset($_SESSION['id']);
    unset($_SESSION['password']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
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
                <a href="../index.html"><li class="title">Patient Log</li></a>
                <a href="homeA.php"><li><i class="fa-solid fa-house-chimney"></i><span>Dashboard</span></li></a>
                <a href="patientsA.php"><li><i class="fa-solid fa-circle-user"></i><span>Patients</span></li></a>
                <a href="meds.php"><li><i class="fa-solid fa-capsules"></i><span>Medicines</span></li></a>
                <a href="accounts.php"><li class="target"><i class="fa-solid fa-user"></i><span>Accounts</span></li></a>
            </ul>
        </div>

        <div class="btn">
            <a href="../log/Alogout.php"><button class="logout">Logout</button></a>
        </div>
    </nav>

    <div class="navs">
            <div class="h1">
                <div class="search">
                    <input type="search" placeholder="Search name" class="searchbar" onkeyup="search()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            
            <a href="../index.html"><img src="../imgs/Logo.png" alt=""></a>
    </div>

    <div class="container4">
        <div class="txt">
            <h1>Manage Accounts</h1>
        </div>

        <div class="info">
            <div class="manage">
                <div class="p1">
                    <h2>Patient Account Information</h2>

                    <table class="table4">
                        <thead>
                            <tr>
                                <th>Name</th>
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
                                <td class="td1">
                                    <a href="confirmpassA.php?id=<?= $row['patientId'];?>"><button><i class="fa-solid fa-eye"></i>View</button></a>
                                    <form action="../function/Afunction.php?id=<?= $row['patientId'];?>" method="POST">
                                        <button type="submit" name="submit12"><i class="fa-solid fa-eye-slash"></i>Hide</button>
                                    </form>
                                    
                                </td>
                            </tr>

                        <?php
                                }
                            }else{
                                echo "<td colspan= '2'>No Accounts Found!</td>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="p2">
                    <h2>Manage Admin</h2>

                    <div class="btn">
                        <button class="edit"><i class="fa-solid fa-pen-to-square"></i>Edit Admin</button>
                    </div>
                    
                </div>
            </div>
            <div class="p3">
                    <h2>Options</h2>
                    <div class="actions">
                        <button class="open"><i class="fa-solid fa-trash"></i> Delete All Accounts</button>
                        <button class="open2"><i class="fa-solid fa-trash"></i> Delete All Medicines</button>
                        <a href="archive.php"><button><i class="fa-solid fa-box-archive"></i> Archive</button></a>
                    </div>
            </div>
        </div>
        
    </div>

    <div class="bkg1">
        <div class="contpop">
            <div class="txt">
                <h1>Are you sure you want <br>to delete all accounts?</h1>
            </div>
            <div class="btns">

                <form action="../function/Afunction.php" method="POST">
                    <button type="submit" class="yes" name="submit8">Yes</button>
                </form>
                <button class="no">No</button>
                
            </div>
        </div>
    </div>

    <div class="bkg2">
        <div class="contpop">
            <div class="txt1">
            <h1>Are you sure you want <br>to delete all medicines?</h1>
            </div>
            <div class="btns">
                <form action="../function/Afunction.php" method="POST">
                    <button type="submit" class="yes" name="submit9">Yes</button>
                </form>
                <button class="no1">No</button>
            </div>
        </div>
    </div>



    <div class="bkg4">
        <div class="contpop conf">
            <div class="icon"><i class="fa-solid fa-circle-xmark"></i></div>
            <div class="txt1">
                <h3>Enter admin password to edit admin</h3>
            </div>
            <form action="../function/Afunction.php" method="POST" class="form-pass">
                <div class="inp">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password1" >
                </div>
                <div class="btns1">
                        <button type="submit" class="confirm" name="submit10">Confirm</button> 
                </div>
            </form>        
                
        </div>
    </div>


    <script>
        const open = document.querySelector('.open');
        const open2 = document.querySelector('.open2');
        const open4 = document.querySelector('.edit');
        const popup = document.querySelector('.bkg1');
        const popup2 = document.querySelector('.bkg2');
        const popup4 = document.querySelector('.bkg4');
        const close = document.querySelector('.no');
        const close2 = document.querySelector('.no1');
        const close4 = document.querySelector('.fa-circle-xmark');
        

        open.onclick = () => {
            popup.classList.add('active');
        }

        close.onclick = () => {
            popup.classList.remove('active');
        }

        open2.onclick = () => {
            popup2.classList.add('active');
        }

        close2.onclick = () => {
            popup2.classList.remove('active');
        }

        open4.onclick = () => {
            popup4.classList.add('active');
        }

        close4.onclick = () => {
            popup4.classList.remove('active');
        }

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