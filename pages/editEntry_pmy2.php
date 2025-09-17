<?php 


include 'db.php';

$id=$_POST['clientid'];
$uname = $_POST['uname'];
$fname = $_POST['fname'];
$gender = $_POST['gender'];
$caste = $_POST['caste'];
$religion = $_POST['religion'];
$adhar = $_POST['adhar'];
$bankname = $_POST['bankname'];
$accno = $_POST['accno'];
$ifsc = $_POST['ifsc'];
$address = $_POST['address'];
$mob = $_POST['mob'];
$surveyid = $_POST['surveyid'];
$khasra = $_POST['khasra'];
$landtype = $_POST['landtype'];
$plotarea = $_POST['plotarea'];
$roadwidth = $_POST['roadwidth'];
$owner = $_POST['owner'];
$exisinfracond = $_POST['exisinfracond'];
$exisinfracond1 = $_POST['exisinfracond1'];
$toilet = $_POST['toilet'];
$Toilet_Draining = $_POST['Toilet_Draining'];
$cgfloor = $_POST['cgfloor'];
$cffloor = $_POST['cffloor'];
$ctotal = $_POST['ctotal'];
$gfloorcost = $_POST['gfloorcost'];
$ffloorcost = $_POST['ffloorcost'];
$floortotal = $_POST['floortotal'];
$centralgrant = $_POST['centralgrant'];
$stateshare = $_POST['stateshare'];
$beneficiaryshare = $_POST['beneficiaryshare'];

$query = "UPDATE `tbl_client_pmy2` SET `NAME`='$uname',`F_NAME`='$fname',`GENDER`='$gender',`CASTE`='$caste',`RELIGION`='$religion',`ADHAR_NO`='$adhar',`BANK_NAME`='$bankname',`ACC_NO`='$accno',`IFSC_CODE`='$ifsc',`ADDRESS`='$address',`MOB_NO`='$mob',`SURVEY_ID`='$surveyid',`KHASRA_NO`='$khasra',`LAND_TYPE_USE`='$landtype',`PLOT_AREA`='$plotarea',`ROAD_WIDTH`='$roadwidth',`LAND_OWNER_TYPE`='$owner',`EXISTING_INFRA_CONDITION`='$exisinfracond',`EXISTING_INFRA_CONDITION2`='$exisinfracond1',`PUCCA_TOILET_AVAILAIBILITY`='$toilet',`PROPOSED_TOILET_DRAINING`='$Toilet_Draining',`CENTRAL_GRANT`='$centralgrant' WHERE id=$id";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($data){
	echo "Data Updated Succesfully";
}
 else {
 	echo "Some Error Occured";
 }

?>