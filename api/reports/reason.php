<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $sql = "SELECT reason as id, reason as label, count(*) as value FROM `temp_referral` GROUP BY reason";
        $stmt = $db->prepare($sql);
        $stmt->execute();      
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $colors = ["hsl(500, 70%, 50%)", "hsl(3, 70%, 50%)", "hsl(202, 70%, 50%)", "hsl(202, 70%, 50%)", "hsl(100, 70%, 50%)", "hsl(300, 70%, 50%)"];

        for($x = 0; $x < count($data); $x++) {
           $data[$x]['color'] = $colors[$x];
        }

        echo json_encode($data);
        break;
}
?>