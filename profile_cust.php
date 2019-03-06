<?php
//check if user has login
include('check_cust.php'); //load header content for teacher page
include('header_cust.php'); //load header content for teacher page
include("connection.php"); // connection to database

$customerID = $_SESSION['ID'];
?>
<div class="container" style="margin-top:30px">
<div class="content">
<h2> Maklumat Pengadu &raquo;</h2>
<hr />
<?php

$sql = mysqli_query($connection, "SELECT * FROM customer WHERE customerID='$customerID'");
// query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: customer.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
?>
<!-- Display Teacher details -->
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
<label class="col-sm-5 control-label">&nbsp;</label>
<div class="col-sm-4">
<a href="customer.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
<a href="update_cust.php?customerID=<?php echo $row['customerID']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Kemaskini</a>
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