<?php
require_once 'response.php';
require_once 'connection.php';

$designationID = $_GET['designationId'] ?? null;
// die($designationID);
if($designationID){
    $query = "SELECT e.id, CONCAT(e.surname,' ',e.firstname,e.lastname) AS Name, e.date_of_joining, e.date_of_birth, e.gender, e.phone, w.description AS WorkingStatus, d.description AS Designation, l.district AS Location
    FROM employees AS e, working_status AS w, designations AS d, location AS l WHERE e.working_status_id = w.id AND e.designation_id = d.id AND e.location_id = l.id AND e.designation_id = $designationID ORDER BY e.id";
}
else{
    $query = "SELECT e.id, CONCAT(e.surname,' ',e.firstname,e.lastname) AS Name, e.date_of_joining, e.date_of_birth, e.gender, e.phone, w.description AS WorkingStatus, d.description AS Designation, l.district AS Location
    FROM employees AS e, working_status AS w, designations AS d, location AS l WHERE e.working_status_id = w.id AND e.designation_id = d.id AND e.location_id = l.id ORDER BY e.id";
    
}
try {
    $statement = $pdo->query($query);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $response['status'] = true;
    $response['message'] = 'Records found.';
    $response['data'] = $result;

} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;
 ?>

<!-- Retrieving the JE
 -->
 