<?php
session_start();
if(!$_SESSION['username1']){
    echo "<script>document.location = '../user/u-login.php'</script>";
}
?>