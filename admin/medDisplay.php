<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

    $cond = mysqli_real_escape_string($con, $_GET['cond']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Medicines</title>
    <link rel="stylesheet" href="../css/sidepageA.css">
    <link rel="icon" type="image/x-icon" href="../imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <nav>
        <div class="links create">
            <a href="index.php"><img src="../imgs/Logo.png" alt=""></a>
            <h1>Medicines</h1>
        </div>

                <div class="search">
                    <input type="search" placeholder="Search medicine name" class="searchbar" onkeyup="search()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>  


        <div class="login solo">
            <a href="javascript:window.history.back()"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>

   </nav> 

   <div class="container4">
        <div class="txt">
            <h1>Manage Medicines</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th colspan="3"><?= $cond?></th>
                </tr>
                <tr>
                    <th>Medicine Name</th>
                    <th>Stocks</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody class="table">
                <?php
                    $query = "SELECT * FROM medicine WHERE medCondition = '$cond' ORDER BY recomMedicines ASC";
                    $run_query =mysqli_query($con, $query);

                    if(mysqli_num_rows($run_query)>0){
                        while($row = mysqli_fetch_array($run_query)){
                ?>
                <tr>
                    <td><?= $row['recomMedicines'];?></td>
                    <td><?= $row['medStocks'];?></td>
                    <td class="opts"> 
                        <a href="meds-edit.php?med=<?= $row['recomMedicines'];?>"><button><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>
                        <form action="../function/Afunction.php?med=<?= $row['recomMedicines'];?>" method="POST">
                            <button type="submit" name="submit6" class="del"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                        
                    </td>
                </tr>
                <?php
                        }
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