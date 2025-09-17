<?php 
include('db.php');
include 'header.php';

?> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <CENTER> PRADHAN MANTRI AWAAS YOJNA</CENTER>
            
          </h1>
          <ol class="breadcrumb">
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
         <!-- ./col -->
        <center><a href="pmy2addNew.php"><button class="btn btn-primary" >ADD NEW</button></a>
		<a href="pmy2report.php"><button class="btn btn-primary">REPORT</button></a></center>
		 
        </section><!-- /.content -->
	</div>
<?php 
	include 'footer.php';
?>  
<script>
$("#example1").DataTable({
	responsive: true
} );
</script>
<script>
		var str = location.pathname;
		if(str=="/admin/pages/dashboard.php")
		{
			document.getElementById("dashboard").className = "active";
		}
	
</script>
