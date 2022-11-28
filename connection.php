<?php

use function PHPSTORM_META\type;

//error_reporting(0);
$servername = "localhost:3307";
$username = "root";
$password = "12345";
$dbname = "events";

$dbConn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed!");


function getID($tblname)
{
    global $dbConn;
    global  $vID;
    $query = "SELECT `id` FROM `$tblname` ORDER BY id DESC LIMIT 1";
    $data = mysqli_query($dbConn, $query) or die("query failed!");
    $total = mysqli_num_rows($data);
    if ($total == 0) {
        return '';
    } else {
        $lastId = $data->fetch_assoc();
        //echo $lastId['name'];
        return $vID = $lastId['id'];
    }
    $dbConn->close();
}

function todayCount($tblname)
{
    global $dbConn;
    $countTotal = '';
    $nowDt = date('Y-m-d');
    $query = "SELECT COUNT('id') AS cout FROM `$tblname` WHERE `date` LIKE '$nowDt%'";
    $data = mysqli_query($dbConn, $query) or die("error in query!");
    if ($data) {
        while ($row = $data->fetch_array()) {
            $countTotal = $row['cout'];
        }
        return $countTotal;
    } else {
        return 0;
    }
    $dbConn->close();
}


function PrintDefaultPage()
{
    global $dbConn;
    $queryDef = "SELECT * FROM `printpagesize` AS ps JOIN `printcred` AS pc on ps.type = pc.type JOIN  `printbarcode` AS pd on ps.type= pd.type where ps.type = 'default'";
    $data = mysqli_query($dbConn, $queryDef) or die("error in query!");
   // $dbConn->close();
    return $data;
    
}

function PrintManualPage()
{
    global $dbConn;
    $query = "SELECT * FROM `printpagesize` AS ps JOIN `printcred` AS pc on ps.type = pc.type JOIN  `printbarcode` AS pd on ps.type= pd.type where ps.type = 'manual'";
    $data = mysqli_query($dbConn, $query) or die("error in query!");
    //$dbConn->close();
    return $data;
   
}

function insertData(string $lastID, string $name, string $designation, string $companyName, string $newDate, string $visitorType)
{
    global $dbConn;
    //$nowDate = date("Y-m-d", $newDate);
    $char = substr($visitorType, 0, 3);
    $newbarcode = $char . "000" . $lastID;

    $vbarcode = $_POST[$newbarcode];
    $vname = $_POST[$name];
    $vdesg = $_POST[$designation];
    $vcname = $_POST[$companyName];
    $vdate = $_POST[$newDate];
    $vtype = $_POST[$visitorType];

    $query = "INSERT INTO visitors ('barcode',`name`, `designation`, `company`, `date`, `type`) VALUES ('$vbarcode','$vname','$vdesg','$vcname','$vdate','$vtype')";
    $data = mysqli_query($dbConn, $query);
    if ($data) {
        echo "data saved!";
        return $vbarcode;
    } else {
        echo "data not saved!";
        return "";
    }
    $dbConn->close();
}
