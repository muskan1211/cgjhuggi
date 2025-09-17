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
				<h3>ADD NEW ENTRY</h3>
			</div>
            <div class="box-body">
				
				
              <form action="" id='addnewentry' method="post"> 
                <div class="row">
                    <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="1">1 :</label>
                      <input type="text" name="1"  placeholder="1" class="form-control" id="1">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="2">2 :</label>
                      <input type="text" name="2"  placeholder="2" class="form-control" id="2">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="3">3 :</label>
                      <input type="text" name="3"  placeholder="3" class="form-control" id="3">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="4">4 :</label>
                      <input type="text" name="4"  placeholder="4" class="form-control" id="4">
                    </div>
					
					
					  <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="1">1 :</label>
                      <input type="text" name="1"  placeholder="1" class="form-control" id="1">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="2">2 :</label>
                      <input type="text" name="2"  placeholder="2" class="form-control" id="2">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="3">3 :</label>
                      <input type="text" name="3"  placeholder="3" class="form-control" id="3">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="4">4 :</label>
                      <input type="text" name="4"  placeholder="4" class="form-control" id="4">
                    </div>
					
					
					  <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="1">1 :</label>
                      <input type="text" name="1"  placeholder="1" class="form-control" id="1">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="2">2 :</label>
                      <input type="text" name="2"  placeholder="2" class="form-control" id="2">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="3">3 :</label>
                      <input type="text" name="3"  placeholder="3" class="form-control" id="3">
                    </div>
					 <div class=" form-group col-xs-12 col-sm-3">
                      <label class="control-label" for="4">4 :</label>
                      <input type="text" name="4"  placeholder="4" class="form-control" id="4">
                    </div>
					
					
					<div class=" form-group col-xs-12 text-center">
                      <input type="reset" name="submitreset" class="btn btn-warning pull-left" id="submitreset" value="Reset" >
					  <input type="submit" name="submitbtn" class="btn btn-primary pull-right" id="submitbtn" value="Submit" >
                    </div>
				</div>
				
              </form>
            </div>
          </div>
		
			
			
           
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php');
?>
    <script>
		$('.sdate').datepicker();
    </script>
	
