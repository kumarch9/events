<?php
include("connection.php");

if (isset($_REQUEST['sub'])) {
    $a = $_REQUEST['username'];
    $b = $_REQUEST['password'];

    $res = mysqli_query($cser, "select* from users where uname='$a'and upassword='$b'");
    $result = mysqli_fetch_array($res);
    if ($result) {
        if (isset($_REQUEST["remember"]) && $_REQUEST["remember"] == 1)
            setcookie("login", "1", time() + 60); // second on page time 
        else
            setcookie("login", "1");
        header("location:index.php");
    } else {
        header("location:login.php?err=1");
    }
}
