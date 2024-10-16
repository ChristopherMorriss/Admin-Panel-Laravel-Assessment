<?php
//Connection for the localhost
include "phpenv.php";
// try{
//     $db = new PDO("mysql:host=localhost;dbname=netmatters_php;port=3306","root","");
//     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     //var_dump($db);
// }
// catch(exception $e){
//     echo "Unable to connect";
//     exit;
// }

$servername = $_ENV['MySQL_DB_HOST'];
echo $servername;
$database = $_ENV['MySQL_DB_NAME'];
echo $database;
$username = $_ENV['MySQL_DB_USER_NAME'];
echo $username;
$password = $_ENV['MySQL_DB_PASSWORD'];
echo $password;

 
// Create connection
 
$conn = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}
echo "Connected successfully";
mysqli_close($conn);


try {
    $results = $db->query("SELECT telephone, company, email FROM enquiries");
    //echo "Retrieved Results ";
 } catch (Exception $e) {
    echo "Unable to retrieve results ";
    exit;
 }
//  $db->query("INSERT INTO enquiries VALUES () Trying to add the submission form variables into the database
var_dump($results);
var_dump($results->fetchAll(PDO::FETCH_ASSOC));
?>