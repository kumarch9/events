<?php
$counterVar = 0;

function alertbox($message)
{
    echo "<script type='text/javascript'>alert('$message');</script>";
    return true;
}

function newWinTab($location)
{
    echo "<script type='text/javascript'>window.open($location);</script>";
    return true;
}

function newWin($location)
{
    echo "<script type='text/javascript'>window.open($location,'','width=750px,height=600px');</script>";
    return true;
}
?>