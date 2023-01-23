<?php
include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':


        $sql = "SELECT specialization AS id,specialization AS label, COUNT(specialization) AS value from temp_referral GROUP BY specialization";

        $stmt = $db->prepare($sql);
        $stmt->execute();      

    
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        $colors = ["hsl(202, 70%, 50%)", "hsl(100, 70%, 50%)", "hsl(300, 70%, 50%)", "hsl(400, 70%, 50%)", "hsl(90, 70%, 50%)", "hsl(150, 70%, 50%)"];

        for($x = 0; $x < count($data); $x++) {
           $data[$x]['color'] = $colors[$x];
        }

        echo json_encode($data);
        break;
}

?>