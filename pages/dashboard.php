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
         <img src="../images/logo5.jpg" height="400" width="400" style="
    align-self:  center;
    margin-top:  75px;
    margin-left:  355px;
"/>
		 
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
