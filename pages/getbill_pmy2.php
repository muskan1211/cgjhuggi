<?php

include 'db.php';

$id=$_POST['id'];


// 
$query = "SELECT * FROM `tbl_bill_pmy2` WHERE USER_ID=$id";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));

$ins='';
if($data){
	
	while($var = mysqli_fetch_array($data))
    {
    	$ins.=$var['TO_BE_PAID_FOR'].',';
    }
    echo $ins;
}
 else {
 	echo "Some Error Occured";
 }
?>