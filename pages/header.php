<?php session_start(); ?>
<?php
	
  if(!isset($_SESSION['user'])){
	header("Location:../login.php");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRADHAN MANTRI AWAAS YOJNA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/data.css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	 <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
	<!------Responsive DataTable -->
	<link rel="stylesheet" href="../plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
	<!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
	<!-- Custom -->
    <link rel="stylesheet" href="../dist/css/custom.css">
	 <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="../plugins/jQuery/jquery-3.3.1.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="../images/logo1.jpg" height="50" width="50"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size:13px;">PRADHAN MANTRI AWAAS YOJNA</span>
		  
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="user user-menu">
                <a href="../logout.php">
					<i class="fa fa-sign-out"></i><span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="treeview" id='dashboard'>
              <a href="dashboard.php">
                <i class="fa fa-home"></i> <span>Home</span> 
              </a>
            </li>
			  <li class="treeview" id='stkcash'>
			  <a href="addnewentry.php">
                <i class="fa fa-user"></i> <span>ADD NEW ENTRY</span> 
              </a>            
			</li>
            <li class="treeview" id='stkcash'>
			  <a href="viewentry.php">
                <i class="fa fa-eye"></i> <span>VIEW YOUR ENTRY</span> 
              </a>            
			</li>
      <li class="treeview" id='stkcash'>
        <a href="view_bills.php">
                <i class="fa fa-eye"></i> <span>VIEW YOUR BILLS</span> 
              </a>            
      </li>
       <li class="treeview" id='stkcash'>
        <a href="report.php">
                <i class="fa fa-clipboard"></i> <span>REPORT</span> 
              </a>            
      </li>
       <li class="treeview" id='stkcash'>
        <a href="pmy2.php">
                <i class="fa fa-clipboard"></i> <span>PMY 2</span> 
              </a>            
      </li>
      
			
           <!--  <li class="treeview" id='settings'>
              <a href="settings.php">
                <i class="fa fa-cog"></i> <span>Settings</span> 
              </a>
            </li> -->
		</ul>
        </section>
      </aside>
