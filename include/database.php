<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "union";
$conn = mysqli_connect($servername, $username, $password,$dbname);

mysqli_query($conn,"SET CHARACTER SET utf8");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");

if($conn){


}else{
    echo "Database not Connected!";exit;
}
?>