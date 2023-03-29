<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "union";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if($conn){

}else{
    echo "Database not Connected!";exit;
}
?>