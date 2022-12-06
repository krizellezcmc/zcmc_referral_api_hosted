<?php

include '../connection/config.php';
include '../functions/auth.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT CONCAT(patientName, ' (' ,DATE_FORMAT(referredDate, '%b %d, %Y - %h:%i'), ')') as label, FK_psPatRegisters as `value` from patient");
            $stmt->execute();
            $patients = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            echo json_encode($patients);    
    
           
            break;
}

?>