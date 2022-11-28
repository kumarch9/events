<?php include('logic.php'); ?>

<?php

$msg = "Welcome ";
session_start();
if (isset($_SESSION['eventuser'])) {
    $user_name = $_SESSION['eventuser'];
    alertbox($msg . $user_name);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Us</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css">

    
    <script type="text/javascript" src="./js/index.js"></script>

</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
        <?php include("log_sign.php"); ?>
    </div>
    <div id="container_contact">
        <h3>
            You may Call or Whatsapp for contact us.
        </h3>
        <div>
            <p>
                Team organiser is Mr. Manish Kumar and call at +91-8285000389
            </p>
            <p>
                Email- Manish@hom.com
            </p>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>