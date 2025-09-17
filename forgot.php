<?php 
session_start();
include('pages/db.php');
require_once 'plugins/swift/lib/swift_required.php';
if(isset($_POST['forgot']))
 {
	 $msg="";
	 $email=$_POST['email'];
   	 $q="select * from `d2dusers` where `email`='$email'";	
	$rs=mysqli_query($conn,$q);
	if($conn->error){echo $conn->error; }
	$res=mysqli_fetch_array($rs);
	if(isset($res))
	{
		$qry="select `email` from `d2dusers`";
		$result=$conn->query($qry);
		if($conn->error){echo $conn->error; }
		list($email1)=$result->fetch_row();
		$_SESSION['user']=$res['username'];
		$user=$res['username'];
		$confirm_code=md5(uniqid(rand()));

						// values sent from form 

						// Insert data into database 
						$sql="INSERT INTO temp(email,code,user)VALUES('$email','$confirm_code','$user')";

						$qry=$conn->query($sql);

						// if suceesfully inserted data into database, send confirmation link to email 
						if ($qry === TRUE){
						// ---------------- SEND MAIL FORM ----------------
													  $data='<html>' .
															' <head>
															<style type=text/css>
															body {
																font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
																font-size: 14px;
																line-height: 1.42857143;
																color: #333;
															}
															.logo-img{
																
																display:block;
																float:left;
																width:200px;
																height:auto;
																margin-bottom:20px;
															}

															.logo-img img{
																width:100%;
																height:60px;
															}
															 
															 .myediter{
																 top:15% !important;
																 display:block;
															 }
															 
															 .btn-success {
																color: #fff;
																background-color: #555;
																border-color: #333;
																padding: 10px;
																font-size: medium;
															}
															.txt-link{
																text-decoration:underline;
															}
															   
															.navbar {
																  margin-bottom: 0;
																  border-radius: 0;
																}
															.row.content {height: 1200px}
															.sidenav {
																  padding-top: 20px;
																  background-color: #f1f1f1;
																  height: 100%;
																}
																
															footer {
																  background-color: #555;
																  color: white;
																  padding: 15px;
																}
															   
															@media screen and (max-width: 767px) {
																  .sidenav {
																	height: auto;
																	padding: 15px;
																  }
															.row.content {height:auto;} 
																}
															</style>
															 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
															 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
															 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
															</head>' .
															' <body>' .
															' <div class="container-fluid text-center">    
															  <div class="row content">
																<div class="col-sm-2 sidenav">
																</div>
																<div class="col-sm-8 text-left  myediter"> 
																<p>Hi '.$user.'.</p>
																<div class="clearfix"></div>
																  <h3>We received a request to reset the password for your account.</h3>
																  <br><p>If you requested a reset for '.$email.', click the button below. If you didn’t make this request, please ignore this email.</p>
																  <br>
																  
																  <hr>
																<p><a href="http://localhost/santoor/confirmation.php?passkey='.$confirm_code.'" class="btn btn-success">Reset Password</a></p>
																
																  <br>
																  <p>For questions about this email, please contact:</p>
																  <br>
																  <p><a href="mailto:support@maequalis.com" class="txt-link">support@maequalis.com</a></p>
																  <hr>
																  <p>Thanks and Regards,</p>
																
																</div>
																<div class="col-sm-2 sidenav">
																</div>
															  </div>
															  </div>
															</div>' .
															' </body>' .
															'</html>';
															// Create the Transport
															$transport = Swift_SmtpTransport::newInstance('smtpout.secureserver.net', 80)
																  ->setUsername('noreply@crazywebdesigners.com')
																  ->setPassword('12!@Ase5%djs')
																  ;
															
															// Create the Mailer using your created Transport
															$mailer = Swift_Mailer::newInstance($transport);

															// Create a message
															$message = Swift_Message::newInstance('Confirmation: Crazy Web Designers')
															  ->setFrom(array('noreply@crazywebdesigners.com' => 'Crazy Web Designers'))
															  ->setTo(array($email => $email))
															  ->setBody($data,'text/html');

															// Send the message
															$result = $mailer->send($message);
						
						}
						if($result){
							$msg='Your password Reset link Has Been Sent To Admin.';
						}
						else {
						 $msg='Error in sending confirmation link. Please try after sometime.......';
						}
 }else{$msg="Email is not exist";}}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin | Day2Day</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css1/style.css">
</head>
<body>
	<div class="login-form">
		<div class="form-container flip">
			<form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
				<h3 class="title">Find Your Account</h3>
				<div class="form-group" id="username">
					<input type="email" class="form-control" tooltip-class="username-tooltip" name="email" placeholder="Enter Email Id" id="email"  required="true"></input>
				</div>
			
				<div class="form-group">
					<button type="submit" name="forgot" style="width:100%" class="log-btn">Send Password</button>
				</div>
			</form>
			<div class="loading">
				<div class="loading-spinner-large" style="display: none;"></div>
				<div class="loading-spinner-small" style="display: none;"></div>
			</div>
		</div>
	</div>
<script src='js/jquery.min.js'></script>
<script src="js1/index.js"></script>
</body>
</html>
