<?php
    session_start();
    unset($_SESSION['username1']);
    session_destroy();

    echo "<script>document.location = '../user/u-login.php'</script>";
?>