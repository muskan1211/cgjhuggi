<?php
	
	include 'pages/db.php';
	
	// Passkey that got from link 
	$passkey=$_GET['passkey'];
	
	// Retrieve data from table where row that match this passkey 
	$sql1="SELECT * FROM d2dtemp WHERE code ='$passkey'";
	$result1=$conn->query($sql1);
	
	// If successfully queried 
	if ($result1 == TRUE){
		
		// Count how many row has this passkey
		$count=$result1->num_rows;
		
		// if found this passkey in our database, retrieve data from table "temp_members_db"
		if($count==1){
			
			while($row =$result1->fetch_assoc()){
				$email=$row['email'];
				$user = $row['username'];
			}
		?>
		<!DOCTYPE html>
		<html >
			<head>
				<meta charset="UTF-8">
				<style>
					.forget{
					color:white;
					padding:5px;
					margin-left:10px;
					}
				</style>
				<title>Admin | Day2Day</title>
				<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
				<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Nunito:400,300,700'>
				<link rel="stylesheet" href="dist/css/style.css">
			</head>
			<body>
				<div class="container">
					<div class="form-container flip">
						<form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
							<h3 class="title">Reset Password</h3>
							<div class="form-group" id="password">
								<input type="password" id="pass" class="form-input" tooltip-class="password-tooltip" name="pass" placeholder="Password"></input>
								<span class="tooltip password-tooltip">Enter New password</span>
							</div>
							<div class="form-group" id="password">
								<input type="password" name="pass" id="confirm_password" onkeyup="checkPass(); return false;" class="form-input" tooltip-class="password-tooltip" name="pass" placeholder="Password"></input>
								<span class="tooltip password-tooltip">Confirm password</span>
								<span id="confirmMessage" class="confirmMessage"></span>
							</div>
							<div class="form-group">
								<button type="submit" name="set" style="width:100%" class="login-button">Reset Password</button>
							</div>
						</form>
						<div class="loading">
							<div class="loading-spinner-large" style="display: none;"></div>
							<div class="loading-spinner-small" style="display: none;"></div>
						</div>
						
						
						<script type="text/javascript">
							function checkPass(){
								//Store the password field objects into variables ...
								var pass1 = document.getElementById('pass');
								var pass2 = document.getElementById('confirm_password');
								//Store the Confimation Message Object ...
								var message = document.getElementById('confirmMessage');
								//Set the colors we will be using ...
								var goodColor = "#66cc66";
								var badColor = "#ff6666";
								//Compare the values in the password field 
								//and the confirmation field
								if(pass1.value == pass2.value){
									//The passwords match. 
									//Set the color to the good color and inform
									//the user that they have entered the correct password 
									pass2.style.backgroundColor = goodColor;
									message.style.color = goodColor;
									message.innerHTML = "Passwords Match!"
									}else{
									//The passwords do not match.
									//Set the color to the bad color and
									//notify the user.
									pass2.style.backgroundColor = badColor;
									message.style.color = badColor;
									message.innerHTML = "Passwords Do Not Match!"
								}
							}  
						</script>
										
										<?php
											if(isset($_POST["set"]))
											{
												$pass=$_POST["pass"];
												// Insert data that retrieves from "temp_members_db" into table "registered_members" 
												$sql2="update login set password='$pass' where email='$email' and `username`='$user'";
												$qry=$conn->query($sql2);
												echo "<h1>You have successfully reset your password. Now <a href='index.php'>click here</a> to login.</h1>";
												echo "<hr>";
											}
										}
										// if not found passkey, display message "Wrong Confirmation code" 
										else {
											
										echo "<h1>Wrong Confirmation Code</h1>";
								}
								
								// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
								if ($qry == TRUE){
									
									// Delete information of this user from table "temp_members_db" that has this passkey 
									$sql3="DELETE FROM temp WHERE code = '$passkey'";
									$conn->query($sql3);
								}
							}
						?>
			</div>
		</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
		<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
		<script src="dist/js/index.js"></script>
	</body>
</html>
