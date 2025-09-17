<?php
include('db.php');
	include 'header.php';
?>
<style>
#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
		
	}
	
	
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add New
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">  ADD NEW </li>
          </ol>
        </section>

	        <!-- Main content -->
        <section class="content">
          <div class="box" >
			<div class='box-header'>
				<h3>General</h3>
			</div>
            <div class="box-body">
				
				
              <form action="" id='addnewentry' method="post"> 
                <div class="row">
                    <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Name">Name:</label>
                      <input type="text" name="uname"  placeholder="Enter Name" class="form-control" id="name">
                    </div>
					<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Fathers Name">Fathers Name:</label>
                      <input type="text" name="fname"  placeholder="Enter Fathers Name" class="form-control">
                    </div>
					<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Gender">Gender:</label>
                     <select class="form-control" id="gender" name="gender">
					     <option value="0">Select</option>
						<option value="MALE">Male</option>
						<option value="FEMALE">Female</option>
						<option value="TRANSGENDER">Transgender</option>
					  </select>
                    </div>
					
						<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Caste">Caste:</label>
                     <select class="form-control" id="caste" name="caste">
					     <option value="0">Select</option>
						<option value="GENERAL">General</option>
						<option value="OBC">OBC</option>
						<option value="SC">SC</option>
						<option value="ST">ST</option>
					  </select>
                    </div>
						<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Religions">Religion:</label>
                     <select class="form-control" id="religions" name="religion">
					     <option value="0">Select</option>
						<option value="HINDU">Hindu</option>
						<option value="MUSLIM">Muslim</option>
						<option value="SIKH">Sikh</option>
						<option value="OTHERS">Others</option>
					  </select>
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Aadhar No.">Aadhar No.:</label>
                      <input type="text" name="adhar"  placeholder="Enter Aadhar No." class="form-control" id="adhar">
                    </div>
					<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Name of Bank">Name of Bank:</label>
                      <input type="text"  placeholder="Name of Bank" class="form-control" id="bankname" name="bankname">
                    </div>
					
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Bank Account Number">Bank Account Number:</label>
                      <input type="text" name="accno"  placeholder="Bank Account Number" class="form-control" id="accno">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-2">
                      <label class="control-label" for="IFSC CODE">IFSC CODE:</label>
                      <input type="text" name="ifsc"  placeholder="IFSC CODE" class="form-control" id="ifsc">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="1">Address & Landmark :</label>
                      <textarea  placeholder="" rows="2" cols="37" class="form-control" id="address" name="address">
					  </textarea>
                    </div>
                     <div class=" form-group col-xs-12 col-sm-1">
                      <label class="control-label" for="1">Ward No</label>
                      <input type="text"  placeholder="Ward No" rows="2" cols="37" class="form-control" id="wardno" name="wardno">
            </textarea>
                    </div>
					 <div class=" form-group col-xs-12 col-sm-2">
                      <label class="control-label" for="Mobile No.">Mobile No.:</label>
                      <input type="text" name="mob"  placeholder="Enter Mobile No." class="form-control" id="mob">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-2">
                      <label class="control-label" for="City">City:</label>
                       <select class="form-control" id="city" name="city">
					     <option value="0">Select</option>
						<option value="Durg">Durg</option>
						<option value="Bhilai">Bhilai</option>
						<option value="Dongargarh">Dongargarh</option>
						
					  </select>
                    </div>
					
					 <div class=" form-group col-xs-12 col-sm-2">
                      <label class="control-label" for="Survey ID.">Survey ID.:</label>
                      <input type="text" name="surveyid"  placeholder="Survey ID." class="form-control" id="surveyid">
                    </div>
					</div>
					 <div class="row">
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Khasra No.">Khasra No.:</label>
                      <input type="text" name="khasra"  placeholder="Khasra No." class="form-control" id="khasra">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Type Of Land Use.">Type Of Land Use.:</label>
                      <input type="text" name="landtype"  placeholder="Type Of Land Use." class="form-control" id="landtype">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Plot Area(Sq.Mt)">Plot Area(Sq.Mt):</label>
                      <input type="number" name="plotarea"  placeholder="Plot Area(Sq.Mt)" class="form-control" id="plotarea">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Existing Road Width Infront Of Plot">Existing Road Width Infront Of Plot:</label>
                      <input type="number" name="roadwidth"  placeholder="Existing Road Width Infront Of Plot" class="form-control" id="roadwidth">
                    </div>
						<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Type Of Land Ownership">Type Of Land Ownership:</label>
                     <select class="form-control" id="owner" name="owner">
					     <option value="0">Select</option>
						<option value="PATTA">Patta</option>
						<option value="RESTRY">Restry</option>
						<option value="AWADI">Awadi</option>
						<option value="OTHERS">Others</option>
					  </select>
                    </div>
						<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Existing Infra Condition">Existing Infra Condition:</label>
                     <select class="form-control" id="exisinfracond" name="exisinfracond">
					     <option value="0">Select</option>
						<option value="PUCCA">Pucca</option>
						<option value="HALF PUCCA">Half Pucca</option>
						<option value="KUCCHA">kuccha</option>
						<option value="OTHERS">Others</option>
					  </select>
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Existing Infra Condition:">Existing Infra Condition:</label>
                      <input type="text" name="exisinfracond1"  placeholder="Existing Infra Condition:" class="form-control" id="exisinfracond1">
                    </div>
						<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Availability Of Pucca Toilet">Availability Of Pucca Toilet:</label>
                     <select class="form-control" id="toilet" name="toilet">
					     <option value="0">Select</option>
						<option value="YES">Yes</option>
						<option value="NO">No</option>
						
					  </select>
                    </div>
						<div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Toilet Proposed In Draining">Toilet Proposed In Draining:</label>
                     <select class="form-control" id="Toilet_Draining" name="Toilet_Draining">
					  <option value="0">Select</option>
            <option value="YES">Yes</option>
            <option value="NO">No</option>
						
					  </select>
                    </div>
					</div>
					 <div class="box">
            <div class='box-header'>
				<h3>Proposed Carpet Area (Sq.Mt.)</h3>
			
	 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Ground Floor">Ground Floor:</label>
                      <input type="number" name="cgfloor"  placeholder="Ground Floor" class="form-control" id="cgfloor">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="First Floor">First Floor:</label>
                      <input type="number" name="cffloor"  placeholder="First Floor" class="form-control" id="cffloor">
                    </div>
                    <script type="text/javascript">
                      $('#cffloor').on("change",function(){
                        var g = parseInt($('#cgfloor').val());
                        document.getElementById('gfloorcost').value=(g*10500);
                        var f = parseInt($('#cffloor').val());
                        document.getElementById('ffloorcost').value=(f*8500);
                        document.getElementById('ctotal').value=(g+f);
                         var g1 = parseInt($('#gfloorcost').val());
                        var f1 = parseInt($('#ffloorcost').val());
                        document.getElementById('floortotal').value=(g1+f1);
                        var t = parseInt($('#floortotal').val());
                        var cal = (0.25)*t;
                        document.getElementById('stateshare').value=(cal);
                        var g2 = 150000-cal;
                        document.getElementById('beneficiaryshare').value=(g2);



                      });
                    </script>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Total">Total:</label>
                      <input type="number" name="ctotal"  placeholder="Total" class="form-control" id="ctotal">
                    </div>
          </div></div>
				
									 <div class="box">
            <div class='box-header'>
				<h3>Proposed cost of Construction (Rs. In Lakh)</h3>
			
	                   <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="Ground Floor">Ground Floor Amount @ 10500/sqm:</label>
                      <input type="number"  placeholder="Ground Floor" class="form-control" name="gfloorcost" id="gfloorcost">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="First Floor">First Floor Amount @ 8500/sqm:</label>
                      <input type="number" name="ffloorcost"  placeholder="First Floor" class="form-control" id="ffloorcost">
                    </div>
                    
					 <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="Total">Total:</label>
                      <input type="number" name="floortotal"  placeholder="Total" class="form-control" id="floortotal">
                    </div>
					
					   <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="Central Grant">Central Grant (In Lakhs):</label>
                      <input type="number" name="centralgrant"  placeholder="Central Grant" class="form-control" id="centralgrant" value="150000">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="State share">State share@25% of construction cost:</label>
                      <input type="number" name="stateshare"  placeholder="State share" class="form-control" id="stateshare"
                      >
                    </div>
					 <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="Beneficiary Share    ">Beneficiary Share    :</label>
                      <input type="number" name="beneficiaryshare"  placeholder="Beneficiary Share    " class="form-control" id="beneficiaryshare">
                    </div>
          <br>
		  	<center><div class=" form-group col-xs-2">
                      <input type="reset" name="submitreset" class="btn btn-warning pull-left" id="submitreset" value="Reset" >
					  <label  name="submitbtn" class="btn btn-primary pull-right" id="submitbtn" value="Submit" onclick="submitform()">Submit</label>
                    </div></center>
				</div></div>
              </form>
            </div>
          </div>
		
			
			
           
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php');
?>
    <script>
		$('.sdate').datepicker();

   
function submitform(){
   
       
          $.post('addnewentry_proc.php?add=' + 1,$('#addnewentry').serialize(), function(data) {
            

            alert(data);
          
                    }).fail(function() {   

          alert('Unable to fetch data, please try again later.');
          });
               
                } 
      
  
    </script>
	
