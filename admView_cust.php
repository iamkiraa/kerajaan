<?php
include('check_admin.php'); //check if user is a Administrator
include('header_admin.php'); //load header content for Administrator page
include("connection.php"); // connction to database
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Senarai Pengadu</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	
 

</head>
<body>

<div class="container" style="margin-top:30px">
<div class="content">



<?php
if(isset($_GET['action']) == 'delete'){ // if remove button clicked
$customerID = $_GET['customerID']; // get customerID value
$check = mysqli_query($connection, "SELECT * FROM customer WHERE customerID='$customerID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // if no customerID selected
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Tiada data yang dijumpai.</div>'; // display message no data found.'
}else{ // if there are data found
$delete = mysqli_query($connection, "DELETE FROM customer WHERE customerID='$customerID'"); // query for removing data
if($delete){ // if delete query succesfull
echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berjaya dikeluarkan.</div>'; // display message data removed'
}else{ // if delete query unsuccesfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Tidak boleh keluarkan data.</div>'; // display message cannot remove data'
}
}
}
?>

<div id="page-wrapper">
<div class="row">
                <div id="search_area" class="col-lg-12">
                    <h1 class="page-header">Senarai Pengadu</h1>
				
                </div>
                <!-- /.col-lg-12 -->
				
				
</div>
<!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>No IC</th>
                                        <th>Nama</th>
                                        <th>Jantina</th>
                                        <th>Tarikh Lahir</th>
										<th>Alamat</th>
										<th>No Telefon</th>
										<th>Email</th>
										<th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										$sql = mysqli_query($connection, "SELECT * FROM customer ORDER BY customerID ASC");
										if(mysqli_num_rows($sql) == 0){
										echo '<tr><td colspan="14">Tiada data yang diambil.</td></tr>'; // if no data retrieved from database
										}else{ // if there are data
										$no = 1; // start from number 1
										while($row = mysqli_fetch_assoc($sql)){ // fetch query into array
										echo '
										<tr>
										<td>'.$no.'</td>
										<td>'.$row['customerID'].'</td>
										<td>'.$row['custName'].'</a></td>
										<td>'.$row['custGender'].'</td>
										<td>'.$row['custDOB'].'</td>
										<td>'.$row['custAddress'].'</td>
										<td>'.$row['custNO'].'</td>
										<td>'.$row['custEmail'].'</td>
										<td>
										<a href="admView_cust.php?customerID='.$row['customerID'].'" title="Profil Pengadu" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
										<a href="admView_cust.php?action=delete&customerID='.$row['customerID'].'" title="Keluarkan Data" data-toggle="tooltip" onclick="return confirm(\'Anda pasti ingin keluarkan data'.$row['custName'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
										</td>
										</tr>
										';
										$no++; // next number
										}
										}
									?>
                               
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>

<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
	

</body>
</html>

