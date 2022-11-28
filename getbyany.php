<?php require('connection.php'); ?>

<?php
session_start();
if (isset($_SESSION['eventuser'])) {
    $sesname = ucwords($_SESSION['eventuser']);
} else {
    return "";
}

$barcodeGet  = $_POST['barID'];
$scanareaGet  = ucwords($_POST['scanArea']);
date_default_timezone_set("Asia/Kolkata");
$dt =  date('Y-m-d\TH:i');

function getfill($findVal)
{
    global $dbConn, $dt, $barcodeGet, $sesname, $scanareaGet;

    $queryFind = "SELECT `date`,`type`,`name`,`designation`,`company` FROM `visitors` WHERE `barcode` = '$findVal'";
    $querySend = "INSERT INTO `visitplace` (`barcode`,`date`, `scanby`,`scanarea`) VALUES ('$barcodeGet', '$dt', '$sesname', '$scanareaGet')";
    $result = mysqli_query($dbConn, $queryFind) or die("query failed!");


    if (mysqli_num_rows($result) > 0) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $senddat = mysqli_query($dbConn, $querySend) or die("query failed!");
        if ($senddat) {
            $dbConn->close();
            return json_encode($output);
        } else {
            $dbConn->close();
            return json_encode("");
        }
    }
    $dbConn->close();
    return json_encode("");
}


$filldata = getfill($barcodeGet);


echo $filldata;

?>