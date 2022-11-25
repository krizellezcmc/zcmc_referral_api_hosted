<?php

include '../connection/config.php';
include '../functions/send_mail.php';
include '../accept_body.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $patientRef = json_decode(file_get_contents('php://input'));
            $id = $patientRef->id;
            $reason = $patientRef->reason;
            $date = date('Y-m-d H:i:s a');

                // UPDATE VALIDATION 
                $stmt = $db->prepare("UPDATE routes SET reason = ?, status = 'refused', update_tstamp = ? WHERE PK_routeId = ?");
                $stmt->bind_param("ssi", $reason, $date, $id);
                
                if($stmt->execute()){
                    $data = ['status' => 1, 'message' => "Success"];
                }else {
                    $data = ['status' => 0, 'message' => "Error."];
                }

            echo json_encode($data);
            break;
}

?>