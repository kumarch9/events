<?php
require("connection.php");
require("logic.php");
?>

<?php
$msg = "Login must to access.";
session_start();
if (isset($_SESSION['eventuser'])) {
    $sesname = $_SESSION['eventuser'];
} else {
    alertbox($msg);
    echo "<script>setTimeout(\"location.href = './home.php';\",20);</script>";
}
//empty declared vars
$pageWidth = '';
$pageHeight = '';

$fontSizeN = '';
$colorN = '';
$marginTopN = '';
$marginLeftN = '';
$textTransformN = '';
$textAlignN = '';

$fontSizeD = '';
$colorD = '';
$marginTopD = '';
$marginLeftD = '';
$textTransformD = '';
$textAlignD = '';

$fontSizeC = '';
$colorC = '';
$marginTopC = '';
$marginLeftC = '';
$textTransformC = '';
$textAlignC = '';

$marginTopB = '';
$marginLeftB = '';
$textAlignB = '';
$borderB = '';


//manual page print setting data find and bind in form setting on load. 
findManulPage();

function findManulPage()
{
    global  $pageWidth, $pageHeight, $fontSizeN, $colorN, $marginTopN, $marginLeftN, $textTransformN, $textAlignN;
    global $fontSizeD, $colorD,  $marginTopD, $marginLeftD,  $textTransformD, $textAlignD;
    global $fontSizeC, $colorC, $marginTopC, $marginLeftC, $textTransformC, $textAlignC;
    global $marginTopB, $marginLeftB, $textAlignB, $borderB;

    //get manual value for page print setting  bind in variables.
    $resultPG =  PrintManualPage();

    if ($resultPG) {
        while ($row = mysqli_fetch_assoc($resultPG)) {
            $pageWidth = $row['pagewidth'];
            $pageHeight = $row['pageheight'];

            $fontSizeN = $row['fontsizen'];
            $colorN = $row['colorn'];
            $marginTopN = $row['margintopn'];
            $marginLeftN = $row['marginleftn'];
            $textTransformN = $row['texttransformn'];
            $textAlignN = $row['textalignn'];

            $fontSizeD = $row['fontsized'];
            $colorD = $row['colord'];
            $marginTopD = $row['margintopd'];
            $marginLeftD = $row['marginleftd'];
            $textTransformD = $row['texttransformd'];
            $textAlignD = $row['textalignd'];

            $fontSizeC = $row['fontsizec'];
            $colorC = $row['colorc'];
            $marginTopC = $row['margintopc'];
            $marginLeftC = $row['marginleftc'];
            $textTransformC = $row['texttransformc'];
            $textAlignC = $row['textalignc'];

            $marginTopB = $row['margintop'];
            $marginLeftB = $row['marginleft'];
            $textAlignB = $row['textalign'];
            $borderB = $row['border'];
        }
    }
}

function findPgDefault()
{
    global  $pageWidth, $pageHeight, $fontSizeN, $colorN, $marginTopN, $marginLeftN, $textTransformN, $textAlignN;
    global $fontSizeD, $colorD,  $marginTopD, $marginLeftD,  $textTransformD, $textAlignD;
    global $fontSizeC, $colorC, $marginTopC, $marginLeftC, $textTransformC, $textAlignC;
    global $marginTopB, $marginLeftB, $textAlignB, $borderB;

    //get default value for page print setting  bind in variables.
    $resultPG =  PrintDefaultPage();
    if ($resultPG) {
        while ($row = mysqli_fetch_assoc($resultPG)) {
            $pageWidth = $row['pagewidth'];
            $pageHeight = $row['pageheight'];

            $fontSizeN = $row['fontsizen'];
            $colorN = $row['colorn'];
            $marginTopN = $row['margintopn'];
            $marginLeftN = $row['marginleftn'];
            $textTransformN = $row['texttransformn'];
            $textAlignN = $row['textalignn'];

            $fontSizeD = $row['fontsized'];
            $colorD = $row['colord'];
            $marginTopD = $row['margintopd'];
            $marginLeftD = $row['marginleftd'];
            $textTransformD = $row['texttransformd'];
            $textAlignD = $row['textalignd'];

            $fontSizeC = $row['fontsizec'];
            $colorC = $row['colorc'];
            $marginTopC = $row['margintopc'];
            $marginLeftC = $row['marginleftc'];
            $textTransformC = $row['texttransformc'];
            $textAlignC = $row['textalignc'];

            $marginTopB = $row['margintop'];
            $marginLeftB = $row['marginleft'];
            $textAlignB = $row['textalign'];
            $borderB = $row['border'];
        }
    }
}



function saveCSSData()
{
    global $dbConn;
    //for page
    $ptrpageWidth = $_POST['pageWidth'];
    $ptrpageHeight = $_POST['pageHeight'];

    // for Name
    $ptrfontSizeN = $_POST['nameFontSize'];
    $ptrcolorN = $_POST['nameColor'];
    $ptrmarginTopN = $_POST['nameMarTop'];
    $ptrtextAlignN = $_POST['nameTextAlign'];
    if ($ptrtextAlignN != "unset") {
        $ptrmarginLeftN = 0;
    } else {
        $ptrmarginLeftN = $_POST['nameMarLeft'];
    }
    $ptrtextTransformN = $_POST['nameTextCap'];


    // for Designation
    $ptrfontSizeD = $_POST['desFontSize'];
    $ptrcolorD = $_POST['desColor'];
    $ptrmarginTopD = $_POST['desMarTop'];
    $ptrtextAlignD = $_POST['desTextAlign'];
    if ($ptrtextAlignD != "unset") {
        $ptrmarginLeftD = 0;
    } else {
        $ptrmarginLeftD = $_POST['desMarLeft'];
    }
    $ptrtextTransformD = $_POST['desTextCap'];



    // for Company
    $ptrfontSizeC = $_POST['compFontSize'];
    $ptrcolorC = $_POST['compColor'];
    $ptrmarginTopC = $_POST['compMarTop'];
    $ptrtextAlignC = $_POST['compTextAlign'];
    if ($ptrtextAlignC != "unset") {
        $ptrmarginLeftC = 0;
    } else {
        $ptrmarginLeftC = $_POST['compMarLeft'];
    }
    $ptrtextTransformC = $_POST['compTextCap'];


    // for Barcode
    $ptrmarginTopB = $_POST['barMarTop'];
    $ptrtextAlignB = $_POST['BarcodeAlign'];
    if ($ptrtextAlignB != "unset") {
        $ptrmarginLeftB = 0;
    } else {
        $ptrmarginLeftB = $_POST['barMarLeft'];
    }
    $ptrborderB = $_POST['barBorder'];


    // css file data in a variable.
    $printSetFile = '
@page {
size:' . $ptrpageWidth . "mm" . '  ' . $ptrpageHeight . "mm" . ';
}

@media print {
    html,
    body {
        margin: 2px;
        padding: 2px;
    }

    .frmprint {
        display: contents;
    }

    .frmprint .name {
        font-size:' . $ptrfontSizeN . "px" . ';
        color:' . $ptrcolorN . ';
        margin-top:' . $ptrmarginTopN  . "px" . ';
        margin-left:' . $ptrmarginLeftN . "px" . ';
        text-transform:' . $ptrtextTransformN . ';
        text-align:' . $ptrtextAlignN . ';
    }

    .frmprint .des {
        font-size:' . $ptrfontSizeD . "px" . ';
        color:' . $ptrcolorD . ';
        margin-top:' . $ptrmarginTopD  . "px" . ';
        margin-left:' . $ptrmarginLeftD . "px" . ';
        text-transform:' . $ptrtextTransformD . ';
        text-align:' . $ptrtextAlignD . ';
    }

    .frmprint .comp {
       font-size:' . $ptrfontSizeC . "px" . ';
        color:' . $ptrcolorC . ';
        margin-top:' . $ptrmarginTopC  . "px" . ';
        margin-left:' . $ptrmarginLeftC . "px" . ';
        text-transform:' . $ptrtextTransformC . ';
        text-align:' . $ptrtextAlignC . ';
    }

    .frmprint .divImg {
        display: contents;
        margin-top:' . $ptrmarginTopB . "px" . ';
        margin-left:' . $ptrmarginLeftB . "px" . ';
       text-align:' . $ptrtextAlignB . ';
    }

    .frmprint .divImg .imgBCode {
        image-resolution: 300dpi;
        border: ' . "px" . $ptrborderB . '  solid;
    }
}';

    sleep(2);
    file_put_contents("./css/print.css", $printSetFile);

    //update all page setting in server.
    $updateData = "update `printpagesize` AS ps inner JOIN `printcred` AS pc on ps.type = pc.type inner JOIN `printbarcode` AS pb on ps.type = pb.type SET ps.pagewidth = '$ptrpageWidth',ps.pageheight = '$ptrpageHeight',pb.margintop='$ptrmarginTopB',pb.marginleft='$ptrmarginLeftB',pb.textalign='$ptrtextAlignB', pb.border = '$ptrborderB',pc.fontsizen = '$ptrfontSizeN', pc.colorn = '$ptrcolorN',pc.margintopn='$ptrmarginTopN',pc.marginleftn='$ptrmarginLeftN',pc.texttransformn='$ptrtextTransformN',pc.textalignn='$ptrtextAlignN',pc.fontsized = '$ptrfontSizeD', pc.colord = '$ptrcolorD',pc.margintopd='$ptrmarginTopD',pc.marginleftd='$ptrmarginLeftD',pc.texttransformd='$ptrtextTransformD',pc.textalignd='$ptrtextAlignD',pc.fontsizec = '$ptrfontSizeC', pc.colorc = '$ptrcolorC',pc.margintopc='$ptrmarginTopC',pc.marginleftc='$ptrmarginLeftC',pc.texttransformc='$ptrtextTransformC',pc.textalignc='$ptrtextAlignC' WHERE ps.type = 'manual'";
    $data = mysqli_query($dbConn, $updateData) or die("error in query!");
    if ($data) {
        $msgSaveSettting = "page setting has been saved.";
        alertbox($msgSaveSettting);
    }
    $dbConn->close();

    $_SESSION = array();
    echo "<script>setTimeout(\"location.href = './home.php';\",20);</script>";
}


if (array_key_exists('sizeSubmit', $_POST)) {
    saveCSSData();
} else if (array_key_exists('sizeDefault', $_POST)) {
    findPgDefault();
} else if (array_key_exists('sizeManual', $_POST)) {
    findManulPage();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page Setting</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./jquery/jquery-1.9.1.min.js"></script>
</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
        <?php include("log_sign.php"); ?>
    </div>


    <div class="containerView">
        <form action="#" method="POST" id="pageSetFrm">

            <div id="uiPageDiv"><label>Page:</label>
                <div id="fSetPage" class="divField">
                    <label>Width:<input type="number" id="pageWidth" name="pageWidth" required value="<?php echo (isset($pageWidth)) ? preg_replace("/[^0-9.]/", "", $pageWidth)  : " no value";  ?>" />mm</label>
                    <label>Height:<input type="number" id="pageHeight" name="pageHeight" required value="<?php echo (isset($pageHeight)) ? preg_replace("/[^0-9.]/", "", $pageHeight)  : " no value";  ?>" />mm</label>
                </div>
            </div>

            <div id="uiNameDiv"><label>Name:</label>
                <div id="fSetName" class="divField">
                    <label>Font Size :<input id="nameFontSize" name="nameFontSize" required type="number" value='<?php echo (isset($fontSizeN)) ? preg_replace("/[^0-9.]/", "", $fontSizeN)  : "no value";  ?>' />px</label>
                    <label>Color :<input id="nameColor" name="nameColor" required type="text" class="lblFontColor" value='<?php echo (isset($colorN)) ?  $colorN  : "no value";  ?>' /></label>
                    <label>Margin Top:<input id="nameMarTop" name="nameMarTop" required type="number" value='<?php echo (isset($marginTopN)) ? preg_replace("/[^0-9.]/", "", $marginTopN)  : "no value";  ?>' />px</label>
                    <label>Margin Left:<input id="nameMarLeft" name="nameMarLeft" required type="number" value='<?php echo (isset($marginLeftN)) ? preg_replace("/[^0-9.]/", "", $marginLeftN)  : "no value";  ?>' />px</label>
                    <label>Text-Transform :
                        <select id="nameTextCap" form="pageSetFrm" name="nameTextCap" required>
                            <option value="capitalize" <?php if (isset($textTransformN) &&  $textTransformN == "capitalize") echo 'selected="selected"'; ?>>Capitalize</option>
                            <option value="uppercase" <?php if (isset($textTransformN) && $textTransformN == "uppercase") echo 'selected="selected"'; ?>>Uppercase</option>
                            <option value="lowercase" <?php if (isset($textTransformN) && $textTransformN == "lowercase") echo 'selected="selected"'; ?>>Lowercase</option>
                        </select>
                    </label>
                    <label>Text-Align :
                        <select onchange="nameAlign();" id="nameTextAlign" name="nameTextAlign" form="pageSetFrm" required>
                            <option value="unset" <?php if ($textAlignN == "unset") echo 'selected="selected"'; ?>>Unset</option>
                            <option value="center" <?php if ($textAlignN == "center") echo 'selected="selected"'; ?>>Center</option>
                            <option value="right" <?php if ($textAlignN == "right") echo 'selected="selected"'; ?>>Right</option>
                            <option value="left" <?php if ($textAlignN == "left") echo 'selected="selected"'; ?>>Left</option>
                        </select>
                    </label>
                </div>
            </div>

            <div id="uiDesDiv"><label>Designation: </label>
                <div id="fSetDes" class="divField">
                    <label>Font Size :<input id="desFontSize" name="desFontSize" type="number" required value='<?php echo (isset($fontSizeD)) ? preg_replace("/[^0-9.]/", "", $fontSizeD)  : "no value";  ?>' />px</label>
                    <label>Color :<input id="desColor" name="desColor" class="lblFontColor" required type="text" value='<?php echo (isset($colorD)) ? $colorD  : " no value";  ?>' /></label>
                    <label>Margin Top :<input id="desMarTop" name="desMarTop" type="number" required value='<?php echo (isset($marginTopD)) ? preg_replace("/[^0-9.]/", "", $marginTopD)  : "no value";  ?>' />px</label>
                    <label>Margin Left:<input id="desMarLeft" name="desMarLeft" type="number" required value='<?php echo (isset($marginLeftD)) ? preg_replace("/[^0-9.]/", "", $marginLeftD)  : "no value";  ?>' />px</label>
                    <label>Text-Transform :
                        <select id="desTextCap" name="desTextCap" form="pageSetFrm" required>
                            <option value="capitalize" <?php if ($textTransformD == "capitalize") echo 'selected="selected"'; ?>>Capitalize</option>
                            <option value="uppercase" <?php if ($textTransformD == "uppercase") echo 'selected="selected"'; ?>>Uppercase</option>
                            <option value="lowercase" <?php if ($textTransformD == "lowercase") echo 'selected="selected"'; ?>>Lowercase</option>
                        </select>
                    </label>
                    <label>Text-Align :
                        <select onchange="desAlign();" id="desTextAlign" name="desTextAlign" form="pageSetFrm" required>
                            <option value="unset" <?php if ($textAlignD == "unset") echo 'selected="selected"'; ?>>Unset</option>
                            <option value="center" <?php if ($textAlignD == "center") echo 'selected="selected"'; ?>>Center</option>
                            <option value="right" <?php if ($textAlignD == "right") echo 'selected="selected"'; ?>>Right</option>
                            <option value="left" <?php if ($textAlignD == "left") echo 'selected="selected"'; ?>>Left</option>
                        </select>
                    </label>
                </div>
            </div>

            <div id="uiComDiv"><label>Company: </label>
                <div id="fSetCom" class="divField">
                    <label>Font Size :<input id="compFontSize" name="compFontSize" type="number" required value='<?php echo (isset($fontSizeC)) ? preg_replace("/[^0-9.]/", "", $fontSizeC)  : "no value";  ?>' />px</label>
                    <label>Color :<input id="compColor" name="compColor" type="text" class="lblFontColor" required value='<?php echo (isset($colorC)) ? $colorC  : "no value";  ?>' /></label>
                    <label>Margin Top :<input id="compMarTop" name="compMarTop" type="number" required value='<?php echo (isset($marginTopC)) ? preg_replace("/[^0-9.]/", "", $marginTopC)  : "no value";  ?>' />px</label>
                    <label>Margin Left :<input id="compMarLeft" name="compMarLeft" type="number" required value='<?php echo (isset($marginLeftC)) ? preg_replace("/[^0-9.]/", "", $marginLeftC)  : "no value";  ?>' />px</label>
                    <label>Text-Transform :
                        <select id="compTextCap" name="compTextCap" form="pageSetFrm" required>
                            <option value="capitalize" <?php if ($textTransformC == "capitalize") echo 'selected="selected"'; ?>>Capitalize</option>
                            <option value="uppercase" <?php if ($textTransformC == "uppercase") echo 'selected="selected"'; ?>>Uppercase</option>
                            <option value="lowercase" <?php if ($textTransformC == "lowercase") echo 'selected="selected"'; ?>>Lowercase</option>
                        </select>
                    </label>
                    <label>Text-Align :
                        <select onchange="compAlign();" id="compTextAlign" name="compTextAlign" form="pageSetFrm" required>
                            <option value="unset" <?php if ($textAlignC == "unset") echo 'selected="elected"'; ?>>Unset</option>
                            <option value="center" <?php if ($textAlignC == "center") echo 'selected="selected"'; ?>>Center</option>
                            <option value="right" <?php if ($textAlignC == "right") echo 'selected="selected"'; ?>>Right</option>
                            <option value="left" <?php if ($textAlignC == "left") echo 'selected="selected"'; ?>>Left</option>
                        </select>
                    </label>
                </div>
            </div>

            <div id="uiImgDiv"><label>BCode:</label>
                <div id="fSetImg" class="divField">
                    <label>Margin-Top :<input id="barMarTop" name="barMarTop" type="number" required value='<?php echo (isset($marginTopB)) ? preg_replace("/[^0-9.]/", "", $marginTopB)  : "no value";  ?>' />px</label>
                    <label>Margin-Left :<input id="barMarLeft" name="barMarLeft" type="number" required value='<?php echo (isset($marginLeftB)) ? preg_replace("/[^0-9.]/", "", $marginLeftB)  : "no value";  ?>' />px</label>
                    <label>Border-Size :<input id="barBorder" name="barBorder" type="number" required value='<?php echo (isset($borderB)) ? preg_replace("/[^0-9.]/", "", $borderB)  : "no value";  ?>' />px</label>
                    <label>Barcode-Align :
                        <select onchange="bcodeAlign()" id="BarcodeAlign" name="BarcodeAlign" form="pageSetFrm" required>
                            <option value="unset" <?php if ($textAlignB == "unset") echo 'selected="selected"'; ?>>Unset</option>
                            <option value="center" <?php if ($textAlignB == "center") echo 'selected="selected"'; ?>>Center</option>
                            <option value="right" <?php if ($textAlignB == "right") echo 'selected="selected"'; ?>>Right</option>
                            <option value="left" <?php if ($textAlignB == "left") echo 'selected="selected"'; ?>>Left</option>
                        </select>
                    </label>
                </div>
            </div>


            <div class="btnDiv">
                <input class="btnFSet" type="submit" name="sizeSubmit" value="Save" />
                <input class="btnFSet" type="submit" name="sizeDefault" value="Default" />
                <input class="btnFSet" type="submit" name="sizeManual" value="Manual" />
                <input class="btnFSet" type="button" name="sizeSubmit" value="Cancel" onclick="backHome();" />
            </div>
        </form>
    </div>
</body>

<?php include("footer.php"); ?>

<script type="text/javascript">
    function nameAlign() {
        debugger;
        let nameAlignVal = document.getElementById('nameTextAlign').value;
        if (nameAlignVal == "unset") {
            $("#nameMarLeft").prop("readonly", false);
            $("#nameMarLeft").css("background-color", "white");

        } else {
            $("#nameMarLeft").prop("readonly", true);
            $("#nameMarLeft").css("background-color", "#04a5a5");
        }
    }

    function desAlign() {
        debugger;
        let desAlignVal = document.getElementById('desTextAlign').value;
        if (desAlignVal == "unset") {
            $("#desMarLeft").prop("readonly", false);
            $("#desMarLeft").css("background-color", "white");

        } else {
            $("#desMarLeft").prop("readonly", true);
            $("#desMarLeft").css("background-color", "#04a5a5");
        }
    }

    function compAlign() {
        debugger;
        let compAlignVal = document.getElementById('compTextAlign').value;
        if (compAlignVal == "unset") {
            $("#compMarLeft").prop("readonly", false);
            $("#compMarLeft").css("background-color", "white");

        } else {
            $("#compMarLeft").prop("readonly", true);
            $("#compMarLeft").css("background-color", "#04a5a5");
        }
    }

    function bcodeAlign() {
        debugger;
        let bCodeAlignVal = document.getElementById('BarcodeAlign').value;
        if (bCodeAlignVal == "unset") {
            $("#barMarLeft").prop("readonly", false);
            $("#barMarLeft").css("background-color", "white");

        } else {
            $("#barMarLeft").prop("readonly", true);
            $("#barMarLeft").css("background-color", "#04a5a5");
        }
    }

    function backHome() {
        window.location.href = "./home.php";
    }
</script>

</html>