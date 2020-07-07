<?php
$serverName = "localhost";
$username= "root";
$db="mezat_2";
$password="";

$conn= new mysqli($serverName,$username,$password,$db);
if($conn->connect_error) {
die("connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8")

?>