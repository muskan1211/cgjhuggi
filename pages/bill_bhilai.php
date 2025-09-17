<?php session_start();
 include 'db.php';

  $id = $_GET['id'];


$query1 = "SELECT * FROM `tbl_client` WHERE  ID=$id";

$data1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
$getuser = mysqli_fetch_array($data1);
$query2 = "SELECT * FROM `tbl_client_variable` WHERE  client_id=$id";

$data2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
$getuser2 = mysqli_fetch_array($data2);


 $date=date('d-m-y');

 $installment_data = $_SESSION['installment'];
   $installment_no = 1;
   $i=0;
    
     for($i=0;$i<strlen($installment_data);$i++){

     	$char = $installment_data[$i];
     	if($char==',') {

     		$installment_no++;
     	}
     } ?>
<!doctype html>


<html>
<head>

 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	@media print{

		#notprint {
			display:none;
		}
		#mymodal {
			display: none;
		}
        #table1 {
        border-collapse: collapse;
    }
    #table1, #table1 td {

        border: 1px solid black;

    }
    #table2 {
        border-collapse: collapse;
    }
    #table2, #table2 td {

        border: 1px solid black;

    }

	}
	
</style>
</head>
<body>
	<div class="container" style="margin: 0px;padding: 0px;">
		<br><br>
		<div id="notprint">
		<center><button class="btn btn-primary" onclick="saveonly();">SAVE</button>
		<button class="btn btn-primary" onclick="myFunction();">SAVE AND PRINT</button>
		<button class="btn btn-primary" onclick="myFunctioncancel();">BACK</button></center>
	</div>
		<div class="content" style="margin: 20px;height:1000px;">
			<div class="header"><center><h2><?php   echo $_SESSION['owner']; ?></h2>
			<h4>CONSULTANT DURG&nbsp;&nbsp;BHILAI MUNICIPAL CORPORATION</h4>
			<h5>REGISTERED CIVIL ENGINEER PUBLIC WORKS DEPARTMENT,WATER RESOURCES DEPARTMENT<br><br>
STRUCTURE REPAIR REHABILATION,WATER PROOFING SYSTEMS,SELANTS FLOORINGS & MATERIALS</h5> </center></div><br>
<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-left">
				
                <p>To.<br>THE NODAL OFFICER<br>PRADHAN MANTRI AAWAS YOJNA<br>BHILAI MUNICIPAL CORPORATION,BHILAI

                  </p>
           
							
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 text-right">
						<br>
						 Date:- <?php echo date('d-m-Y'); ?>
					</div></div>
			<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 text-center">
							<b>Subject:-</b>&nbsp;&nbsp;&nbsp;Beneficiary Bill cum Progress report/certificate under  <b>Mor Jamin - Mor
                        Makan</b>" BLC-HFA Scheme.
						</div>
						
					</div><br>
				<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							 Reference :-Bhawan Anugya No. .........
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 text-right">
						 Date:- __________ 
					</div>
					</div><br>
			<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
            With above ref & subject the underconstruction residential house &nbsp;&nbsp;<b><?php echo $_SESSION['installment']; ?></b>
                    &nbsp;&nbsp;level as the site has been supervised<br><br>
			</div>
			</div>
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="align-content: center;" id="edit">
					 <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NAME OF BENEFICIARY:<span style="margin-left: 50px;"><?php echo $getuser['NAME'];?></span>
                </b></li>
                <li class="list-group-item">
                  <b>FATHER/HUSBAND NAME :<span style="margin-left: 35px;"><?php echo $getuser['F_NAME']; ?></span></b> 
                </li>
                <li class="list-group-item">
                <b>AADHAR NO <span style="margin-left: 132px;"><?php echo $getuser['ADHAR_NO']; ?></span></b>
                </li>
                <li class="list-group-item">
                <b>MOBILE NO <span style="margin-left: 145px;"><?php echo $getuser['MOB_NO']; ?></span></b>
                </li>
                <li class="list-group-item">
                <b>ADDRESS<span style="margin-left: 150px;"><?php echo $getuser['ADDRESS']; ?></span></b> 
                </li>
                <li class="list-group-item">
                <b>WARD NO <span style="margin-left: 170px;"><?php echo $getuser['WARD_NO'];?></span></b>
                </li>
                <li class="list-group-item">
                <b>BANK NAME <span style="margin-left: 145px;"><?php echo $getuser['BANK_NAME']; ?></span></b>
                </li>
                <li class="list-group-item">
                <b>ACCOUNT NO <span style="margin-left: 135px;"><?php echo $getuser['ACC_NO'];?></span></b>
                </li>
                <li class="list-group-item">
                <b>IFSC<span style="margin-left: 200px;" ><?php echo $getuser['IFSC_CODE']; ?></span></b> 
                </li>
                <li class="list-group-item">
                <b>TOTAL AREA <span style="margin-left: 155px;"><?php echo $getuser2['PROPOSED_TOTAL_FLOOR_AREA']; ?></span></b>
                </li>
                <li class="list-group-item">
                <b>CARPET AREA GF <span style="margin-left: 120px;"><?php echo $getuser2['PROPOSED_G_FLOOR_AREA'];?></span></b>
                </li>
                <li class="list-group-item">
                <b>CARPET AREA FF <span style="margin-left: 120px;"><?php echo $getuser2['PROPOSED_F_FLOOR_AREA']; ?></span></b>
                </li>
                <li class="list-group-item">
                <b>AMOUNT<span style="margin-left: 185px;"><?php echo $_SESSION['amount'];  ?></span></b> 
                </li>

              </ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 20px;">
					<b>Geotagging Status :</b>
				</div>
			</div><br>
			<div class="footer text-center" >
				<b>OFFICE : BESIDE MAINTENANCE OFFICE,SECTOR 10,BHILAI,(C.G) PIN : 490006
                          <br>RESIDENCE: BHATT COLONY,MOHAN NAGAR,DURG,(C.G) PIN : 491001<br>
                                 CONTACT : 9630868978,9826607119,0788-2216777<br>
                          Email : nmnbhtt91@gmail.com</b>
			</div>
<div class="notesheet">

                 <div class="row"><br><span style="font-family: 'Kruti Dev 010', sans-serif;font-size: 30px;">
                    <center><b>uxj ikfyd fuxe fHkykbZ] ftyk &nqxZ-</b></center>
                    
                    <center><b><span style="font-size: 20px;">uksV'khV</span></b></center>
                    
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <span style="float: right;font-size: 18px;">
                                'kk[kk dk uke& iz/kkuea=h vkokl ;kstuk <br>
'kk[kk izHkkjh& श्री डीके वर्मा<br>
'kk[kk fyfid&   नितिन वैष्ण्व<br>
uLrh iath dza&        @iz-e-vk-;ks-@2022&23<br>

                            </span>
                        </div>
                        

                    </div>
            -------------------------------------------------------------------------------------------------------------------------------------------------------
                    <div class="row" style="margin: 2px;font-size: 18px;">
                    <div class="col-lg-2 col-md-2 col-xs-2">
            <b>fo"k;&   </b></div><div class="col-lg-10 col-md-10 col-xs-10"><span style="margin-left: 10px;"><span style="font-family: Calibri Light"><b>PMAY</b> </span><span style="font-family: 'Kruti Dev 010', sans-serif;">ds </span><span style="font-family: Calibri Light"><b>BLC </b></span></span>      <span style="font-family: 'Kruti Dev 010', sans-serif;font-size: 20px;">    ?kVd varxZr fgrxzkgh Jh@Jherh <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['NAME'].'</b></span>'; ?>                   firk@ifr dk uke <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['F_NAME'].'</b></span>'; ?> 
                okMZ dzekad <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['WARD_NO'].'</b></span>'; ?> okMZ dk uke----------------------------                                    }kjk fuekZ.k fd;s tk jgs vkokl gsrq  vuqnku jkf'k ds Hkqxrku fd;s tkus ckcr~A
         </span></div>
                    </div>
            -------------------------------------------------------------------------------------------------------------------------------------------------------
            <div class="row">
                
                <div class="col-lg-1 col-md-1 col-xs-1"></div>
                <div class="col-lg-9 col-md-9 col-xs-9" style="font-size: 18px;border-left: solid 2px;border-right: solid 2px;">
                              d`i;k izdj.k dk voyksdu djsaxsA bl dk;kZy; }kjk iznku dh xbZ Hkou vuqKk dz0-------------fnukad--------------------- ds vuqlkj okMZ dz  <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['WARD_NO'].'</b></span>'; ?> okMZ dk uke ------------------------------------ls Jh@Jherh  <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['NAME'].'</b></span>'; ?> firk@ifr Jh  <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['F_NAME'].'</b></span>'; ?> }kjk <span style="font-family: Calibri Light"><b>PMAY</b></span> ds <span style="font-family: Calibri Light"><b>BLC</b></span> ?kVd varxZr Lo;a }kjk vkokl fuekZ.k dk dk;Z izkjaHk fd;k x;k gSA ftldk lwph esa ljy uEcj-------------gSA vkokl fuekZ.k dk;Z ds fujh{k.k gsrq vf/kd``r okLrqfon@baftfu;j }kjk  dk;Z dk fujh{k.k izek.k i=  ,oa QksVksxzk¶l @ ft;ks Vsx dk dk;Z dk  izek.k i= izLrqr fd;k x;k gS  tks fd uLrh esa layXu gS A
izdj.k esa vc rd fdlh Hkh izdkj dk nLrkosth f'kdk;r@ fookn ugha gS A
fgrxzkgh o fuekZ.kk/khu vkokl dk fooj.k%&

    <table class="table-bordered" id="table1" style="width:100%">
        <tr>
            <td style="width: 23px;border-left: 2px;">1-</td>
            <td style="width: 265px;border-left: 2px;">fgrxzkgh dk uke</td>
            <td style="width: 398px;border-left: 2px;">Jh@Jherh <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['NAME'].'</b></span>'; ?></td>

        </tr>
        <tr>
            <td style="width: 23px;border-left: 2px;">2-</td>
            <td style="width: 265px;border-left: 2px;">ifr@firk dk uke</td>
            <td style="width: 398px;border-left: 2px;">Jh@Jherh <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['F_NAME'].'</b></span>'; ?></td>

        </tr>
        
        <tr>
            <td style="width: 23px;border-left: 2px;">3-</td>
            <td style="width: 265px;border-left: 2px;">vk/kkj dkMZ ua-</td>
            <td style="width: 398px;border-left: 2px;">&nbsp;&nbsp; <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['ADHAR_NO'].'</b></span>'; ?></td>

        </tr>
        <tr>
            <td style="width: 23px;border-left: 2px;">4-</td>
            <td style="width: 265px;border-left: 2px;">cSad [kkrk dz-</td>
            <td style="width: 398px;border-left: 2px;">&nbsp;&nbsp; <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['ACC_NO'].'</b></span>'; ?></td>

        </tr>
        <tr>
            <td style="width: 23px;border-left: 2px;">5-</td>
            <td style="width: 265px;border-left: 2px;">Lohd`r dkWjisV {ks=Qy</td>
            <td style="width: 398px;border-left: 2px;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-6">Hkwry &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    & <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['PROPOSED_G_FLOOR_AREA'].'</b></span>'; ?></div>
                    <div class="col-lg-6 col-md-6 col-xs-6">oxZehVj</div>

                    
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-6">izFke ry &nbsp;&nbsp; & <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['PROPOSED_F_FLOOR_AREA'].'</b></span>'; ?></div>
                    <div class="col-lg-6 col-md-6 col-xs-6">oxZehVj</div>

                    
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-6">dqy   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   & <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['PROPOSED_TOTAL_FLOOR_AREA'].'</b></span>'; ?></div>
                    <div class="col-lg-6 col-md-6 col-xs-6">oxZehVj</div>

                    
                </div>

            </td>

        </tr>
        <tr>
            <td style="width: 23px;border-left: 2px;">6-</td>
            <td style="width: 265px;border-left: 2px;">Lohd`r vuqnku jkf'k </td>
            <td style="width: 398px;border-left: 2px;">: <?php 

            $val = (floatval($getuser['STATE_SHARE'])+floatval($getuser['CENTRAL_GRANT']));
            echo '<span style="font-family: Calibri Light;"><b>'.$val.'</b></span>'; ?></td>

        </tr>
    </table><b>
    ;kstuk varxZr izkIr funsZ'kkuqlkj LFky ij fd;s tk jgs fuekZ.k dk;Z vuqlkj jkf'k x.kuk%& </b>

        <div class="row" style="margin: 3px;">
            
            <table class="table-bordered" id="table2" style="width:100%;margin-right: : 15px;">

                <tr>
                    <td style="width: 23px;">1-</td>
                    <td colspan="2"> Hkwry fufeZr dkWjisV {ks=Qy <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['PROPOSED_G_FLOOR_AREA'].'</b></span>'; ?> o-eh- <span style="font-family: Calibri Light">X</span> 10500 izfr oxZehVj ¾ : <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['COST_GFLOOR'].'</b></span>'; ?> </td>
                </tr>
                <tr>
                    <td style="width: 23px;">2-</td>
                    <td colspan="2">izFke ry fufeZr dkWjisV {ks=Qy <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['PROPOSED_F_FLOOR_AREA'].'</b></span>'; ?> o-eh- <span style="font-family: Calibri Light;font-size:15px;">X</span> 8500 izfr oxZehVj ¾ : <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['COST_FFLOOR'].'</b></span>'; ?></td>
                </tr>
                <tr>
                    <td style="width: 23px;">3-</td>
                    <td>dqy {ks=Qy <span style="font-family: Calibri Light">=</span> <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['PROPOSED_TOTAL_FLOOR_AREA'].'</b></span>'; ?> oxZehVj</td>
                    <td>fuekZ.k ykxr jkf'k         <span style="font-family: Calibri Light">=</span> : <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['COST_TOTAL'].'</b></span>'; ?></td>
                </tr>
                

            </table>
        </div>

        
         <span style="margin-left: 3px;font-size: 20px;"><b>vuqnku x.kuk&</b></span>

         <div class="row" style="margin: 5px;">

            <table class="table-bordered" style="width:100%">
                
                <tr>
                    <td colspan="2">1-  edku dk dqy ykxr jkf'k  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     & : 
                    <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['COST_TOTAL'].'</b></span>'; ?> </td>
                </tr>
                <tr>
                    <td colspan="2"> 2-  dsUnzka'k jkf'k :0         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      & : <b> 1]50]000</b></td>
                </tr>
                <tr>
                    <td colspan="2"> 3-  jkT;ka'k dz0 1 dk vf/kdre 25 izfr'kr jkf'k     & : <?php echo '<span style="font-family: Calibri Light;font-size:15px;"><b>'.$getuser2['STATE_SHARE'].'</b></span>'; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>dqy vuqnku jkf'k                & : <?php 

                    $actual = floatval($getuser['STATE_SHARE'])+floatval($getuser['CENTRAL_GRANT']);
                    $edited = floatval($getuser2['STATE_SHARE'])+floatval($getuser['CENTRAL_GRANT']);

                    $minimum_cost = min($actual,$edited);
                    
                    
                    echo '<span style="font-family: Calibri Light;font-size:18px;"><b>'.$minimum_cost.'</b></span>'; ?></td>
                </tr>
            </table>

            <span style="float: right;margin: 5px;font-size: 15px;"><b><u>vxys i`"B ij </u></b> </span>
            
            

         </div>

         <center><span style="font-size: 15px;font-family: Calibri">Page 1 of 2</span></center>
                </div>
                <div class="col-lg-2 col-md-2 col-xs-2"></div>
            </div>

            
            <div class="row"><br><span style="font-family: 'Kruti Dev 010', sans-serif;font-size: 30px;">
                    <center><h3><b>uxj ikfyd fuxe fHkykbZ] ftyk &nqxZ-</b></h3></center>
                    
                    <center><b><span style="font-size: 20px;">uksV'khV</span></b></center>
                    
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <span style="float: right;font-size: 20px;">
                                'kk[kk dk uke& iz/kkuea=h vkokl ;kstuk <br>
'kk[kk izHkkjh&<br>
'kk[kk fyfid&   ------------------------------<br>
uLrh iath dza&        @iz-e-vk-;ks-@2017&18<br>

                            </span>
                        </div>
                        

                    </div>
                -------------------------------------------------------------------------------------------------------------------------------------------------
                    <div class="row" style="margin: 3px;font-size: 18px;">
                    <div class="col-lg-2 col-md-2 col-xs-2">
            <b>&nbsp;&nbsp;&nbsp;&nbsp;fo"k;&   </b></div><div class="col-lg-10 col-md-10 col-xs-10"><span style="margin-left: 10px;"><span style="font-family: Calibri Light"><b>PMAY</b> </span><span style="font-family: 'Kruti Dev 010', sans-serif;">ds </span><span style="font-family: Calibri Light"><b>BLC</b> </span></span>      <span style="font-family: 'Kruti Dev 010', sans-serif;font-size: 20px;">    ?kVd varxZr fgrxzkgh Jh@Jherh <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['NAME'].'</b></span>'; ?>                   firk@ifr dk uke <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['F_NAME'].'</b></span>'; ?> 
                okMZ dzekad <?php echo '<span style="font-family: Calibri Light"><b>'.$getuser['WARD_NO'].'</b></span>'; ?> okMZ dk uke----------------------------                                    }kjk fuekZ.k fd;s tk jgs vkokl gsrq  vuqnku jkf'k ds Hkqxrku fd;s tkus ckcr~A
         </span></div>
                    </div>
            ---------------------------------------------------------------------------------------------------------------------------------------------------------
            <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-2"></div>
                <div class="col-lg-8 col-md-8 col-xs-8" style="border-left:solid black 2px;border-right:solid black 2px;height: 700px;">

                    <span style="font-size: 15px;"><b><u>iwoZ i`"B ls vkxs&</u></b></span><br>

                    <span style="margin-left: 18px;font-size: 20px;">fgrxzkgh dks pkj fdLrksa esa Hkqxrku fd;k tkuk gSA fd;s x;ss -------------------------rd ds fuekZ.kk/khu vkokl dk dk;Z iw.kZ dj fy;k x;k gSA ftlds vuqlkj Hkqxrku jkf'k fuEukuqlkj gS%&</span>
                    <br>
                    <br>
                    <br>
                    
                <span style="margin-left: 5px;font-size: 20px;">    vr% ----------------------------     fdLr dh jkf'k : <?php

                        if($_SESSION['amount']==''){

                            $amount_data = '----------------------------------------';
                        }
                        else {
                            $amount_data = $_SESSION['amount'];
                        }
                 echo '<span style="font-family: Calibri Light">'.$amount_data.'</span>'; ?> Hkqxrku dh Lohd``fr gsrq izLrqr gSA Hkqxrku <span style="font-family: Calibri Light">PFMS/RTGS/NEFT</span> ds ek/;e ls fd;k tkuk gS A</span>
                <br><br>
                <span style="margin-left: 5px;font-size: 20px;"><b>lgk;d vfHk;ark</b></span>
                <span style="float: right;font-size: 20px;"><b>mi vfHk;ark</b></span>


                    

                </div>
                <div class="col-lg-2 col-md-2 col-xs-2"></div>
                

            </div>
                 </span>
                 </div>

                 <center><span style="font-size: 15px;font-family: Calibri">Page 2 of 2</span></center>

            </div>

        </div>

		</div>
	</div>
</body>
</html>
<script>
function myFunction() {
	$.post("savebillfinal.php",function(data){
		
	});
  window.print();

}
function myFunctioncancel() {
    window.location="report.php";
}
function saveonly(){

	$.post("savebillfinal.php",function(data){

		$('#myModal').modal("show");
		
	});


}
</script>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body">
          <p><i class="fa fa-right"></i>Saved Succesfully !!!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
      
    </div>
  </div>

