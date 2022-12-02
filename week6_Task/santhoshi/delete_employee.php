<?php
require_once 'response.php';
require_once 'connection.php';
$designationID = $_POST['Id'] ?? null;
if($designationID){
    // global $query;
    $query = "DELETE FROM employees WHERE id = $designationID";
}
try {
    // global $query;
    $statement = $pdo->query($query);
    // $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $response['status'] = true;
    $response['message'] = 'Record Deleted.';
    $response['data'] = '';

} catch(\Exception $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}
echo json_encode($response);
return;
 ?>