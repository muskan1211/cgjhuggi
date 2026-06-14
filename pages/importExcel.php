<?php 
include('db.php');
include 'header.php';

?> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <CENTER> PRADHAN MANTRI AWAAS YOJNA 2</CENTER>
            
          </h1>
          <ol class="breadcrumb">
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php if(isset($_GET['success'])) { ?>
   <div id="success-alert" style="
    padding: 12px 16px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    margin: 10px 0;
">
    ✓ Data imported successfully.
</div>

<?php } ?>
          <!-- Small boxes (Stat box) -->
         <!-- ./col --><center>	
           <div class="container mt-4">
             <div id="alert" style="
    padding: 12px 16px;
    background-color: #d4edda;
    color: #b5280f;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    margin: 10px 0;
">
    Only for PMY2 customers
</div>
          <div class="container mt-4">
             <div id="alert" style="
    padding: 12px 16px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    margin: 10px 0;
">
    Only 50 rows at a time
</div>
    <form action="process-excel.php" method="POST" enctype="multipart/form-data">
        <div class="row align-items-end">
            <div class="col-md-6">
                <input type="file" class="form-control" name="csv_file" id="csv_file" accept=".csv" required>
            </div>
            <div class="col-md-4">
                <button type="submit" name="submit" class="btn btn-primary w-100">Import Data</button>
            </div>
        </div>
    </form>
    
    <div class="mt-3">
        <a href="excel-sample.csv" download class="btn btn-outline-secondary">
            <i class="bi bi-download me-1"></i> Download Sample CSV
        </a>
    </div>
</div>
        </section><!-- /.content -->
	</div>
<?php 
	include 'footer.php';
?>  

