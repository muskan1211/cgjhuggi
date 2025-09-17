<?php include 'db.php';

$uname = $_POST['uname'];
$fname = $_POST['fname'];
$gender = $_POST['gender'];
$caste = $_POST['caste'];
$city = $_POST['city'];
$religion = $_POST['religion'];
$adhar = $_POST['adhar'];
$bankname = $_POST['bankname'];
$accno = $_POST['accno'];
$ifsc = $_POST['ifsc'];
$address = $_POST['address'];
$wardno = $_POST['wardno'];
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

$query = "INSERT INTO tbl_client(`NAME`, `F_NAME`, `GENDER`, `CASTE`, `RELIGION`, `ADHAR_NO`, `BANK_NAME`, `ACC_NO`, `IFSC_CODE`, `ADDRESS`, `CITY`, `WARD_NO`,`MOB_NO`, `SURVEY_ID`, `KHASRA_NO`, `LAND_TYPE_USE`, `PLOT_AREA`, `ROAD_WIDTH`, `LAND_OWNER_TYPE`, `EXISTING_INFRA_CONDITION`, `EXISTING_INFRA_CONDITION2`, `PUCCA_TOILET_AVAILAIBILITY`, `PROPOSED_TOILET_DRAINING`, `PROPOSED_G_FLOOR_AREA`, `PROPOSED_F_FLOOR_AREA`, `PROPOSED_TOTAL_FLOOR_AREA`, `COST_GFLOOR`, `COST_FFLOOR`, `COST_TOTAL`, `CENTRAL_GRANT`, `STATE_SHARE`, `BENEFICIARY_SHARE`) VALUES ('$uname','$fname','$gender','$caste','$religion','$adhar','$bankname','$accno','$ifsc','$address','$city','$wardno','$mob','$surveyid','$khasra','$landtype','$plotarea','$roadwidth','$owner','$exisinfracond','$exisinfracond1','$toilet','$Toilet_Draining','$cgfloor','$cffloor','$ctotal','$gfloorcost','$ffloorcost','$floortotal','$centralgrant','$stateshare','$beneficiaryshare')";
$data = mysqli_query($conn,$query) or die(mysqli_error($conn));
if($data){
    
    $client_id = mysqli_insert_id($conn);
    $query1 = "INSERT INTO `tbl_client_variable`(`client_id`, `PROPOSED_G_FLOOR_AREA`, `PROPOSED_F_FLOOR_AREA`, `PROPOSED_TOTAL_FLOOR_AREA`, `COST_GFLOOR`, `COST_FFLOOR`, `COST_TOTAL`, `STATE_SHARE`, `BENEFICIARY_SHARE`) VALUES ($client_id,'$cgfloor','$cffloor','$ctotal','$gfloorcost','$ffloorcost','$floortotal','$stateshare','$beneficiaryshare')";
    $data1 =  mysqli_query($conn,$query1) or die(mysqli_error($conn));
    if($data1) {
	echo "Data Submitted Successfully";
    }
}
 else {
 	echo "Some Error Occured";
 }
?>