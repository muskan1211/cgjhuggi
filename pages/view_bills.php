<?php
include('db.php');
	include 'header.php';
?>
<style>

table, th, td {
    border: 1px solid black;
}

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
           VIEW  BILL
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">VIEW  BILL</li>
          </ol>
        </section>

	        <!-- Main content -->
        <section class="content">
          <div class="box" >
			
          <div style=" width:100%; height:500px; overflow-y:scroll;padding-left: 5px;"><br>
      <table id="client_table" width="100%">
        <thead>
            <tr>
                <th>S.NO</th>
                <th style="width:45px;">Date</th>
                <th>Name</th>
                <th>Fathers Name</th>
                <th>Aadhar No</th>
                <th>Mobile No</th>
                <th>Address & Landmark</th>
                <th>Ward</th>
                <th>Type</th>
                <th>Paid Installment</th>
                <th>Amount Paid</th>
                </tr>
        </thead>
       
        <tbody>
       
            
             <?php  

        $query = "SELECT * FROM `tbl_client`,`tbl_bill` where tbl_client.DELETE_STATUS=0 AND tbl_client.ID=tbl_bill.USER_ID";
        $data = mysqli_query($conn,$query);
        $x=1;
        while($row=mysqli_fetch_array($data)){

        ?> 
			   <tr>
			          <td><?php echo $x; ?></td>
                <td><?php echo date('d-m-Y',strtotime($row['DATE'])); ?></td>
                <td><?php echo $row['NAME']; ?></td>
                <td><?php echo $row['F_NAME']; ?></td>
                <td><?php echo $row['ADHAR_NO']; ?></td>
                <td><?php echo $row['MOB_NO']; ?></td>
                <td><?php echo $row['ADDRESS']; ?></td>
                <td><?php echo $row['WARD_NO']; ?></td>
                <td><?php echo $row['NO_OF_INSTALLMENT']; ?></td>
                <td><?php echo $row['TO_BE_PAID_FOR']; ?></td>
                <td><?php echo $row['AMOUNT_PAID']; ?></td>
                
                
            </tr>
            <?php 
            $x++;
            } ?>
           
        </tbody>
         <tfoot>
              
        </tfoot>
		  </div>
    </table>
   
    <script type="text/javascript">
        function editRow(id){
            var id = id;
            $.post('getdetail.php',{id:id}, function(data) {
                alert(data);
            var obj =  $.parseJSON(data);
            $('#clientid').val(id);
            $('#uname').val(obj.NAME);
            $('#fname').val(obj.F_NAME);
            $('#gender').val(obj.GENDER);
            $('#caste').val(obj.CASTE);
            $('#religions').val(obj.RELIGION);
            $('#adhar').val(obj.ADHAR_NO);
            $('#bankname').val(obj.BANK_NAME);
            $('#accno').val(obj.ACC_NO);
            $('#ifsc').val(obj.IFSC_CODE);
            $('#address').val(obj.ADDRESS);
            $('#mob').val(obj.MOB_NO);
            $('#surveyid').val(obj.SURVEY_ID);
            $('#khasra').val(obj.KHASRA_NO);
            $('#landtype').val(obj.LAND_TYPE_USE);
            $('#plotarea').val(obj.PLOT_AREA);
            $('#roadwidth').val(obj.ROAD_WIDTH);
            $('#owner').val(obj.LAND_OWNER_TYPE);
            $('#exisinfracond').val(obj.EXISTING_INFRA_CONDITION);
            $('#exisinfracond1').val(obj.EXISTING_INFRA_CONDITION2);
            $('#toilet').val(obj.PUCCA_TOILET_AVAILAIBILITY);
            $('#Toilet_Draining').val(obj.PROPOSED_TOILET_DRAINING);
            $('#cgfloor').val(obj.PROPOSED_G_FLOOR_AREA);
            $('#cffloor').val(obj.PROPOSED_F_FLOOR_AREA);
            $('#ctotal').val(obj.PROPOSED_TOTAL_FLOOR_AREA);
            $('#gfloorcost').val(obj.COST_GFLOOR);
            $('#ffloorcost').val(obj.COST_FFLOOR);
            $('#floortotal').val(obj.COST_TOTAL);
            $('#centralgrant').val(obj.CENTRAL_GRANT);
            $('#stateshare').val(obj.STATE_SHARE);
            $('#beneficiaryshare').val(obj.BENEFICIARY_SHARE);
            $('#editModal').modal('show');
            
        });
      }
      function makeBill(id,name){
        var uid = id;
        var name=name;
        $('#billid').val(id);
        $('#UserName').val(name);

        $('#billmodal').modal('show');
      }

        
         
        }
         function submitform(){

            $.post('editEntry.php',$('#editentry').serialize(), function(data) {
     
          
     
           $('#editentry')[0].reset();
          $('#clientid').val('');  
      
          
          $("#client_table").load("viewentry.php #client_table"); 
           $('#editModal').modal('hide'); 
           
     
                    }).fail(function() {   
          alert('Unable to fetch data, please try again later.');
          });
           
         }
         function confirmdelete(id){

          var id = id;
          $('#delid').val(id);
          $('#confirmdelete').modal("show");

         }
         function delete1(){
          var id =  $('#delid').val();

          $.post('deleteEntry.php',{id:id}, function(data) {
     alert(data);
          $('#delid').val('');
          $('#confirmdelete').modal("hide");
          $("#client_table").load("viewentry.php #client_table");
     
                    }).fail(function() {   
          alert('Unable to fetch data, please try again later.');
          });


         }
    </script>
   
      
		
			
			
           
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog" style="width: 80%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Detail</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
                
                
              <form action="" id='editentry' method="post"> 
                <div class="row">
                <input type="hidden" id="clientid" name="clientid">
                    <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Name">Name:</label>
                      <input type="text" name="uname"  placeholder="Enter Name" class="form-control" id="uname">
                    </div>
                    <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Fathers Name">Fathers Name:</label>
        <input type="text" name="fname"  placeholder="Enter Fathers Name" class="form-control" id="fname">
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
                     <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="IFSC CODE">IFSC CODE:</label>
                      <input type="text" name="ifsc"  placeholder="IFSC CODE" class="form-control" id="ifsc">
                    </div>
                     <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="1">Address & Landmark :</label>
                      <textarea  placeholder="" rows="2" cols="37" class="form-control" id="address" name="address">
                      </textarea>
                    </div>
                     <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Mobile No.">Mobile No.:</label>
                      <input type="text" name="mob"  placeholder="Enter Mobile No." class="form-control" id="mob">
                    </div>
                    
                     <div class=" form-group col-xs-12 col-sm-3">
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
                      <input type="number" name="centralgrant"  placeholder="Central Grant" class="form-control" id="centralgrant">
                    </div>
                     <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="State share">State share@25% of construction cost:</label>
                      <input type="number" name="stateshare"  placeholder="State share" class="form-control" id="stateshare">
                    </div>
                     <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="Beneficiary Share    ">Beneficiary Share    :</label>
                      <input type="number" name="beneficiaryshare"  placeholder="Beneficiary Share    " class="form-control" id="beneficiaryshare">
                    </div>
          <br>
           <div class=" form-group col-xs-2">
                       <center><input type="reset" name="submitreset" class="btn btn-warning pull-left" id="submitreset" value="Reset" >
                      <label  name="submitbtn" class="btn btn-primary pull-right" id="submitbtn" value="Submit" onclick="submitform()">Update</label>
                    </center></div>
                </div></div>
              </form>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
<div class="modal fade" id="confirmdelete" role="dialog">
    <div class="modal-dialog" style="width: 20%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
          <div class="box-body">
              <br><br>
         <span style="margin-left: 5px;"> Are you sure to delete ??</span><br><br>
         <center><button onclick="delete1()" class="btn btn-default">YES</button>&nbsp;&nbsp;
         <button type="button" class="btn btn-default" data-dismiss="modal">NO</button></center>
          <input type="hidden" name="delid" id="delid">
                
                
        </div>
        </div>
        
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="billmodal" role="dialog">
    <div class="modal-dialog" style="width: 20%;">
    
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bill</h4>
      </div>
        
        <div class="modal-body">
          <div class="box-body">
              <br><br>
              <form id="billForm" method="post">
             <input type="hidden" name="billid" id="billid">
              <div class="form-group ">
       <input type="text" class="form-control" name="username" id="UserName" >

       
     </div>
     <div class="form-group ">
       <select class="form-control" name="installmentno" id="installmentno">
         <option value="0">Select</option>
         <option value="4">G-Floor</option>
         <option value="6">G+1</option>
       </select>
       
       <script type="text/javascript">
         $('#installmentno').on("change",function(){

          var i = parseInt($('#installmentno').val());

           if(i==4){

            var str = '<option value="0">Select</option><option value="DISMANTLED">DISMANTLED</option><option value="LINTEL">LINTEL</option><option value="SLAB">SLAB</option><option value="COMPLETION">COMPLETION</option>';

            $('#installmenttype').empty().append(str);


          }
          else if(i==6) {

              var str = '<option value="0">Select</option><option value="G-FLOOR-DISMANTLED">G-FLOOR-DISMANTLED</option><option value="GFLOOR_LINTEL">GFLOOR_LINTEL</option><option value="GFLOOR_SLAB">GFLOOR_SLAB</option><option value="FFLOOR_LINTEL">FFLOOR_LINTEL</option><option value="FFLOOR_SLAB">FFLOOR_SLAB</option><option value="COMPLETION">COMPLETION</option>';

            $('#installmenttype').empty().append(str); 


          }

         

           

         });
          
       </script>
     </div>
     <div class="form-group">
       <select class="form-control" id="installmenttype" name="installmenttype">
         
         
       </select>
       
       
     </div>
     <div class="form-group ">
       <label onclick="addinstallment()" class="btn btn-info">ADD</button>
       
       
     </div>
     <script type="text/javascript">
       function addinstallment(){
        var ins1 = $('#installment').val();
        var ins2 = $('#installmenttype').val();
            if(ins2!=0){
          if(ins1!=''){
       $('#installmenttype option[value=0]').attr('selected','selected');
        var ins3 = ins1+','+ins2;
        $('#installment').val(ins3);
        
    

              }
              else{

                var ins3 = ins2;
                $('#installment').val(ins3);
   $('#installmenttype option[value=0]').attr('selected','selected');

              }
      }
      else
      {
        alert("Please choose appropriate option");
       }
      }
      function createBill(){

        
         $.post('savebill.php?add=' + 1,$('#billForm').serialize(), function(data) {
            
            
            $('#billmodal').modal('hide');
            $('#billForm')[0].reset();
            var id= data;
            window.location = 'bill.php?id='+id;
            
          
                    }).fail(function() {   

          alert('Unable to fetch data, please try again later.');
          });
               
                } 
      
     </script>
     <div class="form-group ">
       <input type="text" class="form-control" name="installment" id="installment">
       
       
     </div>
      <div class="form-group ">
       <input type="text" class="form-control" name="amount" id="amount">
       
       
     </div>
     <label class="btn btn-info" onclick="createBill()">Create Bill</label>
     
       
       </form>
                
                
        </div>
        </div>
        
      </div>
      
    </div>
  </div>
<?php include('footer.php');
?>
    <script>
		$('.sdate').datepicker();
    </script>
 <script>	
$('table').DataTable();
 </script>
 <script>
 $(document).ready(function() {
    var eventFired = function ( type ) {
        var n = $('#demo_info')[0];
        n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
        n.scrollTop = n.scrollHeight;      
    }
 
    $('#example')
        .on( 'order.dt',  function () { eventFired( 'Order' ); } )
        .on( 'search.dt', function () { eventFired( 'Search' ); } )
        .on( 'page.dt',   function () { eventFired( 'Page' ); } )
        .DataTable();
} );
</script>