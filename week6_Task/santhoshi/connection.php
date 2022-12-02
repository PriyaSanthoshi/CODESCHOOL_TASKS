
<?php
$dbserver = 'localhost';
$dbport = '5432';
$dbname = 'government_employees';
$dbUsername = 'postgres';
$dbPassword = 'postgres';
$dsn = "pgsql:host=$dbserver;port=5432;dbname=$dbname;";
// make a database connection
$pdo = new PDO($dsn, $dbUsername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if (!$pdo) {
    $response['status'] = false;
    $response['message'] = "connection to database failed";
    return json_encode($response);
}
