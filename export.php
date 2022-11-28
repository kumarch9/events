 <?php

   header('Content-Type: application/vnd.ms-excel');
   header('Content-disposition: attachment; filename='. "record" . rand() . '.xls');
   
   ?> 
<?php include('infovisitor.php'); ?>

