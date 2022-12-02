<?php
require_once 'response.php';
require_once 'connection.php';
require_once 'validation.php';
$firstName = $_POST['firstName'] ?? null;
$lastName = $_POST['lastName'] ?? null;
$surname = $_POST['surname'] ?? null;
$dateOfJoining =$_POST['dateOfJoining'] ?? null;
$dateOfBirth =$_POST['dateOfBirth'] ?? null;
$gender =$_POST['gender'] ?? null;
$phone =$_POST['phone'] ?? null;
$workingStatusId =$_POST['workingStatus'] ?? null;
$designationId =$_POST['designation'] ?? null;
$locationId =$_POST['location'] ?? null;


if(!$firstName){
    echo returnFailedResponse('Please enter Firstname');
    return;
}
if(!$lastName){
    echo returnFailedResponse('Please enter Lastname');
    return;
}
if(!$surname){
    echo returnFailedResponse('Please enter Surname');
    return;
}
if(!$dateOfJoining){
    echo returnFailedResponse('Select Dateofjoining');
    return;
}
if(!isValidDate($dateOfJoining,'Y-m-d')) {
    echo returnFailedResponse('Invalid dateofjoining');
    return;
}
if(!$dateOfBirth){
    echo returnFailedResponse('Select DateofBirth');
    return;
}
if(!isValidDate($dateOfBirth,'Y-m-d')) {
    echo returnFailedResponse('Invalid DateofBirth');
    return;
}
if(!$gender){
    echo returnFailedResponse('Enter the Gender');
    return;
}
if(!$phone){
    echo returnFailedResponse('Enter the 10digit phonenumber');
    return;
}
if(!$workingStatusId){
    echo returnFailedResponse('Enter the WorkingStatus');
    return;
}
if(!$designationId){
    echo returnFailedResponse('Enter the Designation');
    return;
}
if(!$locationId){
    echo returnFailedResponse('Enter the Location');
    return;
}
try {
    $statement = $pdo->prepare("INSERT INTO employees (firstname,lastname,surname,date_of_joining,date_of_birth,gender,phone,working_status_id,designation_id,location_id) values (?,?,?,?,?,?,?,?,?,?)");
    $isQueryExecuted = $statement->execute([$firstName,$lastName,$surname,formatDate($dateOfJoining),formatDate($dateOfBirth),$gender,$phone,$workingStatusId,$designationId,$locationId]);
    // $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($isQueryExecuted){
        echo returnSuccessResponse('Employee Created Succesfully');
        return;
    }
}

catch (\Exception $e) {
    echo returnFailedResponse($e->getMessage());
    return;
} 
// finally {
//     if ($pdo) {
//         $pdo = null;

//     }
// }