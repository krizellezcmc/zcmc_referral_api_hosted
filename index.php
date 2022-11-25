<?php

    include './connection/config.php';

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");
    
    date_default_timezone_set('Asia/Manila');
    echo date('Y-m-d h:i:s a');
?>

