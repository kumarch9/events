<?php
include("connection.php");
include("logic.php");
?>


<?php
$msg = "Already logedin, Plase logout first!:";
session_start();
if (isset($_SESSION['eventuser'])) {
    $sesname = $_SESSION['eventuser'];
    alertbox($msg . $sesname);
    echo "<script>setTimeout(\"location.href = './home.php';\",500);</script>";
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./jquery/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="./barcode/JsBarcode.all.min.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
    </div>
    <?php include("back.php"); ?>
    <div id="div_frm" class="container_login">
        <form action="#" method="POST">
            <div class="title_login">
                User Login
            </div>
            <br><br>
            <div class="form_login">
                <div class="input_field_login">
                    <label>User Name</label>
                    <input type="text" id="username" name="username" class="input_login" placeholder="Enter user name" required="true">
                </div>
                <div class="input_field_login">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="input_login" placeholder="Enter password" required="true">
                </div>
                <div class="input_field_login" id="div_btlogin_frm">
                    <input type="submit" class="btn_login" name="form_login" value="Login">
                    <input type="reset" class="btn_login" name="form_logcancel" value="Reset">
                </div>
            </div>
        </form>
    </div>

</body>
<?php include("footer.php"); ?>

</html>

<?php
$msg = "login succeed";
if (isset($_POST['form_login'])) {
    $uname = $_POST['username'];
    $upsw = $_POST['password'];


    $query = "SELECT `name`,`password` from users WHERE name='$uname'";
    $data = mysqli_query($dbConn, $query);

    if ($data->num_rows > 0) {

        while ($rowdat = $data->fetch_assoc()) {
            $password = $rowdat['password'];
        }
        if ($upsw == $password) {
            $dbConn->close();
            //setcookie('eventuser', $uname, time() + 5 * 60);   //inseconds
            session_start();
            $_SESSION['eventuser'] = $uname;
            alertbox($msg);
            echo "<script>setTimeout(\"location.href = './home.php';\",50);</script>";
        } else {
            $dbConn->close();
            $msg = "password incorrect!";
            alertbox($msg);
        }
    } else {
        $dbConn->close();
        $msg = "user or password invalid!";
        alertbox($msg);
    }
}
?>