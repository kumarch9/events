<?php
include('connection.php');
include('logic.php');
?>

<?php

$tblvisit = "visitplace";
$Tvisit = '';
$Tvisit = todayCount($tblvisit);
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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./jquery/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
    <title>Search-Info</title>
</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
        <?php include("log_sign.php"); ?>
    </div>

    <div id="div_find" class="container_find">
        <div class="title_find">
            Search Information of Visitor
        </div>
        <div class="input_field">
            <label class="non-printable">System Name</label>
            <input type="checkbox" id="chksysname" onchange="ckname()" /> <label>Edit :</label>
            <input type="text" class="input_field_input" name="sysnamesearch" id="sysnamesearch" value="" placeholder="system name" readonly />
        </div>
        <div class="divBanSelect">
            <div class="divSelectBox" onclick="showBanList();">
                <select>
                    <option>Select Ban Types</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="BanChBox">
                <label for="banVisitor"><input type="checkbox" id="banVisitor" value="Visitor" />Visitor</label>
                <label for="oneDelegate"><input type="checkbox" id="banDelegate" value="Delegate" />Delegate</label>
                <label for="oneExhibitor"><input type="checkbox" id="banExhibitor" value="Exhibitor" />Exhibitor</label>
                <label for="oneInvitee"><input type="checkbox" id="banInvitee" value="Invitee" />Invitee</label>
                <label for="oneOrganiser"><input type="checkbox" id="banOrganiser" value="Organiser" />Organiser</label>
            </div>
        </div>
        <div id="refreshSearch">
            <div class="input_field">
                <label>B-ID :</label>
                <input class="input_field_input" type="text" onclick="getbardata();" name="getBarcode" id="getBarcode" placeholder="enter B-ID" />
            </div>
            <div class="input_field">
                <h4>Visit Counter :<?php echo (isset($Tvisit)) ? $Tvisit : "no scan yet!"; ?></h4>
            </div>

            <div class="find" id="fill_data">
                <div class="output_field">
                    <label>Status : <span id="status"></span></label>
                </div>

                <div class="output_field">
                    <label>Redg. Date : <span id="spDt"></span></label>
                </div>
                <div class="output_field">
                    <label>Type : <span id="spType"></span></label>
                </div>
                <div class="output_field">
                    <label>Name : <span id="spName"></span></label>
                </div>
                <div class="output_field">
                    <label>Designation : <span id="spDes"></span></label>
                </div>
                <div class="output_field">
                    <label>Company Name : <span id="spCom"></span></label>
                </div>
            </div>
        </div>


    </div>

</body>
<?php include("footer.php"); ?>
<script type="text/javascript">

</script>

</html>