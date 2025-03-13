
<?php
// database configuration

$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "swap project";

try {
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

if ($conn->connect_error) {
    throw new Exception("Connection failed: " . $conn->connect_error);
}
}
 
catch (Exception $e) {
    die("Error: " . $e->getMessage());
}