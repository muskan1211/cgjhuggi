<?php session_start();
include 'db.php';


$billid = $_POST['billid'];
$installmentno = $_POST['installmentno'];
$installment = $_POST['installment'];
$amount = $_POST['amount'];
$owner = $_POST['owner'];


$_SESSION['owner'] = $owner;
$_SESSION['billid'] = $billid;
$_SESSION['installmentno'] = $installmentno;
$_SESSION['installment'] = $installment;
$_SESSION['amount'] = $amount;

$query1 = "SELECT tbl_client.CITY FROM tbl_client WHERE  tbl_client.id = $billid";

	

$data1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
echo json_encode(mysqli_fetch_array($data1));



?>