<?php
include("connection.php");
include("logic.php");
?>
<?php
$tblvisitor = "visitors";
$counterRed = '';

$counterRed = todayCount($tblvisitor);
$msg = "Login must to access.";
session_start();
if (isset($_SESSION['eventuser'])) {
    $sesname = $_SESSION['eventuser'];
} else {
    alertbox($msg);
    echo "<script>setTimeout(\"location.href = './home.php';\",20);</script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>
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

    <div id="div_frm" class="container" onload="timeUpdate();">
        <div class="title">
            Registration Form of Visitor
        </div>
        <div>
            <h6>Badge Print Fileds:</h6>
            <input type="checkbox" id="chkName" checked onchange="ckNamePrint()" /><label>Name</label>
            <input type="checkbox" id="chkDes" checked onchange="ckDesPrint()" /><label>Designation</label>
            <input type="checkbox" id="chkComp" checked onchange="ckCompPrint()" /><label>Company</label>
            <input type="checkbox" id="chkBar" checked onchange="ckBarcodePrint()" /><label>Barcode</label>
        </div>
        <div id="frmCounter" class="output_field">
            <h4>Counter :<?php echo (isset($counterRed)) ? $counterRed : "0"; ?></h4>
        </div>


        <div class="input_field">
            <label class="non-printable">System Name</label>
            <input type="checkbox" id="chksys" onchange="checkSysEdit();" /> <label>Edit</label>
            <input type="text" class="input" readonly name="sysname" id="sysname" placeholder="system name" readonly />
        </div>
        <div class="input_field" id="date_time">
            <label class="non-printable">Event Date</label>
            <input type="datetime-local" class="input" id="today_date" name="today_date" value="<?php date_default_timezone_set("Asia/Kolkata");
                                                                                                echo date('Y-m-d\TH:i'); ?>" />
        </div>
        <div class="input_field">
            <label class="non-printable" for="visitor_type">Choose a type</label>
            <div class="selectbox">
                <select id="visitor_type" name="visitor_type" required=" true">
                    <option value="">Select Type</option>
                    <option value="Visitor">Visitor</option>
                    <option value="Delegate">Delegate</option>
                    <option value="Exhibitor">Exhibitor</option>
                    <option value="Invitee">Invitee</option>
                    <option value="Organiser">Organiser</option>
                </select>
            </div>
        </div>
        <div id="refreshfrm">
            <div class="input_field" id="divName">
                <label>Name</label>
                <input type="text" id="name" name="name" class="input" placeholder="write the name" required="true">
            </div>
            <div class="input_field" id="divDes">
                <label>Designation</label>
                <input type="text" id="desg" name="desg" class="input" placeholder="write the designation">
            </div>
            <div class="input_field" id="divComp">
                <label>Company Name</label>
                <input type="text" id="cname" name="cname" class="input" placeholder="write the company name">
            </div>
        </div>
        <input type="hidden" name="hidbar" />
        <div class="input_field" id="div_btn_frm">
            <input type="button" class="btn" name="form_save" onclick="saveprint()" id="form_save" value="Save_Print">
            <input type="button" class="btn" name="form_reset" onclick="frmReset()" value="Reset">

        </div>


    </div>



</body>
<div id="frmprint" class="frmprint">
    <div id="divImg" class="divImg">
        <p><img id="prtbarcode" class="imgBCode"></p>
    </div>
    <div id="prtname" class="name">
        <p>name</p>
    </div>
    <div id="prtdes" class="des">
        <p>des</p>
    </div>
    <div id="prtcomp" class="comp">
        <p>comp</p>
    </div>
</div>
<?php include("footer.php"); ?>

</html>