<?php


include('connection.php');
include('logic.php');
?>

<?php

session_start();
if (isset($_SESSION['eventuser'])) {
    $sesname = ucwords($_SESSION['eventuser']);
} else {
    echo "session is not available";
}



$tableName = "visitors";
$LastSaveID = getID($tableName);
$getVinfo = $_POST;

//print_r(ucwords($getVinfo['name']));
$vname = ucwords($getVinfo['name']);
$vdesg = ucwords($getVinfo['desg']);
$vcname = ucwords($getVinfo['cname']);
$vdate = $getVinfo['today_date'];
$vtype = $getVinfo['visitor_type'];
$vsysname = $getVinfo['sysname'];
$vzero = "00";
$vchar = substr($vtype, 0, 2);
$newbarcode = $vchar . $vzero . $LastSaveID + 1;
$barArray = array("barcode" => $newbarcode);
function saveForm()
{
    //name=pkcha&desg=co&cname=&today_date=29-10-2022 22:20&visitor_type=delegate&sysname=yahma
    global $getVinfo;
    global $dbConn, $newbarcode, $vname, $vdesg, $vcname, $vdate, $vtype, $sesname, $vsysname, $barArray;
    $query = "INSERT INTO visitors (`barcode`, `name`, `designation`, `company`, `date`, `type`, `creator_name`,`systemname`) VALUES ('$newbarcode', '$vname', '$vdesg', '$vcname', '$vdate', '$vtype', '$sesname','$vsysname')";
    $data = mysqli_query($dbConn, $query);
    if ($data) {

        return $newbarcode;
    } else {

        return 0;
    }
    $dbConn->close();
}

$saveInfo = saveForm();

echo   $saveInfo;


?>

