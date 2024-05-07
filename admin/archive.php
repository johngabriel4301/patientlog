<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
    <link rel="stylesheet" href="../css/sidepageA.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
        <nav>
        <div class="links create">
            <a href="index.html"><img src="../imgs/Logo.png" alt=""></a>
            <h1>Archive</h1>
        </div>

                <div class="search">
                    <input type="search" placeholder="Search name" class="searchbar" onkeyup="search()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>  


        <div class="login solo">
            <a href="javascript:window.history.back()"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>

   </nav> 

    <div class="container5">
        <table class="table3">
            <thead>
                <tr>
                    <th colspan="6" class="hdr">Archived Patient Data</th>
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
                    $query = "SELECT * FROM archive ORDER BY lastName ASC";
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
                    <td><?= $row['pEmail'];?></td>
                    <td class="btns1">
                        <form action="../function/Afunction.php?id=<?= $row['patientId'];?>" method="POST">
                            <button type="submit" name="submit13"><i class="fa-regular fa-eye"></i>Unhide</button>
                            <button type="submit" name="submit14"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>
                    </td>
                </tr>

            <?php
                    }
                }else{
                    echo "<td colspan = '6'>No Archives Found!</td>";
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