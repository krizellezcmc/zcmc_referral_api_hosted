<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
    
        $stmt = $db->prepare("SELECT * FROM covid_status WHERE patientId = ?");
        $stmt->bind_param('s', $_GET['patientId']);
        $stmt->execute();

        $patient = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($patient);
        break;

    }
?>