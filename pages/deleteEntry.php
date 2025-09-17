<?php include 'db.php';

$id = $_POST['id'];
$query = "UPDATE `tbl_client` SET DELETE_STATUS=1 where ID = $id";
$data = mysqli_query($conn,$query) or die(mysqli_error($conn));
if($data){
	echo "Data Updated Succesfully";
}
 else {
 	echo "Some Error Occured";
 }

?>