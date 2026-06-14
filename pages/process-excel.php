<?php 
include('db.php');
include 'header.php';

$message = '';

// Check if form is submitted and file is present
if (isset($_POST['submit']) && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file'];

    // Validate if file upload contains errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $message = "Error uploading file.";
    } else {
        $fileName = $file['name'];
        $fileTmp  = $file['tmp_name'];
        
        // Extract extension and verify it is a valid CSV file
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if ($fileExt !== 'csv') {
            $message = "Invalid file format. Please upload a .csv file.";
        } else {
            // Open the file in read-only mode
            if (($handle = fopen($fileTmp, "r")) !== FALSE) {
                
                // Prepare SQL statement with placeholders to block SQL injection
                $sql = "INSERT INTO `tbl_client_pmy2`(`NAME`, `F_NAME`, `GENDER`, `CASTE`, `RELIGION`, `ADHAR_NO`, `BANK_NAME`, `ACC_NO`, `IFSC_CODE`, `WARD_NO`, `ADDRESS`, `CITY`, `MOB_NO`, `SURVEY_ID`, `KHASRA_NO`, `LAND_TYPE_USE`, `ROAD_WIDTH`, `PLOT_AREA`, `LAND_OWNER_TYPE`, `EXISTING_INFRA_CONDITION`, `EXISTING_INFRA_CONDITION2`, `PUCCA_TOILET_AVAILAIBILITY`, `PROPOSED_TOILET_DRAINING`, `PROPOSED_G_FLOOR_AREA`, `PROPOSED_F_FLOOR_AREA`, `PROPOSED_TOTAL_FLOOR_AREA`, `COST_GFLOOR`, `COST_FFLOOR`, `COST_TOTAL`, `CENTRAL_GRANT`, `STATE_SHARE`, `BENEFICIARY_SHARE`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
               
                $stmt = $conn->prepare($sql);
                
                // Optional: Skip the header row of the CSV file
                // Remove or comment out the next line if your CSV lacks headers
               fgetcsv($handle, 1000, ",", '"', '\\');
                
                $rowCount = 0;
                
                // Read file line-by-line using standard CSV delimiters
                while (($row = fgetcsv($handle, 1000, ",", '"', '\\')) !== FALSE) {
                    // Check if the row contains expected structural elements
                    if (count($row) >= 32) {
                        $uname = $row['0'];
                        $fname = $row['1'];
                        $gender = $row['2'] ?: NULL;
                        $caste = $row['3'] ?: NULL;
                        $city = $row['11'];
                        $religion = $row['4'] ?: NULL;
                        $adhar = $row['5'];
                        $bankname = $row['6'];
                        $accno = $row['7'];
                        $ifsc = $row['8'];
                        $address = $row['10'];
                        $wardno = $row['9'];
                        $mob = $row['12'] ?: NULL;
                        $surveyid = $row['13'] ?: NULL;
                        $khasra = $row['14'] ?: NULL;
                        $landtype = $row['15'] ?: NULL;
                        $plotarea = $row['17'] ?: NULL;
                        $roadwidth = $row['16'] ?: NULL;
                        $owner = $row['18'] ?: NULL;
                        $exisinfracond = $row['19'] ?: NULL;
                        $exisinfracond1 = $row['20'] ?: NULL;
                        $toilet = $row['21'] ?: NULL;
                        $Toilet_Draining = $row['22'] ?: NULL;
                        $cgfloor = $row['23'] ?: NULL;
                        $cffloor = $row['24'] ?: NULL;
                        $ctotal = $row['25'] ?: NULL;
                        $gfloorcost = $row['26'] ?: NULL;
                        $ffloorcost = $row['27'] ?: NULL;
                        $floortotal = $row['28'] ?: NULL;
                        $centralgrant = $row['29'] ?: NULL;
                        $stateshare = $row['30'] ?: NULL;
                        $beneficiaryshare = $row['31'] ?: NULL;
                        
                        // Execute statement mapping data values safely
                        $stmt->bind_param(
                                  "ssssssssssssssssssssssssssssssss",
                                  $uname, $fname, $gender, $caste, $religion, $adhar,
                                  $bankname, $accno, $ifsc, $wardno, $address, $city,
                                  $mob, $surveyid, $khasra, $landtype, $roadwidth,
                                  $plotarea, $owner, $exisinfracond, $exisinfracond1,
                                  $toilet, $Toilet_Draining, $cgfloor, $cffloor,
                                  $ctotal, $gfloorcost, $ffloorcost, $floortotal,
                                  $centralgrant, $stateshare, $beneficiaryshare
                               );
                         $stmt->execute();
                         $rowCount++;
                        
                    }
                   
                }
                
                fclose($handle);
               echo "<script>
window.location='importExcel.php?success=1';
</script>";
exit;
            } else {
                $message = "Failed to open the uploaded file.";
            }
        }
    }
}
?>