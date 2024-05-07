<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
            <h1>Create a New Account</h1>
        </div>
   </nav> 

   <form action="../function/Afunction.php" method="POST" class="form2">
        <div class="inp">
            <div class="inps">
                <label for="name">First Name</label>
                <input type="text" name="firstName" required class="inp1">
            </div>

            <div class="inps">
                <label for="name">Middle Name</label>
                <input type="text" name="middleName" class="inp1">
            </div>


            <div class="inps">
                <label for="name">Last Name</label>
                <input type="text" name="lastName" required class="inp1">
            </div>
        </div>

        <div class="inp">
            <div class="inps">
                <label for="age">Age</label>
                <input type="number" name="pAge" required class="inp2">
            </div>

            <div class="inps">
                <label for="gender">Gender</label>
                <div class="gends">
                    <input type="radio" name="pGender" required value="Male" class="rdio1"> Male
                    <input type="radio" name="pGender" required value="Female" class="rdio"> Female
                </div> 
            </div>

            <div class="inps">
                <label for="bday">Birthday</label>
                <input type="date" name="pBday" required class="inp2">
            </div>

            <div class="inps">
                <label for="cpnum">Contact Number</label>
                <input type="tel" name="pCpnumber" required  class="inp3">
            </div>
        </div>

        <div class="inp add">
            <div class="inps">
                <label for="Address">Address</label>
            </div>
            <div class="adds">
                    <input type="text" name="address1" placeholder="Barangay" class="inp1" required>
                    <input type="text" name="address2" placeholder="Municipality" class="inp1" required>
                    <input type="text" name="address3" placeholder="Province" class="inp1"required>
            </div>
        </div>

        <div class="inp">
            <div class="inps">
                <label for="email">Email</label>
                <input type="email" name="pEmail" class="inp4">
            </div>
        </div>

        <div class="bkgpop">
            <div class="form-pop">
                <div class="xmark"><i class="fa-solid fa-circle-xmark"></i></div>
                <div class="txt1">
                    <h2>Add Password</h2>
                </div>
                <div class="inp">
                    <label for="password">Enter Password</label>
                    <input type="password" name="password1" id="" required>
                </div>
                <div class="inp">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password2" id="" required>
                </div>
                <div class="btn1">
                    <button type="submit" name="submit4" class="submit">Submit</button>
                </div>
            </div>
        </div>
   </form>

   <div class="btns">
            <a href="patientsA.php"><button class="cancel"><i class="fa-regular fa-circle-xmark"></i> Cancel</button></a>
            <button class="confirm"><i class="fa-regular fa-circle-check"></i> Confirm</button>
    </div> 


   <script>
        const open = document.querySelector('.confirm');
        const close = document.querySelector('.fa-circle-xmark');
        const pop = document.querySelector('.bkgpop');

        open.onclick = () => {
            pop.classList.add('active');
        }


        close.onclick = () => {
            pop.classList.remove('active');
        }
   </script>
</body>
</html>