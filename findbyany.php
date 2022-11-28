<?php
include('connection.php');
include('logic.php');
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

function findInfoName($keyName, $valueFind)
{
    global $dbConn;
    $query = '';

    if ($keyName == "name") {
        $query = "SELECT `id`, `barcode`, `name`,`designation`,`company`,`date`,`type`  FROM `visitors` WHERE name LIKE '%$valueFind%'";
    } else if ($keyName == "barcode") {
        $query = "SELECT `id`, `barcode`, `name`,`designation`,`company`,`date`,`type`  FROM `visitors` WHERE barcode LIKE '%$valueFind%'";
    } else if ($keyName == "company") {
        $query = "SELECT `id`, `barcode`, `name`,`designation`,`company`,`date`,`type`  FROM `visitors` WHERE company LIKE '%$valueFind%'";
    }


    $getData = mysqli_query($dbConn, $query);
    return $getData;
}

$Sno = 0;
$tblFindcol = '<tr>
                        <th> S.No. </th>
                        <th> BC-ID </th>
                        <th> Name </th>
                        <th> Designation </th>
                        <th> Company </th>
                        <th> Created On</th>
                        <th> Type </th>
                        <th> Action </th>
                </tr>';

if (isset($_POST['findany'])) {
    $gotKey = $_POST['findRadio'];
    $gotVal = $_POST['byname'];
    // echo $gotKey . "<br>";
    // echo $gotVal . "<br>";

    $resultData =  findInfoName($gotKey, $gotVal);
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
    <title>find info by any </title>
</head>

<body>
    <div class="headerpage">
        <?php include("option.php"); ?>
        <?php include("log_sign.php"); ?>
    </div>

    <div id="div_find_any" class="container_find_any">
        <form action="#" method="POST" class="frmFind">
            <div class="title_find_any">
                Find Information of Visitors
            </div>

            <div class="input_field_any">
                <input type="radio" value="barcode" class="radioBtn" checked name="findRadio" />
                <label>By BC-ID</label>
                <input type="radio" value="name" class="radioBtn" name="findRadio" />
                <label>By Name</label>
                <input type="radio" value="company" class="radioBtn" name="findRadio" />
                <label>By Company :</label>
                <input type="text" class="inputtxt" name="byname" id="byname" placeholder="find here" required />
                <input type="submit" name="findany" class="subbtn" value="Find Record" />
            </div>
        </form>

        <div class="find_rec_txt">
            <h4>Records Found : <?php echo (isset($resultData)) ? mysqli_num_rows($resultData) : "0"; ?></h4>
        </div>

        <div class="tbl_info_any">
            <table class="table" id="dataTable">
                <thead>
                    <?php echo $tblFindcol; ?>
                </thead>
                <tbody>
                    <?php

                    if ((isset($resultData)) && mysqli_num_rows($resultData) > 0) {
                        while ($rowdata = $resultData->fetch_assoc()) {
                            $Sno++;
                    ?>

                            <tr>
                                <td><?php echo $Sno ?></td>
                                <td><?php echo $rowdata["barcode"] ?></td>
                                <td><?php echo $rowdata["name"] ?></td>
                                <td><?php echo $rowdata["designation"] ?></td>
                                <td><?php echo $rowdata["company"] ?></td>
                                <td><?php echo $rowdata["date"] ?></td>
                                <td><?php echo $rowdata["type"] ?></td>
                                <td><a href="foundPrint.php?id=<?php echo $rowdata['id']; ?>" rel="noopener noreferrer"> Print..</a></td>
                            </tr>
                    <?php
                        }
                    };
                    $dbConn->close();
                    ?>
                </tbody>


            </table>

        </div>
    </div>

    </div>
</body>
<?php include("footer.php"); ?>


</html>