<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:30px">
<div class="content">

<h2>Profil Pengadu &raquo;</h2>
<hr />
<?php
$customerID = $_GET['customerID']; // get selected ic number
$sql = mysqli_query($connection, "SELECT * FROM customer WHERE customerID='$customerID'"); // query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: admView_cust.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
if(isset($_GET['action']) == 'delete'){ // if delete button clicked
$delete = mysqli_query($connection, "DELETE FROM customer WHERE customerID='$customerID'"); // query for deleting data based on ic number
if($delete){ // if query executed successfully
echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data dikeluarkan.</div>'; // display data removed.'
}else{ // if query unsuccessful
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data tidak boleh dikeluarkan.</div>'; // display message cannot remove data.'
}
}
?>
<!-- Display member details -->
<table class="table table-striped table-condensed">

<tr>
<th width="20%">No IC</th>
<td><?php echo $row['customerID']; ?></td>
</tr>

<tr>
<th>Nama</th>
<td><?php echo $row['custName']; ?></td>
</tr>

<tr>
<th>Jantina</th>
<td><?php echo $row['custGender']; ?></td>
</tr>

<tr>
<th>Tarikh Lahir</th>
<td><?php echo $row['custDOB']; ?></td>
</tr>

<tr>
<th>Alamat</th>
<td><?php echo $row['custAddress']; ?></td>
</tr>

<tr>
<th>No Telefon</th>
<td><?php echo $row['custNO']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $row['custEmail']; ?></td>
</tr>

</table>
<hr>
<div class="form-group row">
<label class="col-sm-6 control-label">&nbsp;</label>
<div class="col-sm-4">
<a href="admView_feedback.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>

</div>
</div>

</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>