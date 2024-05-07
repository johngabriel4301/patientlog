<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Features</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/x-icon" href="imgs/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <nav>
        <div class="links">
            <li class="icon-bars"><i class="fa-solid fa-bars" onclick="sideNav()"></i></li>
            <a href="index.php"><img src="imgs/Logo.png" alt=""></a>

            <ul class="desktop">
                <a href="overview.php"><li>OVERVIEW</li></a>
                <a href="objectives.php"><li>OBJECTIVES</li></a>
                <a href="keyfeatures.php"><li class="keyf">KEY FEATURES</li></a>
            </ul>
            <ul class="s-size">
                <div class="log-i">
                    <li class="icon-x"><i class="fa-solid fa-xmark" onclick="sideNav1()"></i></li>
                </div>
                <a href="overview.php"><li>OVERVIEW</li></a>
                <a href="objectives.php"><li>OBJECTIVES</li></a>
                <a href="keyfeatures.php"><li>KEY FEATURES</li></a>
    
                <div class="login side">
                    <a href="user/u-login.php"><button class="log">Login</button></a>
                </div>
            </ul>
        </div>
        
        <div class="login">
            <a href="user/u-login.php"><button class="log">Login</button></a>
        </div>

        
   </nav> 
   <div class="container4">
    <div class="content">
        <div class="txt">
            <h1>KEY FEATURES</h1>
            <h3>MEDICINE INVENTORY</h3>
            <h5>
                Our medicine inventory system ensures seamless <br>
                tracking and management of pharmaceutical <br>
                stocks, optimizing availability and minimizing <br> 
                wastage.
            </h5>
            <h3>PATIENT RECORD</h3>
            <h5>
                Our patient record system provides <br>
                comprehensive and secure storage of medical <br>
                information, ensuring accurate and efficient <br>
                management of patient records
            </h5>
        </div>
    </div>
    <div class="img1">
        <img src="imgs/Key_feature.png" alt="">
    </div>
    </div>

    <div class="line">-</div>
    <div class="footer">
        <h5>Contact Us | +639123456789</h5>
        <h5>© 2024 BSIT-2D Group 6. All rights reserved.</h5>
    </div>

    <script>
        const sideNav = () =>{
            const slide = document. querySelector('.s-size');
    
            slide.style.left = "0";  
        }
    
        const sideNav1 = () =>{
            const slide = document. querySelector('.s-size');
    
            slide.style.left = "-16rem";  
        }
    
    </script>
</body>
</html>