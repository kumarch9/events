<?php include('logic.php'); ?>
<?php

if (!isset($_SESSION)) {
    session_start();
    $_SESSION = array();
    session_unset();
    
    session_destroy();

    echo "<script>setTimeout(\"location.href = './home.php';\",1000);</script>";
} else {
    echo "<script>setTimeout(\"location.href = './home.php';\",1000);</script>";
}


?>