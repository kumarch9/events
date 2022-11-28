<?php
//session_start();
if (!isset($_SESSION['eventuser'])) {
    echo "<div style='display:flex;right: 0;margin-left: auto;'><a href='/event/signup.php'><input style='padding: 1px 6px;border-radius: 5px;border: 2px solid #757c00 ; background-color:#04f338;font-size: 15px;cursor: pointer;' type='submit'  value='Signup'></a>&nbsp;<a href='/event/Login.php'><input style='padding: 1px 6px;border-radius: 5px;border: 2px solid #757c00 ; background-color:#04f338;font-size: 15px;cursor: pointer;' type='submit'  value='login'></a></div>";
} else{
    echo "<div style='display:flex;right: 0;margin-left: auto;'><a href='/event/logout.php'><input style='padding: 1px 6px;border-radius: 5px;border: 2px solid #F39C12 ; background-color:#F7DC6F;font-size: 15px;cursor: pointer;' type='submit' value='Logout'></a></div>";
}


?>