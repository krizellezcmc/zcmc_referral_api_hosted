<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $patientRef = json_decode(file_get_contents('php://input'));
            $patId = $patientRef->patId;
            
                // UPDATE VALIDATION 
                $stmt = $db->prepare("UPDATE temp_referral SET editable = 0 WHERE patientId = ?");
                $stmt->bind_param("s", $patId);
                if($stmt->execute()){
                    $data = ['status' => 1, 'message' => "Success"];
                }else {
                    $data = ['status' => 0, 'message' => "Error."];
                }

            echo json_encode($data);
            break;
}

?>