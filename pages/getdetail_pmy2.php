<?php

include 'db.php';

$id=$_POST['id'];
$query = "SELECT * FROM `tbl_client_pmy2` WHERE id=$id";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));
if($data){
	echo json_encode(mysqli_fetch_assoc($data));
}
 else {
 	echo "Some Error Occured";
 }
?>