<?php
// $host = 'localhost';
// $username = 'cgjhugg1_naman';
// $pass = 'namanbhaiya@123';
// $db = 'cgjhugg1_namanbhaiya';
$host = 'localhost';
$username = 'cgjhugg1_naman';
$pass = 'namanbhaiya@123';
$db = 'cgjhuggi_1';
//$conn = new mysqli($host,$username,$pass,$db);
$conn = new mysqli("localhost", "root", "root", "cgjhuggi_1", 8889, "/Applications/MAMP/tmp/mysql/mysql.sock");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
 function testdata($data){
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
 }
?>