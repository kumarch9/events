<?php include('logic.php'); ?>

<?php

$msg = "";
session_start();
if (isset($_SESSION['eventuser'])) {
    $user_name = $_SESSION['eventuser'];
    $msg = $user_name . "&#128512;";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Event</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./js/index.js"></script>
</head>



<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
        <?php include("log_sign.php"); ?>
    </div>
    <div id="containerhome">
        <div class="titlehome">
            welcome <?php echo (isset($msg)) ? $msg : ''; ?> in our services.
        </div>
        <div class="parashome">
            <span>
                <p>
                    <?php
                    $filename = './home_content.txt';
                    $doc = file_get_contents($filename);
                    echo ($doc);

                    ?>
                </p>
            </span>


        </div>
        <br><br>
        <div class="img_home">
            <img class="img_img_home" src="./img/home.jpg" />
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>


</html>