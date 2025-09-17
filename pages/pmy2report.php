<?php include 'header.php';

unset($_SESSION['owner']);
unset($_SESSION['billid']);
unset($_SESSION['installmentno']);
unset($_SESSION['installment']);
unset($_SESSION['amount']);
   include('db.php');
	
  if(isset($_SESSION['billid'])){
    $userid = $_SESSION['billid'];
  }
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
           VIEW  DATA
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">  VIEW DATA </li>
          </ol>
        </section>

	        <!-- Main content -->
        <section class="content">
          <div class="box" >
          <br>
          <div class="row" style="margin-left: 50px;">
          <form id="report" method="post">
          <div class="col-lg-4">
          <select id="cities" name="cities">
          <option value="0">Select</option>
          <?php 

     $cityquery = "SELECT DISTINCT(CITY) as CITY FROM `tbl_client_pmy2`";
           $citydata = mysqli_query($conn,$cityquery);
           while($getcity=mysqli_fetch_array($citydata)) {
          ?>
        <option value="<?php echo $getcity['CITY']; ?>"><?php echo $getcity['CITY'];?></option>


             <?php } ?> 
            </select>
            <script type="text/javascript">
              $('#cities').on("change",function(){
                var city = $('#cities').val();
                if(city!=0) {
                 $.post('getward_pmy2.php',{city:city}, function(data) {
             
            
                   $('#wards').empty().append(data);
            
          
                    }).fail(function() {   
                

          alert('Unable to fetch data, please try again later.');
            
            });
                  }
       
              });
            </script>
          </div>
           <div class="col-lg-4">

           <select id="wards" name="wards">
              
            </select>
             
           </div>
            <div class="col-lg-4">
              <button type="submit">GET</button>
            </div>
            </form>
          </div>
          <br><br><br>
			
          <div style=" width:100%; height:500px; overflow-y:scroll;padding-left: 5px;"><br>
      <table id="client_table" width="100%">
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
                <th>Address</th>
                <th>Ward</th>
                <th>City</th>
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
                 <th colspan="3">Proposed Carpet Area(sq.mt)</th>
                 <th colspan="3">Proposed Cost of Construction</th>
				 <th>Central Grant :</th>
                <th>State share@25% </th>
                <th>Beneficiary Share (In Lakhs):</th>
                <th>Edit</th>
                <th>Bill</th>
                <th>Delete</th>
                
            </tr>
       
       
            <tr>
			    <th></th>
               <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
				<th></th>
               <th></th>
                <th></th>
                <th></th>
                <th></th>
               <th></th>
				<th></th>
                <th></th>
                <th></th>
               <th></th>
                <th></th>
                <th></th>
				<th></th>
                
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Ground Floor</th>
                <th>First Floor</th>
                <th>Total</th>
                <th>Ground Floor Amt(10500/sqm)</th>
                <th>First Floor Amt(8500/sqm)</th>
                <th>Total</th>
              <th></th>
                <th></th>
               <th></th>
               <th></th>
                <td></td>
                <th></th>

            </tr>
             </thead>
       
        <tbody id="client_tablebody">
             
            <!--  Append data via JS code using id-->
           
        </tbody>
         <tfoot>
              
        </tfoot>
		  </div>
    </table>
   
    <script type="text/javascript">
        function editRow(id){
            var id = id;
            $.post('getdetail_pmy2.php',{id:id}, function(data) {
              
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
      function makeBill(id,name) {


      var uid = id;
        var name=name;
        $.post('getbill_pmy2.php',{id:uid}, function(data) {

          
          $('#instdone').empty().val(data);
     
     
                    }).fail(function() {   
          alert('Unable to fetch data, please try again later.');
          });

       
        $('#billid').val(id);
        $('#UserName').val(name);

        $('#billmodal').modal('show');
      }

        function exporttable(){

        	$("client_table").table2excel();

          $.post("exportfile.php",function(data){
            //alert(data);

             // $(data).tableToCSV();
             


          });
         
        }
         function submitform(){

            $.post('editEntry_pmy2.php',$('#editentry').serialize(), function(data) {
     
          alert(data);
     
           $('#editentry')[0].reset();
          $('#clientid').val('');  
      
          
          $("#client_table").load("viewentry_pmy2.php #client_table"); 
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

          $.post('deleteEntry_pmy2.php',{id:id}, function(data) {
     alert(data);
          $('#delid').val('');
          $('#confirmdelete').modal("hide");
    
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
                     <input type="text" class="form-control" id="gender" name="gender">
                        
                    </div>
                    
                        <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Caste">Caste:</label>
                     <input type="text" class="form-control" id="caste" name="caste">
                        
                    </div>
                        <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Religions">Religion:</label>
                     <input type="text" class="form-control" id="religions" name="religion">
                         
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
                      
        <input type="text" name="khasra"  placeholder="Khasra No" class="form-control" id="khasra">
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
                     <input type="text" class="form-control" id="owner" name="owner">
                         
                    </div>
                        <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Existing Infra Condition">Existing Infra Condition:</label>
                     <input type="text" class="form-control" id="exisinfracond" name="exisinfracond" value="">
                        </div>
                     <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Existing Infra Condition:">Existing Infra Condition:</label>
                      <input type="text" name="exisinfracond1"  placeholder="Existing Infra Condition:" class="form-control" id="exisinfracond1" value="">
                    </div>
                        <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Availability Of Pucca Toilet">Availability Of Pucca Toilet:</label>
                     <input type="text" class="form-control" id="toilet" name="toilet" value="kjxbncuasxuiasbiu">
                         
                    </div>
                        <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="Toilet Proposed In Draining">Toilet Proposed In Draining:</label>
                     <input type="text" class="form-control" id="Toilet_Draining" name="Toilet_Draining">
                      
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
             
              <form id="billForm" method="post">
             <input type="hidden" name="billid" id="billid">
             <div class="form-group ">
             <label>Payment done for</label><br>
       <input type="text" class="form-control" name="instdone" id="instdone" >

       
     </div>
              <div class="form-group ">
       <input type="text" class="form-control" name="username" id="UserName" >

       
     </div>
     <div class="form-group ">
       <select class="form-control" name="installmentno" id="installmentno" style="margin-bottom: 10px;">
         <option value="0">Select Floor</option>
         <option value="4">G-Floor</option>
         <option value="6">G+1</option>
       </select>

        <div class="form-group">
       <select class="form-control" id="installmenttype" name="installmenttype">
         
         
       </select>
       
       
     </div>
       
       <script type="text/javascript">
         $('#installmentno').on("change",function(){

          var i = parseInt($('#installmentno').val());

           if(i==4){

            var str = '<option value="0">Select Description</option><option value="DISMANTLED/PLINTH">DISMANTLED/PLINTH</option><option value="LINTEL">LINTEL</option><option value="SLAB">SLAB</option><option value="COMPLETION">COMPLETION</option>';

            $('#installmenttype').empty().append(str);


          }
          else if(i==6) {

              var str = '<option value="0">Select Floor</option><option value="DISMANTLED/PLINTH">DISMANTLED/PLINTH</option><option value="GFLOOR_LINTEL">GFLOOR_LINTEL</option><option value="GFLOOR_SLAB">GFLOOR_SSLAB</option><option value="FFLOOR_LINTEL">FFLOOR_LINTEL</option><option value="FFLOOR_SLAB">FFLOOR_SLAB</option><option value="COMPLETION">COMPLETION</option>';

            $('#installmenttype').empty().append(str); 


          }

        });

           $('#installmenttype').on("change",function(){

          var i = $('#installmenttype').val();
          var amount = 0;

          switch(i) {
            case 'DISMANTLED/PLINTH' : amount = 63000; break;
            case 'LINTEL' : amount = 87000; break;
            case 'SLAB' : amount = 65000; break;
            case 'COMPLETION' : amount = 35000; break;
          }

          $('#amount').val(amount);
           

         });
          
       </script>
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

        
         $.post('savebill_pmy2.php?add=' + 1,$('#billForm').serialize(), function(data) {
          
          var obj = $.parseJSON(data);
          
           var id  = $('#billid').val();
      
           var city = obj.CITY;
            
           $('#billmodal').modal('hide');
           window.location = 'bill_pmy2.php?id='+id;
          
            }).fail(function() {   
          
          

          alert('Unable to fetch data, please try again later.');
          });
               
                } 
      
     </script>
     <div class="form-group ">
       <input type="text" class="form-control" name="installment" id="installment" placeholder="Description">
       
       
     </div>
 <div class="form-group">
       <select class="form-control" id="owner" name="owner">

         <option value="0">SELECT USER</option>
         <option value="NAMAN BHATT & ASSOCIATES">NAMAN BHATT & ASSOCIATES</option>
         <option value="AVINASH JAIN">AVINASH JAIN</option>
         <option value="SOPAN JAIN">SOPAN JAIN</option>
         
         
       </select>
       
       
     </div>
      <div class="form-group ">
       <input type="text" class="form-control" name="amount" id="amount" placeholder="AMOUNT">
       
       
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

 </script>
 <script>
 $(document).ready(function() {
    var eventFired = function ( type ) {
        var n = $('#demo_info')[0];
        n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
        n.scrollTop = n.scrollHeight;      
    }
    $("#report").on("submit", function(event) {
            event.preventDefault(); 
      
       $.post('getfilterdata_pmy2.php',$(this).serialize(), function(data) {
     
   
         
        $("#client_tablebody").empty().append(data);
        $('#client_table').DataTable();

                    }).fail(function() {   
          alert('Unable to fetch data, please try again later.');
          });
                  });
 
    $('#example')
        .on( 'order.dt',  function () { eventFired( 'Order' ); } )
        .on( 'search.dt', function () { eventFired( 'Search' ); } )
        .on( 'page.dt',   function () { eventFired( 'Page' ); } )
        .DataTable();
} );
</script>