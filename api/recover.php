<?php

include '../connection/config.php';
include '../functions/send_mail.php';
include '../recover_body.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'POST':

        $req = json_decode(file_get_contents('php://input'));
        $email = $req->email;

        $stmt = $db->prepare("SELECT * from users WHERE email = ? AND validated = 1 AND role != 'admin'");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        
        if (mysqli_num_rows($res) !== 0) {
            
            $vCode = rand(10000, 99999);
            $emailDb = $user['email'];

            $update = $db->prepare("UPDATE users SET verification = ? where email = ?");
            $update->bind_param('is', $vCode, $emailDb);

            if($update->execute()) {
                sendmail($user['email'], recover_body($user['firstName'], $vCode), "Verification Code");
                $data = ['status' => 1, 'message' => "Success", 'link' => "http://localhost:3000/recovery?reqid=".$user['userId'].""];
                
            } else {
                $data = ['status' => 0, 'message' => "Failed"];  
            }

        } else {
            $data = ['status' => 2, 'message' => "Email doesn't exist"];  
        }

        echo json_encode($data);
    break;
}