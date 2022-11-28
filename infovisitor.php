<?php 
include('connection.php');
include('logic.php');
?>


<?php

$msg = "Login must to access.";
session_start();
if (!isset($_SESSION['eventuser'])) {
    alertbox($msg);
    echo "<script>setTimeout(\"location.href = './home.php';\",20);</script>";
}

$sno = 0;
$tcol = '<tr>
                        <th> S.No. </th>
                        <th> ID </th>
                        <th> BC No. </th>
                        <th> Name </th>
                        <th> Designation </th>
                        <th> Company </th>
                        <th> Created Date </th>
                        <th> Type </th>
                        <th> Creator Name </th>
                        <th> Sys.Name </th>
                    </tr>';
$query = "SELECT * FROM `visitors` ORDER BY `id` ASC";
$result = mysqli_query($dbConn, $query);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/style.css">

    <title>Information Visitors</title>

</head>

<body>

    <div class="container_table">
        <div class="title_infov">
            Visitors Information
            <a href="./export.php"> <button>Export In Excel</button></a>
        </div>


        <div class="tbl_info">
            <table class="table" id="dataTable">
                <thead>
                    <?php echo $tcol; ?>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $sno++;
                            echo '
                                <tr>
                                <td>' . $sno . '</td>
                                <td>' . $row["id"] . '</td>
                                <td>' . $row["barcode"] . '</td>
                                <td>' . $row["name"] . '</td>
                                <td>' . $row["designation"] . '</td>
                                <td>' . $row["company"] . '</td>
                                <td>' . $row["date"] . '</td>
                                <td>' . $row["type"] . '</td>
                                <td>' . $row["creator_name"] . '</td>
                                <td>' . $row["systemname"] . '</td>
                            </tr>
                            ' ;
                        }
                    }
                    $dbConn->close();
                    ?>

                </tbody>
            </table>
            <input type="hidden" name="file_content" id="file_content" />
        </div>
    </div>
</body>
<div class="back"><?php include("back.php"); ?></div>

</html>