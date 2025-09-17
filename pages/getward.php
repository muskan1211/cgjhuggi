<?php

include 'db.php';

$city=$_POST['city'];


 
$query = "SELECT DISTINCT(WARD_NO) FROM tbl_client where CITY='$city' ORDER BY WARD_NO ASC";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));

$option='';
if($data) {
	
	while($var = mysqli_fetch_array($data))
    {
    	$option.='<option value="'.$var['WARD_NO'].'">'.$var['WARD_NO'].'</option>';
    }
    echo $option;
}
 else {
 	echo "Some Error Occured";
 }
?>