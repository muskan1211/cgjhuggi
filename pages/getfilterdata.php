<?php

include 'db.php';

$city=$_POST['cities'];
$ward = $_POST['wards'];
$x=1;


 
$query = "SELECT * FROM `tbl_client` WHERE CITY='$city' AND WARD_NO=$ward AND DELETE_STATUS=0 ORDER BY NAME";

$data = mysqli_query($conn,$query) or die(mysqli_error($conn));




$tbody='';
if($data) {
	
	while($row = mysqli_fetch_array($data))
    {
              if(intval($x)%2==0){
                $color = 'white';

            }
            else {
                $color='#d0cccd';

            }
            $clientid = $row['id'];
        $query1 = "SELECT * FROM `tbl_client_variable` WHERE client_id = $clientid";

        $data0 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
        $data1 = mysqli_fetch_array($data0);
       
    	$tbody.=  '<tr id='.$row['id'].' bgcolor = "'.$color.'">
			    <td>'.$x.'</td>
                <td>'.$row['NAME'].'</td>
                <td>'.$row['F_NAME'].'</td>
                <td>'.$row['GENDER'].'</td>
                <td>'.$row['CASTE'].'</td>
                <td>'.$row['RELIGION'].'</td>
                <td>'.$row['ADHAR_NO'].'</td>
                <td>'.$row['BANK_NAME'].'</td>
                <td>'.$row['ACC_NO'].'</td>
                <td>'.$row['IFSC_CODE'].'</td>
                <td>'.$row['MOB_NO'].'</td>
                <td>'.$row['ADDRESS'].'</td>
                 <td>'.$row['WARD_NO'].'</td>
                  <td>'.$row['CITY'].'</td>
                <td>'.$row['SURVEY_ID'].'</td>
                <td>'.$row['KHASRA_NO'].'</td>
                <td>'.$row['LAND_TYPE_USE'].'</td>
                <td>'.$row['PLOT_AREA'].'</td>
                <td>'.$row['ROAD_WIDTH'].'</td>
                <td>'.$row['LAND_OWNER_TYPE'].'</td>
                <td>'.$row['EXISTING_INFRA_CONDITION'].'</td>
                <td>'.$row['EXISTING_INFRA_CONDITION2'].'</td>
                <td>'.$row['PUCCA_TOILET_AVAILAIBILITY'].'</td>
                <td>'.$row['PROPOSED_TOILET_DRAINING'].'</td>
                <td>'.$data1['PROPOSED_G_FLOOR_AREA'].'</td>
                <td>'.$data1['PROPOSED_F_FLOOR_AREA'].'</td>
                <td>'.$data1['PROPOSED_TOTAL_FLOOR_AREA'].'</td>
                <td>'.$data1['COST_GFLOOR'].'</td>
                <td>'.$data1['COST_FFLOOR'].'</td>
                <td>'.$data1['COST_TOTAL'].'</td>
                <td>'.$row['CENTRAL_GRANT'].'</td>
                <td>'.$data1['STATE_SHARE'].'</td>
                <td>'.$data1['BENEFICIARY_SHARE'].'</td>
                <td>&nbsp; &nbsp;<a class="teal-text" href="javascript:editRow('.$row['id'].');"  title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <td>&nbsp; &nbsp;<a href="javascript:makeBill('.$row['id'].',\''.$row["NAME"].'\');"><i class="fa fa-user-plus" aria-hidden="true"></i></a></td>
                <td>&nbsp; &nbsp;<a href="javascript:confirmdelete('.$row['id'].');"><i class="fa fa-times" aria-hidden="true"></i></a></td>
</td>
            </tr>';
            
            $x++;
            } 
    
    echo $tbody;
}
 else {
 	echo "Some Error Occured";
 }
?>