<?php
session_start();
    require '../config/dbconn.php';
    
    
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['patientPass']);

        $query = "SELECT * FROM admin";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);

        if($row['username']==$username && $row['password']==$password){
            $_SESSION['username'] = $username;
            header("Location: ../admin/homeA.php");
            exit(0);
        }else{
            echo "<script>alert('Incorrect username or password')</script>";
            echo "<script>document.location='../admin/a-login.php'</script>";
        }
    }


    if(isset($_POST['submit1'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $recovC = mysqli_real_escape_string($con, $_POST['recovC']);

        $query = "SELECT * FROM admin";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);

        if($row['username']==$username && $row['recoveryCode']==$recovC){
            $_SESSION['recovC'] = $recovC;
            header("Location: ../admin/fgotA.php");
            exit(0);
        }else{
            echo "<script>alert('Incorrect username or Recovery Code')</script>";
            echo "<script>document.location='../admin/recoverA.php'</script>";
        }
    }

    if(isset($_POST['submit2'])){
        $pass1 = mysqli_real_escape_string($con, $_POST['password1']);
        $pass2 = mysqli_real_escape_string($con, $_POST['password2']);

        if($pass1 == $pass2){
            $query = "UPDATE admin SET password = '$pass1'";
            $run_query = mysqli_query($con, $query);

            if($run_query){
                echo "<script>alert('Changes Successfully Saved!')</script>";
                unset($_SESSION['recovC']);
                session_destroy();
                echo "<script>document.location='../admin/a-login.php'</script>";
            }
        }else{
            echo "<script>alert('Password\'s not matched! ......Try Again!')</script>";
            echo "<script>document.location='../admin/fgotA.php'</script>";
        }
    }

    if(isset($_POST['submit3'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        date_default_timezone_set('Asia/Manila');
        $datetime = mysqli_real_escape_string($con,date("Y-m-d h:i:s"));
        $newlog = mysqli_real_escape_string($con, $_POST['newlog']);

        if($newlog==''){
            header("location: ../admin/newlog.php?id=$id");
            exit(0);
        }else{
            $query1 = "INSERT INTO phistory(patientID, logDateTime, medHist) VALUES ('$id', '$datetime', '$newlog')";
            $run_query1 = mysqli_query($con, $query1);

            if($run_query1){
                header("location: ../admin/viewP.php?id=$id");
                exit(0);
            }
        }
    }


    if(isset($_POST['submit4'])){
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $middleName = mysqli_real_escape_string($con, $_POST['middleName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $pAge = mysqli_real_escape_string($con, $_POST['pAge']);
        $pGender = mysqli_real_escape_string($con, $_POST['pGender']);
        $pBday = mysqli_real_escape_string($con, $_POST['pBday']);
        $pCpnumber = mysqli_real_escape_string($con, $_POST['pCpnumber']);
        $address1 = mysqli_real_escape_string($con, $_POST['address1']);
        $address2 = mysqli_real_escape_string($con, $_POST['address2']);
        $address3 = mysqli_real_escape_string($con, $_POST['address3']);
        $pAddress = $address1.", ".$address2.", ".$address3;
        $pEmail = mysqli_real_escape_string($con, $_POST['pEmail']);
        $pass1 = mysqli_real_escape_string($con, $_POST['password1']);
        $pass2 = mysqli_real_escape_string($con, $_POST['password2']);


        $query1 = "SELECT * FROM patients";
        $run_query1 = mysqli_query($con, $query1);
                if(mysqli_num_rows($run_query1)>0){
                    while($row1 = mysqli_fetch_array($run_query1)){
                        if($pCpnumber == $row1['pCpnumber']){
                            echo "<script>alert('Contact Number Already Exists! Please Try Another!')</script>";
                            echo "<script>document.location = '../admin/createA.php'</script>";
                            exit(0);
                        }else if($pCpnumber != $row1['pCpnumber']){
                            if($pEmail != '' && $pEmail == $row1['pEmail']){
                                echo "<script>alert('Email Account Already Exists! Please Try Another!')</script>";
                                echo "<script>document.location = '../admin/createA.php'</script>";
                                exit(0);
                            }
                            
                        }
                    }
                }

                if($pass1 == $pass2){
                    $query = "INSERT INTO `patients`(`patientId`, `firstName`, `middleName`, `lastName`, `pAge`, `pGender`, `pBday`, `pCpnumber`, `pAddress`, `pEmail`, `patientPass`) 
                    VALUES ('','$firstName','$middleName','$lastName','$pAge','$pGender','$pBday','$pCpnumber','$pAddress','$pEmail','$pass1')";
                    $run_query = mysqli_query($con, $query);
                
                    if($run_query){
                    header("location: ../admin/patientsA.php");
                    exit(0);
                    }
                }else{
                    echo "<script>alert('Password\'s not matched!')</script>";
                    echo "<script>document.location = '../admin/createA.php'</script>";
                }
                
    }


    if(isset($_POST['submit5'])){
        $medCond = mysqli_real_escape_string($con, $_POST['medCondition']);
        $recomMed = mysqli_real_escape_string($con, $_POST['recomMedicines']);
        $stocks = mysqli_real_escape_string($con, $_POST['medStocks']);

        $query = "INSERT INTO `medicine`(`medCondition`, `recomMedicines`, `medStocks`) 
        VALUES ('$medCond','$recomMed','$stocks')";
        $run_query = mysqli_query($con, $query);

            if($run_query){
                header("location: ../admin/meds.php");
                exit(0);
            }
    }

    if(isset($_POST['submit6'])){
        $med = mysqli_real_escape_string($con, $_GET['med']);

        $query = "DELETE FROM  medicine WHERE recomMedicines = '$med'";
        $run_query = mysqli_query($con, $query);

        if($run_query){
            header("location: ../admin/meds.php");
            exit(0);
        }

    }

    if(isset($_POST['submit7'])){
        $med = mysqli_real_escape_string($con, $_GET['med']);

        $medCond = mysqli_real_escape_string($con, $_POST['medCondition']);
        $recomMed = mysqli_real_escape_string($con, $_POST['recomMedicines']);
        $stocks = mysqli_real_escape_string($con, $_POST['medStocks']);

        $query = "UPDATE `medicine` SET `medCondition`='$medCond',`recomMedicines`='$recomMed',`medStocks`='$stocks'
        WHERE recomMedicines = '$med'";
        $run_query = mysqli_query($con, $query);

        if($run_query){
            header("location: ../admin/medDisplay.php?cond=$medCond");  
            exit(0);
        }

    }

    if(isset($_POST['submit8'])){
        $query = "DELETE FROM patients";
        $run_query = mysqli_query($con, $query);

        $query1 = "DELETE FROM phistory";
        $run_query1 = mysqli_query($con, $query1);

        if($run_query && $run_query1){
            header("location: ../admin/accounts.php");  
            exit(0);
        }

    }

    if(isset($_POST['submit9'])){
        $query = "DELETE FROM medicine";
        $run_query = mysqli_query($con, $query);

        if($run_query){
            header("location: ../admin/accounts.php");  
            exit(0);
        }

    }

    if(isset($_POST['submit10'])){
        $pass1 = mysqli_real_escape_string($con, $_POST['password1']);

        $query = "SELECT * FROM admin";
        $run_query = mysqli_query($con, $query);

        if(mysqli_num_rows($run_query)>0){
            while($row = mysqli_fetch_array($run_query)){
                if($row['password'] == $pass1){
                    $_SESSION['password'] = $pass1;
                    header("location: ../admin/edit-admin.php"); 
                    exit(0);
                }else{
                    echo "<script>alert('Incorrect password!')</script>";
                    echo "<script>document.location = '../admin/accounts.php'</script>";
                }
            }
        }
    }

    if(isset($_POST['submit11'])){
        $un =  mysqli_real_escape_string($con, $_GET['un']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $pass1 = mysqli_real_escape_string($con, $_POST['password1']);
        $pass2 = mysqli_real_escape_string($con, $_POST['password2']);

        if($pass1 == $pass2){
            $query = "UPDATE `admin` SET `username`='$username',`password`='$pass1' WHERE username = '$un'";
            $run_query = mysqli_query($con, $query);

            if($run_query){
                header("location: ../log/Alogout.php");  
                exit(0);
            }
        }else{
            echo "<script>alert('Passwords not matched!')</script>";
            echo "<script>document.location = '../admin/edit-admin.php'</script>";
        }
    }


    if(isset($_POST['submit12'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM patients WHERE patientId = '$id'";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);

        $patientId = $row['patientId'];
        $firstName = $row['firstName'];
        $middleName = $row['middleName'];
        $lastName =$row['lastName'];
        $pAge = $row['pAge'];
        $pGender = $row['pGender'];
        $pBday = $row['pBday'];
        $pCpnumber = $row['pCpnumber'];
        $pAddress = $row['pAddress'];
        $pEmail = $row['pEmail'];
        $patientPass = $row['patientPass'];

        $query1 = "INSERT INTO `archive`(`patientId`, `firstName`, `middleName`, `lastName`, `pAge`, `pGender`, `pBday`, `pCpnumber`, `pAddress`, `pEmail`, `patientPass`) 
        VALUES ('$patientId','$firstName','$middleName','$lastName','$pAge','$pGender','$pBday','$pCpnumber','$pAddress','$pEmail','$patientPass')";
        $run_query1 = mysqli_query($con, $query1);

        if($run_query1){
            $query2 = "DELETE FROM patients WHERE patientId = '$id'";
            $run_query2 = mysqli_query($con, $query2);
    
            header("Location: ../admin/accounts.php");
            exit(0);
        }

    }

    if(isset($_POST['submit13'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
    
            $query = "SELECT * FROM archive WHERE patientId = '$id'";
            $run_query = mysqli_query($con, $query);
            $row = mysqli_fetch_array($run_query);
    
            $patientId = $row['patientId'];
            $firstName = $row['firstName'];
            $middleName = $row['middleName'];
            $lastName =$row['lastName'];
            $pAge = $row['pAge'];
            $pGender = $row['pGender'];
            $pBday = $row['pBday'];
            $pCpnumber = $row['pCpnumber'];
            $pAddress = $row['pAddress'];
            $pEmail = $row['pEmail'];
            $patientPass = $row['patientPass'];
    
            $query2 = "INSERT INTO `patients`(`patientId`, `firstName`, `middleName`, `lastName`, `pAge`, `pGender`, `pBday`, `pCpnumber`, `pAddress`, `pEmail`, `patientPass`) 
            VALUES ('$patientId','$firstName','$middleName','$lastName','$pAge','$pGender','$pBday','$pCpnumber','$pAddress','$pEmail','$patientPass')";
            $run_query2 = mysqli_query($con, $query2);
    
            if($run_query2){
                $query1 = "DELETE FROM archive WHERE patientId = '$id'";
                $run_query1 = mysqli_query($con, $query1);
            
                header("Location: ../admin/accounts.php");
                exit(0);
            }
    }

    if(isset($_POST['submit14'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);

        $query = "DELETE FROM archive WHERE patientId = '$id'";
        $run_query = mysqli_query($con, $query);

        $query1 = "DELETE FROM phistory WHERE patientID = '$id'";
        $run_query1 = mysqli_query($con, $query1);

        if($run_query && $run_query1){
            header("Location: ../admin/accounts.php");
            exit(0);
        }

    }

    if(isset($_POST['submit15'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $username = $_SESSION['username'];
        $pass1 = mysqli_real_escape_string($con, $_POST['pass1']);
        $pass2 = mysqli_real_escape_string($con, $_POST['pass2']);

        $query = "SELECT * FROM admin WHERE username = '$username'";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);

        $pId = $row1['patientPass'];

        if($pass1 == $pass2){
            if($pass1 == $row['password']){
                $_SESSION['id'] = $id;
                header("Location: ../admin/seeAcc.php?id=$id");
                exit(0);
            }else{
                echo "<script>alert('Incorrect Password!')</script>";
                echo "<script>document.location = '../admin/confirmpassA.php?id=$id'</script>";
            }
        }else{
            echo "<script>alert('Passwords not matched!')</script>";
            echo "<script>document.location = '../admin/confirmpassA.php?id=$id'</script>";
        }
    }


?>