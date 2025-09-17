<?php session_start();
include 'db.php';

$date = date('Y-m-d');
$owner = $_SESSION['owner'] ;
$billid = $_SESSION['billid'] ;
$installmentno = $_SESSION['installmentno'];
$installment = $_SESSION['installment'];
$amount = $_SESSION['amount'];


$query = "INSERT INTO `tbl_bill`(`USER_ID`, `DATE`, `NO_OF_INSTALLMENT`, `TO_BE_PAID_FOR`, `AMOUNT_PAID`, `STATUS`) VALUES ($billid,'$date',$installmentno,'$installment','$amount','PAID')";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));
$id = $conn->insert_id;
if($data){

	
}
 else {
 	echo "Some Error Occured";
 }
?>