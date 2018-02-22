<?php
$servername = "localhost";
$username = "root";
$password = "num3r1c24*";
$database = "vehicle_service";


//create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

//check the connection
if ($conn->connect_error) {
    die("Connection failed: " .mysqli_connect_error());
}
else {
  //return $message;
}


?>
