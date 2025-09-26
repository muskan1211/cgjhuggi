<?php session_start();
include 'db.php';

$date = date('Y-m-d');
$billid = $_SESSION['billid_pmy2'] ;
$installmentno = $_SESSION['installmentno_pmy2'];
$installment = $_SESSION['installment_pmy2'];
$amount = $_SESSION['amount_pmy2'];


$query = "INSERT INTO `tbl_bill_pmy2`(`USER_ID`, `DATE`, `NO_OF_INSTALLMENT`, `TO_BE_PAID_FOR`, `AMOUNT_PAID`, `STATUS`) VALUES ($billid,'$date',$installmentno,'$installment','$amount','PAID')";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));
$id = $conn->insert_id;
if($data){

	
}
 else {
 	echo "Some Error Occured";
 }
?>