<?php
include('db.php');
$msg = '';
$successmsg = '';
$msg1= '';
$successmsg1 = '';
$msg2= '';
$successmsg2 = '';
if(isset($_POST['submitbtn'])){
	$valdata = 0;
	if(isset($_POST['usrname'])&&$_POST['usrname']!=""){
		$usrname = testdata($_POST['usrname']);
		$valdata ++;
	}else{
		$valdata = 0;
		$msg .= 'Please Enter Valid Username';
	}
	if(isset($_POST['usrname1'])&&$_POST['usrname1']!=""){
		$usrname1 = testdata($_POST['usrname1']);
		$valdata ++;
	}else{
		$valdata = 0;
		$msg .= 'Please Confirm Username';
	}
	if(isset($_POST['pass1'])&&$_POST['pass1']!=""){
		$pass1 = testdata($_POST['pass1']);
		$valdata ++;
	}else{
		$valdata = 0;
		$msg .= 'Please Enter Valid Password';
	}
	if($valdata==3 && $usrname === $usrname1){
		$qry1 = "update `capitalusers` set `username`='$usrname' where `password`='$pass1'";
		$result=$conn->query($qry1);
		if($conn->error){
			$msg .= 'Please Try After Some Time';
		}else{
			$successmsg= "Username Changed Successfully";
		}
	}
}
if(isset($_POST['submitbtn1'])){
	$valdata1 = 0;
	if(isset($_POST['usrname2'])&&$_POST['usrname2']!=""){
		$usrname2 = testdata($_POST['usrname2']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg1 .= 'Please Enter Username';
	}
	if(isset($_POST['op'])&&$_POST['op']!=""){
		$op = testdata($_POST['op']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg1 .= 'Please Enter Old Password';
	}
	if(isset($_POST['np'])&&$_POST['np']!=""){
		$np = testdata($_POST['np']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg1 .= 'Please Enter New Password';
	}
	
	if(isset($_POST['np1'])&&$_POST['np1']!=""){
		$np1 = testdata($_POST['np1']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg1 .= 'Please Enter Confirm Password';
	}
	
	if($valdata1==4 && $np1 == $np){
		$qry1 = "update `capitalusers` set `password`='$np' where `password`='$op' and `username`='$usrname2'";
		$result=$conn->query($qry1);
		if($conn->error){
			$msg1 .= 'Please Try After Some Time';
		}else{
			$successmsg1= "Password Changed Successfully";
		}
	}
}
if(isset($_POST['submitbtn2'])){
	$valdata1 = 0;
	if(isset($_POST['usrname3'])&&$_POST['usrname3']!=""){
		$usrname3 = testdata($_POST['usrname3']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg2 .= 'Please Enter Username';
	}
	if(isset($_POST['usremail'])&&$_POST['usremail']!=""){
		$usremail = testdata($_POST['usremail']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg2 .= 'Please Enter Valid Email';
	}
	if(isset($_POST['pass2'])&&$_POST['pass2']!=""){
		$pass2 = testdata($_POST['pass2']);
		$valdata1 ++;
	}else{
		$valdata1 = 0;
		$msg2 .= 'Please Enter Valid Password';
	}	
	if($valdata1==3){
		$qry1 = "update `capitalusers` set `email`='$usremail' where `password`='$pass2' and `username`='$usrname3'";
		$result=$conn->query($qry1);
		if($conn->error){
			$msg2 .= 'Please Try After Some Time';
		}else{
			$successmsg2= "Email Changed Successfully";
		}
	}
}
?>

<?php 
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
           User Settings
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Settings</li>
          </ol>
        </section>

	        <!-- Main content -->
        <section class="content">
          <div class="box" >
			<div class='box-header'>
				<h3>Change Username</h3>
			</div>
            <div class="box-body">
				<?php 
						if(isset($msg) && $msg!== "" ){
					?>
					  <div class="alert alert-danger alert-dismissable fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Alert! </strong> <?php echo $msg; ?>
					  </div>
					<?php
						}
					?>
					<?php 
						if(isset($successmsg) && $successmsg!== "" ){
					?>
					  <div class="alert alert-success alert-dismissable fade in" style="border:2px solid #00a65a;color:#00a65a;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success! </strong> <?php echo $successmsg; ?>
					  </div>
					<?php
						}
					?>
			
			
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='signup1' method="post"> 
                <div class="row">
                    <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="usrname">Username :</label>
                      <input type="text" name="usrname" minlength='6' placeholder="Enter Username" class="form-control" id="usrname">
                    </div>
					<div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="usrname1">Confirm Username :</label>
                      <input type="text" name="usrname1" minlength='6' placeholder="Enter Username Again" class="form-control" id="usrname1">
                    </div>
					<div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="pass1">Password:</label>
                      <input type="password" name="pass1" minlength='6' placeholder="Enter Password" class="form-control" id="pass1">
                    </div>
					<div class=" form-group col-xs-12 text-center">
                      <input type="reset" name="submitreset" class="btn btn-warning pull-left" id="submitreset" value="Reset" >
					  <input type="submit" name="submitbtn" class="btn btn-primary pull-right" id="submitbtn" value="Submit" >
                    </div>
				</div>
              </form>
            </div>
          </div>
		  <div class="box">
            <div class='box-header'>
				<h3>Change Password</h3>
			</div>
			<div class="box-body">
				<?php 
						if(isset($msg1) && $msg1!== "" ){
					?>
					  <div class="alert alert-danger alert-dismissable fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Alert! </strong> <?php echo $msg1; ?>
					  </div>
					<?php
						}
					?>
					<?php 
						if(isset($successmsg1) && $successmsg1!== "" ){
					?>
					  <div class="alert alert-success alert-dismissable fade in" style="border:2px solid #00a65a;color:#00a65a;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success! </strong> <?php echo $successmsg1; ?>
					  </div>
					<?php
						}
					?>
			
			
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='signupForm' method="post"> 
                <div class="row">
                    <div class=" form-group col-xs-12 col-sm-6">
                      <label class="control-label" for="usrname2">Username :</label>
                      <input type="text" name="usrname2" minlength='6' placeholder="Enter Username" class="form-control" id="usrname2" required>
                    </div>
					<div class=" form-group col-xs-12 col-sm-6">
                      <label class="control-label" for="op">Old Password:</label>
                      <input type="password" name="op" minlength='6' placeholder="Enter Password" class="form-control" id="op" required>
                    </div>
					<div class=" form-group col-xs-12 col-sm-6">
                      <label class="control-label" for="np">New Password:</label>
                      <input type="password" name="np" minlength='6' placeholder="Enter Password" class="form-control" id="np" required>
                    </div>
					<div class=" form-group col-xs-12 col-sm-6">
                      <label class="control-label" for="np1">Confirm Password :</label>
                      <input type="password" name="np1" minlength='6' placeholder="Enter Username Again" class="form-control" id="np1" required>
                    </div>
					<div class=" form-group col-xs-12 text-center">
                      <input type="reset" name="submitreset1" class="btn btn-warning pull-left" id="submitreset1" value="Reset" >
					  <input type="submit" name="submitbtn1" class="btn btn-primary pull-right" id="submitbtn1" value="Submit" >
                    </div>
				</div>
              </form>
            </div>
          </div>
		  <div class="box" >
			<div class='box-header'>
				<h3>Update Email</h3>
			</div>
            <div class="box-body">
				<?php 
						if(isset($msg2) && $msg2!== "" ){
					?>
					  <div class="alert alert-danger alert-dismissable fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Alert! </strong> <?php echo $msg2; ?>
					  </div>
					<?php
						}
					?>
					<?php 
						if(isset($successmsg2) && $successmsg2!== "" ){
					?>
					  <div class="alert alert-success alert-dismissable fade in" style="border:2px solid #00a65a;color:#00a65a;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success! </strong> <?php echo $successmsg2; ?>
					  </div>
					<?php
						}
					?>
			
			
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='signup2' method="post"> 
                <div class="row">
                    <div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="usremail">User Email :</label>
                      <input type="email" name="usremail" minlength='2' placeholder="Enter Email" class="form-control" id="usremail" required>
                    </div>
					<div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="usrname3">Username :</label>
                      <input type="text" name="usrname3" minlength='5' placeholder="Enter Username " class="form-control" id="usrname3" required>
                    </div>
					<div class=" form-group col-xs-12 col-sm-4">
                      <label class="control-label" for="pass2">Password:</label>
                      <input type="password" name="pass2" minlength='6' placeholder="Enter Password" class="form-control" id="pass2" required>
                    </div>
					<div class=" form-group col-xs-12 text-center">
                      <input type="reset" name="submitreset2" class="btn btn-warning pull-left" id="submitreset" value="Reset" >
					  <input type="submit" name="submitbtn2" class="btn btn-primary pull-right" id="submitbtn" value="Submit" >
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
	<script>
	// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				np1: {
					required: true,
					minlength: 5,
					equalTo: "#np"
				}
			},
			messages: {
				np: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				np1: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
		});
		$("#signup1").validate({
			rules: {
				usrname1: {
					required: true,
					equalTo: "#usrname"
				},
			},
			messages: {
				usrname: {
					required: "Please provide a username",
					minlength: "Your username must be at least 5 characters long"
				},
				usrname1: {
					required: "Please provide a username",
					equalTo: "Please enter the same username as above"
				},
			}
		});
	</script>
<script>
		var str = location.pathname;
		if(str=="/admin/pages/settings.php")
		{
			document.getElementById("settings").className = "active";
		}
</script>