<?php
    session_start();
    if(!$_SESSION['username']){
        echo "<script>document.location = '../admin/a-login.php'</script>";
    }

?>