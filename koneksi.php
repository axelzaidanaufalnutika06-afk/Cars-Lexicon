<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "sql305.infinityfree.com";
$username = "if0_40846311";
$password = "1bWI0nyejeM";
$db = "if0_40846311_carlexicon"; //nama database

//create connection
$conn = new mysqli($servername,$username,$password,$db);


if($conn->connect_error){
	die("Connection failed : ".$conn->connect_error);
}

//echo "Connected successfully<hr>";
?>  