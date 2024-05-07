<?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();

    echo "<script>document.location = '../admin/a-login.php'</script>";
?>