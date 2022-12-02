<?php
require_once 'response.php';
require_once 'connection.php';
$designationId =$_POST['designation'] ?? null;
if(!$designationId){
    echo returnFailedResponse('Enter the Designation');
    return;
}
try {
    $statement = $pdo->prepare("select * from designations where description = ?");
    $statement->execute([$designationId]);
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($response)>0){
        $response['status']=false;
        $response['message']="";
        echo json_encode($response);
        return;
    }
}catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}