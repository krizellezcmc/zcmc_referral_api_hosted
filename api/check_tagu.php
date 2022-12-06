<?php
include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $id=$_GET['id'];

        $sql = "SELECT COUNT(PK_tagubilinId) FROM tagubilin WHERE PK_tagubilinId = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_row();
  
        echo json_encode($data[0]);
        break;
}

?>