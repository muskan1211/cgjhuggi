<?php
include('db.php');
	include 'header.php';

	if(!isset($_SESSION['admin_email']))
	{
		header('location:admin_log.php');
	}
	$msg="";
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='del')
	{
		$get_id=$_REQUEST['del_id'];
		$del="DELETE FROM registration WHERE id='$get_id'";
		mysql_query($del) or mysql_error();
		$msg="<strong>Successfully Deleted</strong>";
	}
	if(isset($_POST['keyword']) && $_POST['SEARCH']=='Search')
	{
			$keyword=trim($_POST['keyword']);
			$src .= " WHERE fname like '$keyword%'";
	}
	if(isset($_REQUEST['active_id']) && $_REQUEST['act']=='st')
	{
		$id=base64_decode($_REQUEST['active_id']);
		$sel_user="SELECT * FROM registration WHERE id='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);
		if($fet['status']=='Active')
		{
			$upd="UPDATE registration SET status='Inactive' WHERE id='$id'";
			$updr=mysql_query($upd);
			echo "<script>alert('Account Deactivated');
				window.location='admin_home.php';
			</script>";
			
			
		}
		else
		{
			$upd="UPDATE login SET status='Active' WHERE id='$id'";
			$updr=mysql_query($upd);
		echo "<script>alert('Account Activated');
				window.location='admin_home.php';
			</script>";
			
		}
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
			
         <table class="table table-bordered">
    <thead>
      <tr>
	     <th>ID</th>
        <th>NAME</th>
        <th>EMAIL ID</th>
        <th>PASSWORD</th>
		
		 <th>ACTION</th>
      </tr>
    </thead>
   	<tbody>
            <?php
			
                      $result = mysqli_query($conn,"SELECT * FROM registration")
                       or die(mysqli_error($conn));
					while($row = mysqli_fetch_array( $result )) {

                        // echo out the contents of each row into a table

                              echo "<tr>";
               echo '<td>' . $row['id'] . '</td>';
			    echo '<td>' . $row['name'] . '</td>';
				 echo '<td>' . $row['email'] . '</td>';
				  echo '<td>' . $row['password'] . '</td>';
				  
					
             
                 echo '<td align="center"><button class="btn btn-danger"><a href="delete_booking.php ?id=' . $row['id'] . '">Activate</a></button></td>';
             echo "</tr>";

                                   }
	                               ?>
                                         </tbody>
  </table>
			
			
           
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php');
?>
    <script>
		$('.sdate').datepicker();
    </script>
 <script>	
$('table').DataTable();
 </script>
 <script>
 $(document).ready(function() {
    var eventFired = function ( type ) {
        var n = $('#demo_info')[0];
        n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
        n.scrollTop = n.scrollHeight;      
    }
 
    $('#example')
        .on( 'order.dt',  function () { eventFired( 'Order' ); } )
        .on( 'search.dt', function () { eventFired( 'Search' ); } )
        .on( 'page.dt',   function () { eventFired( 'Page' ); } )
        .DataTable();
} );
</script>