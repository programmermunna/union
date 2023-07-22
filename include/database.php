<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mkiua";
$conn = mysqli_connect($servername, $username, $password,$dbname);

mysqli_query($conn,"SET CHARACTER SET utf8");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");

if(!$conn){
 echo "Database not Connected!";
}
?>