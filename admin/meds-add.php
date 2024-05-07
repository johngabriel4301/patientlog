<?php
    require '../config/dbconn.php';
    require '../log/Alogin.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
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
            <h1>Add a Medicine</h1>
        </div>

        <div class="login solo">
            <a href="javascript:window.history.back()"><button class="btn"><i class="fa-solid fa-circle-left"></i> Back</button></a>
        </div>
   </nav> 
    <div class="container3">
        <form action="../function/Afunction.php" method="POST" class="form3">
            <div class="txt1">
                <h2>Fill the text fields below</h2>
            </div>
            <div class="inp">
                <label for="medCond">Medical Condition</label>
                <input type="text" name="medCondition" id="" required>
            </div>
            
            <div class="inp">
                <label for="med">Medicine</label>
                <input type="text" name="recomMedicines" id="" required>
            </div>

            <div class="inp">
                <label for="stock">Stock/s</label>
                <input type="number" name="medStocks" id="">
            </div>

            <div class="btn">
                <button type="submit" name="submit5" class="submit">Submit</button>
            </div>
        </form>
    </div>
   
</body>
</html>