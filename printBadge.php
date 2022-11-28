<?php include('logic.php'); ?>
<?php
$printData = $_REQUEST;
print_r(json_encode($printData));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>save form</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./jquery/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
    <script type="text/javascript" src="./barcode/JsBarcode.all.min.js"></script>
    <script type="text/javascript" src="./printlib/print.min.js"></script>

</head>

<body>
    <div id="frmprint" class="frmprint">
        <span type="text" id="prtname" class="noprint"><?php echo (isset($vname)) ? $vname : ""; ?></span><br>
        <span type="text" id="prtdes" class="noprint"><?php echo (isset($vdesg)) ? $vdesg : ""; ?></span><br>
        <span type="text" id="prtcomp" class="noprint"><?php echo (isset($vcname)) ? $vcname : ""; ?></span><br>
        <div id="prtBarDiv">
            <img style="image-resolution:  from-image 300dpi; height:50px; width:300px; " id="prtbarcode" /><br>
        </div>


    </div>
</body>

</html>