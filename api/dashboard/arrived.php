<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT COUNT(*) from temp_referral WHERE status = 'arrived'");
            $stmt->execute();
            $arrived = $stmt->get_result()->fetch_row();

            echo json_encode($arrived[0]);
            break;
}

?>