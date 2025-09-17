<?php 
	include('pages/db.php');
	$error=0;
	if(isset($_POST['login'])){
		$user=$_POST['username'];
		$pass=$_POST['pass'];
		$qry = "select `username` from `capitalusers` where `username`='$user' and `password`='$pass'";
		$result=$conn->query($qry);
		if($result->num_rows =='1'){
			session_start();
			$_SESSION['user']=$user;
			header('Location:index.php');
		}else{
			$error=1;
		}
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin | NAMAN BHATT & ASSOCIATES</title>
 <script src="https://kit.fontawesome.com/9e5edb6f57.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css1/style.css">
</head>
<body>
  <div class="login-form">
     <h1>Welcome</h1>
	 <?php if($error == 1){
		?>
		<span style="color:red;" ><center>Invalid Username and Password</center></span>
	 <?php
	 }
	 ?>
	 <br/>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
     <div class="form-group ">
       <input type="text" class="form-control" name="username" placeholder="Username" id="UserName">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" name="pass" placeholder="Password" id="Passwod">
       <i class="fa fa-lock"></i>
     </div>
	<!-- ---<a class="link" href="forgot.php">Lost your password?</a>-----> 
    <button type="submit" name="login" class="log-btn">Log in</button>
     </form>
    
   </div>
	<!-- jQuery 2.1.4 
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
</html>
