<?php

include '../connection/config.php';

date_default_timezone_set("Asia/Singapore");


$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $details = json_decode(file_get_contents('php://input'));

            $patientId = $details->patientId;
            $user = $details->user;
            $remark = $details->remark;
            $file = $details->file;
            $date = date('Y-m-d H:i:s a');

            $stmt = $db->prepare("INSERT INTO remarks (patientId, remark, attachment, FK_userId, tstamp) VALUES (?, ?, ?,  ?, ?)");
            $stmt->bind_param("sssis", $patientId, $remark, $file, $user, $date);
            
            if($stmt->execute()){
                $data = ['status' => 1, 'message' => "Success"];
            } else {
                $data = ['status' => 0, 'message' => "Failed to post remark."];
            }
           
            echo json_encode($data);
            break;
}

?>