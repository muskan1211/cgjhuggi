<?php include 'db.php';

$query = "SELECT * FROM `tbl_client` where DELETE_STATUS=0";
        $data = mysqli_query($conn,$query);
        $x=1;
$str = "<table id='export_table' width='100%''>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Name:</th>
                <th>Fathers Name:</th>
                <th>Gender:</th>
                <th>Caste:</th>
                <th>Religion:</th>
                <th>Aadhar No.:</th>
                <th>Bank Name:</th>
				 <th>Account Number:</th>
                <th>IFSC CODE:</th>
                <th>Mobile No.:</th>
                <th>Address & Landmark :</th>
                 <th>Ward No</th>
                <th>Survey ID:</th>
                <th>Khasra No:</th>
                <th>Type of Land Use:</th>
                <th>Plot Area:</th>
                <th>Existing Road Width:</th>
                <th>Type of land Ownership:</th>
                <th>Existing Infra Condition:</th>
                 <th>Existing Infra Condition:</th>
				 <th>Availability of Pucca Toilet</th>
				 <th>Toilet Proposed in Draining</th>
                <th>Ground Floor</th>
                <th>First Floor</th>
                <th>Total</th>
                <th>Ground Floor Amt(10500/sqm)</th>
                <th>First Floor Amt(8500/sqm)</th>
                <th>Total</th>
				 <th>Central Grant :</th>
                <th>State share@25% </th>
                <th>Beneficiary Share (In Lakhs):</th>
                
                
            </tr>
        </thead>
       
        <tbody>
       
           ";
               

        
        while($row=mysqli_fetch_array($data))
        {

       
			  $str.=" <tr>
			    <td>". $x."</td>
                <td>".$row['NAME']."</td>
                <td>".$row['F_NAME']."</td>
                <td>".$row['GENDER']."</td>
                <td>".$row['CASTE']."</td>
                <td>".$row['RELIGION']."</td>
                <td>".$row['ADHAR_NO']."</td>
                <td>".$row['BANK_NAME']."</td>
                <td>".$row['ACC_NO']."</td>
                <td>".$row['IFSC_CODE']."</td>
                <td>".$row['MOB_NO']."</td>
                <td>".$row['ADDRESS']."</td>
                <td>".$row['WARD_NO']."</td>
                <td>".$row['SURVEY_ID']."</td>
                <td>".$row['KHASRA_NO']."</td>
                <td>".$row['LAND_TYPE_USE']."</td>
                <td>".$row['PLOT_AREA']."</td>
                <td>".$row['ROAD_WIDTH']."</td>
                <td>".$row['LAND_OWNER_TYPE']."</td>
                <td>".$row['EXISTING_INFRA_CONDITION']."</td>
                <td>".$row['EXISTING_INFRA_CONDITION2']."</td>
                <td>".$row['PUCCA_TOILET_AVAILAIBILITY']."</td>
                <td>".$row['PROPOSED_TOILET_DRAINING']."</td>
                <td>".$row['PROPOSED_G_FLOOR_AREA']."</td>
                <td>".$row['PROPOSED_F_FLOOR_AREA']."</td>
                <td>".$row['PROPOSED_TOTAL_FLOOR_AREA']."</td>
                <td>".$row['COST_GFLOOR']."</td>
                <td>".$row['COST_FFLOOR']."</td>
                <td>".$row['COST_TOTAL']."</td>
                <td>".$row['CENTRAL_GRANT']."</td>
                <td>".$row['STATE_SHARE']."</td>
                <td>".$row['BENEFICIARY_SHARE']."</td>
               
            </tr>";
           
            $x++;
            }
           
      $str.="</tbody>
         <tfoot>
              
        </tfoot>
		  
    </table>";

    echo $str;


?>