<?php
include("connection.php");
include("logic.php");
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup_User</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./jquery/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>

</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
    </div>
    <?php include("back.php"); ?>
    <div id="container_signup">

        <form action="#" method="POST">
            <div class="title_signup">
                <h3>Signup User</h3>


            </div>
            <br><br>
            <div class="form_signup">
                <div class="input_field_signup">
                    <label class="non-printable">Name</label>
                    <input type="text" id="name_signup" name="name_signup" class="input_signup" placeholder="write the name" required="true">
                </div>
                <div class="input_field_signup">
                    <label class="non-printable">Email</label>
                    <input type="email" id="email_signup" name="email_signup" class="input_signup" placeholder="write the email" required="true">
                </div>
                <div class="input_field_signup">
                    <label class="non-printable">Password</label>
                    <input type="text" id="psw_sign" name="psw_signup" class="input_signup" placeholder="type the password" title="Must contain at least  4 or more any characters  or number" minlength="4" required=" true">
                </div>

                <div class="input_field_signup" id="div_btn_frm">
                    <input type="submit" class="btn_signup" id="form_save_signup" name="form_save_signup" value="Save">
                    <input type="reset" class="btn_signup" name="form_cancel_signup" value="Reset">

                </div>
            </div>
        </form>

    </div>

</body>
<?php include("footer.php"); ?>

</html>


<?php
$msg = "signup succeed";
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST['form_save_signup'])) {
    $name = $_POST['name_signup'];
    $email = $_POST['email_signup'];
    $psw = $_POST['psw_signup'];
    $todayDate = date('Y-m-d\TH:i');


    $query = "INSERT INTO users (`name`, `email`, `password`, `date`) VALUES ('$name','$email','$psw','$todayDate')";
    $data = mysqli_query($dbConn, $query);
    if ($data) {
        echo "data saved!";
    } else {
        echo "data not saved!";
    }
    $dbConn->close();


    alertbox($msg);
    echo "<script>setTimeout(\"location.href = './home.php';\",600);</script>";
}

?>