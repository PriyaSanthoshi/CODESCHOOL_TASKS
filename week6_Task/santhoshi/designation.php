<?php
 include 'response.php';
include 'connection.php';
try {
    $statement = $pdo->query("select * from designations");
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo returnSuccessResponse(null,$response);
}
catch (\Exception $e) {
    echo returnFailedResponse($e->getMessage());
}
?>
