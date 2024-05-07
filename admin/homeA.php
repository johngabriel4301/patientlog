<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

    $query = "SELECT * FROM patients";
    $run_query = mysqli_query($con, $query);
    $num = mysqli_num_rows($run_query);
 
    $query1 = "SELECT * FROM medicine";
    $run_query1 = mysqli_query($con, $query1);
    $num1 = mysqli_num_rows($run_query1);

    $query2 = "SELECT * FROM phistory";
    $run_query2 = mysqli_query($con, $query2);
    $num2 = mysqli_num_rows($run_query2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard- Admin</title>
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
                <a href="homeA.php"><li class="target"><i class="fa-solid fa-house-chimney"></i><span>Dashboard</span></li></a>
                <a href="patientsA.php"><li><i class="fa-solid fa-circle-user"></i><span>Patients</span></li></a>
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
            <h1>Dashboard</h1>
        </div>
        
        <a href="../index.php"><img src="../imgs/Logo.png" alt=""></a>
    </div>

    <div class="container1">
        <div class="boxes">
            <div class="box">
                <div class="leftside">
                    <h2><?php echo $num?></h2>
                    <h5>Patients</h5>
                </div>
                <div class="rightside">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <div class="box">
                <div class="leftside">
                    <h2><?php echo $num1?></h2>
                    <h5>Medicines</h5>
                </div>
                <div class="rightside">
                    <i class="fa-solid fa-pills"></i>
                </div>
            </div>

            <div class="box">
                <div class="leftside">
                    <h2><?php echo $num2?></h2>
                    <h5>Logs</h5>
                </div>
                <div class="rightside">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
            </div>
        </div>
        <div class="tables">
            <div class="t-box1">
                <table class="table1">
                    <thead>
                        <tr>
                            <th colspan="3" class="hdr">
                                Recent Patients
                            </th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Date & Time</th>
                            <th>Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            date_default_timezone_set('Asia/Manila');
                            $day_now = date('d');
                            $day_yest = $day_now - 1;

                            $query4 = "SELECT * FROM phistory WHERE DAY(logDateTime) = '$day_yest' Or DAY(logDateTime) = '$day_now' ORDER BY logDateTime ASC";
                            $run_query4 = mysqli_query($con, $query4);


                            if(mysqli_num_rows($run_query4)>0){
                                while($row1 = mysqli_fetch_array($run_query4)){
                                    $id = $row1['patientID'];
                                    $query5 = "SELECT * FROM patients WHERE patientId = '$id'";
                                    $run_query5 = mysqli_query($con, $query5);

                                    $row2 = mysqli_fetch_array($run_query5);
                                    
                                    $date = $row1['logDateTime'];
                                    $dateTime = new DateTime($date);
                                    $formattedDateTime = $dateTime->format('m-d-Y H:i'); 
                                    

                        ?>
                        <tr>
                            <td><?php
                                if($row2['middleName'] != ''){
                                    $mname = $row2['middleName'];
                                    echo " ".$row2['lastName'].", ".$row2['firstName']." "."$mname[0].";
                                }else{
                                    echo " ".$row2['lastName'].", ".$row2['firstName'];
                                }
                            ?></td>
                            <td><?php echo $formattedDateTime;?></td>
                            <td><a href="viewP.php?id=<?= $id?>"><i class="fa-regular fa-eye"></i>View</a></td>
                        </tr>
                    <?php
                                }
                            }else{
                                echo "<td colspan='3' style = 'text-align:center;'>No Recent Logs</td>";
                            }
                    ?>
                    </tbody>
                </table>
            </div>
            

            <div class="t-box2">
                <table class="table2">
                    <thead>
                        <tr>
                            <th class="hdr meds">
                                Medical Conditions Covered
                            </th>
                        </tr>
                        <tr> 
                            <th>Type of Condition</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $run_query3 = mysqli_query($con, "SELECT DISTINCT medCondition FROM medicine");

                        if(mysqli_num_rows($run_query3)>0){
                            while($row = mysqli_fetch_array($run_query3)){


                    ?>
                        <tr>
                            <td><?= $row['medCondition'];?></td>
                        </tr>

                        <?php
                            }
                        }else{
                            echo "<td>No Conditions Found!</td>";
                        }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</body>
</html>