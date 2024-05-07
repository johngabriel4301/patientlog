<?php
session_start();
    require '../config/dbconn.php';
    
    if(isset($_POST['submit'])){
        $username  = mysqli_real_escape_string($con, $_POST['username']);
        $password  = mysqli_real_escape_string($con, $_POST['password']);

        $query = "SELECT * FROM patients";
        $run_query = mysqli_query($con, $query);

        if(mysqli_num_rows($run_query)>0){
            while($row = mysqli_fetch_array($run_query)){
                if($username == $row['pEmail'] && $password == $row['patientPass']){
                    $_SESSION['username1'] = $username;
                    $id = $row['patientId'];
                    header("Location: ../user/homeU.php?id=$id");
                    exit(0);
                }else if($username == $row['pCpnumber'] && $password == $row['patientPass']){
                    $_SESSION['username1'] = $username;
                    $id = $row['patientId'];
                    header("Location: ../user/homeU.php?id=$id");
                    exit(0);
                }else{
                    echo "<script>alert('Incorrect Username or Password!')</script>";
                    echo "<script>document.location='../user/u-login.php'</script>";
                }
            }
        }else{
            echo "<script>alert('Patient Accounts doesn't exist!')</script>";
            echo "<script>document.location='../user/u-login.php'</script>";
        }
    }

    if(isset($_POST['submit1'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $opassword = mysqli_real_escape_string($con, $_POST['opassword']);
        $npass = mysqli_real_escape_string($con, $_POST['npass']);
        $cpass = mysqli_real_escape_string($con, $_POST['cpass']);

        $query = "SELECT * FROM patients WHERE patientId = '$id'";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);

        if($opassword == $row['patientPass']){
            if($npass == $cpass){
                $query1 = "UPDATE patients SET patientPass = '$npass' WHERE patientId = '$id'";
                $run_query1 = mysqli_query($con, $query1);

                if($run_query1){
                    header("Location: ../log/Ulogout.php");
                    exit(0);
                }
            }else{
                echo "<script>alert('Passwords not matched!')</script>";
                echo "<script>document.location='../user/Ucpass.php?id=$id'</script>";
            }
        }else{
                echo "<script>alert('Incorrect Password!')</script>";
                echo "<script>document.location='../user/Ucpass.php?id=$id'</script>";
        }

    }  
    
    if(isset($_POST['submit2'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
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

        $query = "SELECT * FROM patients WHERE patientId != '$id'";
        $run_query = mysqli_query($con, $query);
        if(mysqli_num_rows($run_query)>0){
            while($row = mysqli_fetch_array($run_query)){
                if($pCpnumber == $row['pCpnumber']){
                    echo "<script>alert('Contact Number Already Exists! Please Try Another!')</script>";
                    echo "<script>document.location = '../user/UeditP.php?id=$id'</script>";
                }else if($pCpnumber != $row['pCpnumber']){
                    if($pEmail != '' && $pEmail == $row['pEmail']){
                        echo "<script>alert('Email Account Already Exists! Please Try Another!')</script>";
                        echo "<script>document.location = '../user/UeditP.php?id=$id'</script>";
                    }
                }
            }
        }
        
        
    if($pCpnumber == $row['pCpnumber'] && $pEmail == $row['pEmail']){
        $query2 = "UPDATE `patients` SET `firstName`='$firstName',`middleName`='$middleName',`lastName`='$lastName',`pAge`='$pAge',`pGender`='$pGender',
        `pBday`='$pBday',`pCpnumber`='$pCpnumber',`pAddress`='$pAddress',`pEmail`='$pEmail' WHERE patientId = '$id'";
        $run_query2 = mysqli_query($con, $query2);
        
        if($run_query2){
            echo "<script>alert('Information Changed Successfully!')</script>";
            echo "<script>document.location = '../user/profile.php?id=$id'</script>";
        }
    }else{
        $query2 = "UPDATE `patients` SET `firstName`='$firstName',`middleName`='$middleName',`lastName`='$lastName',`pAge`='$pAge',`pGender`='$pGender',
        `pBday`='$pBday',`pCpnumber`='$pCpnumber',`pAddress`='$pAddress',`pEmail`='$pEmail' WHERE patientId = '$id'";
        $run_query2 = mysqli_query($con, $query2);
        
        if($run_query2){
            echo "<script>alert('Information Changed Successfully!')</script>";
            echo "<script>document.location = '../user/profile.php?id=$id'</script>";
        }
    }     

    }

    if(isset($_POST['submit3'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);

        $query = "SELECT * FROM patients WHERE pEmail = '$username' or pCpnumber = '$username'";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);


            if($username == $row['pEmail'] || $username == $row['pCpnumber']){
                $id = $row['patientId'];
                $_SESSION['username2'] = $username;
                header("Location: ../user/fgotU.php?id=$id");
                exit(0);
            }else{
                echo "<script>alert('Email or Cellphone Number Not Found!...Try Again!')</script>";
                echo "<script>document.location = '../user/recoverU.php'</script>";
                exit(0);
            }            
    }

    if(isset($_POST['submit4'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $password1 = mysqli_real_escape_string($con, $_POST['password1']);
        $password2 = mysqli_real_escape_string($con, $_POST['password2']);

        if($password1 == $password2){
            $query = "UPDATE patients SET patientPass = '$password1' WHERE patientId = '$id'";
            $run_query = mysqli_query($con, $query);
            
            if($run_query){
                echo "<script>alert('Changes Saved!')</script>";
                echo "<script>document.location = '../user/u-login.php'</script>";
            }
        }else{
            echo "<script>alert('Passwords not matched!')</script>";
            echo "<script>document.location = '../user/fgotU.php?id=$id'</script>";
        }

    }
?>