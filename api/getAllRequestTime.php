<?php

include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT * from temp_referral WHERE requestEdit = 0 AND requestTime != ''");
            $stmt->execute();
            $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            if($access === true) {
                echo json_encode($data);    
            } else {
                echo "Unathorized";
            }

            break;
}

?>