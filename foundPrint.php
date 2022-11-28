<?php
include('connection.php');
include('logic.php');
?>

<?php

$gotID =  $_GET['id'];
//echo $gotID;
if (isset($gotID)) {
    $query = "SELECT `barcode`, `name`,`designation`,`company` FROM `visitors` WHERE id = '$gotID'";
    $getData = mysqli_query($dbConn, $query);

    while ($rowInfo = $getData->fetch_assoc()) {
        $FoundName = $rowInfo['name'];
        $FoundDes = $rowInfo['designation'];
        $FoundComp = $rowInfo['company'];
        $FoundBCid = $rowInfo['barcode'];
        //print_r($rowInfo);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Info Printing...</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./jquery/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="./printlib/print.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
    <script type="text/javascript" src="./barcode/JsBarcode.all.min.js"></script>

</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
        <?php include("log_sign.php"); ?>
    </div>
    <div class="container_found_print">
        <div class="chk_found_print">
            <span>Badge Print Fileds:</span>
            <input type="checkbox" id="chkNameFound" checked onchange="ckNamePrintFound()" /><label>Name</label>
            <input type="checkbox" id="chkDesFound" checked onchange="ckDesPrintFound()" /><label>Designation</label>
            <input type="checkbox" id="chkCompFound" checked onchange="ckCompPrintFound()" /><label>Company</label>
            <input type="checkbox" id="chkBarFound" checked onchange="ckBarcodePrintFound()" /><label>Barcode</label>
        </div>
        <div id="divPrintFound" class="frmprint">
            <div id="prtbcodeOnly" class="divImg">
                <p><img id="foundImgBCode" class="imgBCode"></p>
            </div>

            <div id="prtnameOnly" class="name">
                <p><?php echo (isset($FoundName)) ? $FoundName : ""; ?></p>
            </div>

            <div id="prtdesOnly" class="des">
                <p><?php echo (isset($FoundDes)) ? $FoundDes : ""; ?></p>
            </div>

            <div id="prtcompOnly" class="comp">
                <p><?php echo (isset($FoundComp)) ? $FoundComp : ""; ?></p>
            </div>

            <input type="hidden" id="bcNumber" value="<?php echo (isset($FoundBCid)) ? $FoundBCid : ""; ?>">

        </div>
        <div class="btn_found_print">
            <input type="button" id="btnFoundPrint" class="btn" value="Print" onclick="PrintOnly();">
            <input type="button" id="btnFoundCancel" class="btn" onclick="closeOnly();" name="btnFoundCancel" value="Cancel">

        </div>
    </div>
</body>

<?php include("footer.php"); ?>

</html>