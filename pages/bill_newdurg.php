<?php session_start();
 include 'db.php';

  $id = $_GET['id'];


$query1 = "SELECT * FROM `tbl_client` WHERE  ID=$id";

$data1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
$getuser = mysqli_fetch_array($data1);


 $date=date('d-m-y'); ?>
<!doctype html>
<script>
function myFunction() {
	$.post("savebillfinal.php",function(data){
		
	});
  window.print();

}
function myFunctioncancel() {
    window.location="report.php";
}
</script>
<html>
<head>

 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.text-danger strong {
    		color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #CCCCCC;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 10px 10px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.72857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 15px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
</style>
</head>
<body>
<div class="container" style="padding: 0px;margin: 0px;">
	<div class="row" id="printdiv" style="padding: 0px;margin: 0px;">
		
        <div class="receipt-main col-xs-12 col-sm-12 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row" style="margin-left: 0px;">
            
    			<div class="receipt-header">
    			<div class="receipt-center" style="text-align: center; ">
	<h2><b><?php echo $_SESSION['owner']; ?></b></h2>
<h5>
<p>CONSULTANT DURG&nbsp;&nbsp;BHILAI MUNICIPAL CORPORATION<br><div style="text-align: center;">
<span style="text-align:center;">REGISTERED CIVIL ENGINEER PUBLIC WORKS DEPARTMENT,WATER RESOURCES DEPARTMENT<br><br>
STRUCTURE REPAIR REHABILATION,WATER PROOFING SYSTEMS,SELANTS FLOORINGS & MATERIALS</span></div></p></h5>
						</div><br>
						<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-left">
				
                <p>To.<br>THE NODAL OFFICER<br>PRADHAN MANTRI AAWAS YOJNA<br>DURG MUNICIPAL CORPORATION,DURG

</p>
           
							
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						 Date:- <?php echo date('d-m-Y'); ?>
					</div></div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 text-left">
							Subject:-&nbsp;&nbsp;&nbsp;Beneficiary Bill cum Progress report/certificate under  <b>Mor Jamin - Mor
                        Makan</b>" BLC-HFA Scheme.
						</div>
						
					</div><br>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							 Reference :-Bhawan Anugya No. .......
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4">
						 Date:- __________ 
					</div>
					</div>
					
					
				<br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            With above ref & subject the underconstruction residential house &nbsp;&nbsp;<b><?php echo $_SESSION['installment']; ?></b>
&nbsp;&nbsp;level as the site has been supervised<br><br>
</div><b>
            <!-- Content --><br><br>
          <div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							NAME OF BENEFICIARY:
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
					<?php echo $getuser['NAME']; ?> 
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							FATHER/HUSBAND NAME
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['F_NAME']; ?> 
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							AADHAR NO
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['ADHAR_NO']; ?> 
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						MOBILE NO
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
					 <?php echo $getuser['MOB_NO']; ?> 
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							ADDRESS
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
					<?php echo $getuser['ADDRESS']; ?> 
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							WARD NO
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['WARD_NO']; ?> 
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							BANK NAME
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['BANK_NAME']; ?>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
					ACCOUNT NO
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['ACC_NO']; ?>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							IFSC
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['IFSC_CODE']; ?>  					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							TOTAL AREA
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['PROPOSED_TOTAL_FLOOR_AREA']; ?>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							CARPET AREA GF
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['PROPOSED_G_FLOOR_AREA']; ?>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						CARPET AREA FF
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $getuser['PROPOSED_F_FLOOR_AREA']; ?>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
							AMOUNT
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<?php echo $_SESSION['amount']; ?>
					</div>
					</div>
				</b>
            <!-- End of Content-->
            <br>
            <div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<b>Geotagging Status</b>
						</div>
						
					</div>
					

			<br><br><div class="well" style="border-radius: 0px; padding-top: 0px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px;     margin-bottom: 5px;" >
			<div class="row">
     <div class="receipt-header receipt-header-mid" style=" margin-bottom: 0px;margin-top: 0px;">

					
			</div>
			
        
			
			<div class="row" style="text-align: center;">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-12 col-sm-12 col-md-12 text-center" >
						<b>OFFICE : BESIDE MAINTENANCE OFFICE,SECTOR 10,BHILAI,(C.G) PIN : 490006
                          <br>RESIDENCE: BHATT COLONY,MOHAN NAGAR,DURG,(C.G) PIN : 491001<br>
                                 CONTACT : 9630868978,9826607119,0788-2216777<br>
                          Email : nmnbhtt91@gmail.com</b>
					</div>
					
				</div>
            </div>
			
        </div>    
	</div>
</div></p></div></BR></b></h4></div></div></div></div></div></div>
</body>
</html>
<div class="ididid">
<button onclick="myFunction()" style="border: 1px solid white;height: 75px;width: 100px;background: #81b7af;color: white;    position: absolute;
     top: 54px;
    left: 10px;" >PRINT</button>
	<button onclick="myFunctioncancel()" style="border: 1px solid white;height: 75px;width: 100px;background: #81b7af;color: white;  position: absolute;
     top: 54px;
    left: 130px;">BACK</button>
</div>
<style>
	
@media print {
   .ididid {
       display: none;
    }
    #printdiv {

    	margin-right: : 10px;
    	padding: 0px;
    }
    .container {

    	margin: 0px;
    	padding: 0px;

    }

   
}
</style>






		  