<?php
include('check_cust.php'); //check if user if an Administration
include('header_cust.php'); //load header content for member page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:20px">
<div class="content">
<h2>Kemaskini Maklumat &raquo;</h2>
<hr />
<?php
$customerID = $_GET['customerID']; // get ic number
$sql = mysqli_query($connection, "SELECT * FROM customer WHERE customerID='$customerID'"); // query for select member by ic number
if(mysqli_num_rows($sql) == 0){
header("Location: profile_cust.php");
}else{
$row = mysqli_fetch_assoc($sql);
}


if(isset($_POST['save'])){ // if save button clicked
$custName = $_POST['custName'];
$custGender = $_POST['custGender'];
$custDOB = $_POST['custDOB'];
$custAddress = $_POST['custAddress'];
$custNO = $_POST['custNO'];
$custEmail = $_POST['custEmail'];

$update = mysqli_query($connection, "UPDATE customer SET custName='$custName', custGender='$custGender', custDOB='$custDOB', custAddress='$custAddress', custNO='$custNO', custEmail='$custEmail' WHERE customerID='$customerID'") or die(mysqli_error()); // query for update data in database
if($update){ // if update query execution successful
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data dikemaskini. <a href="profile_cust.php"><- Kembali</a></div>'; // display data updated.'
}else{ // if update query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data tidak boleh dikemaskini, sila cuba lagi.</div>'; // display cannot update message'
}
}
if(isset($_GET['process']) == 'success'){ // if process-success
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data dikemaskini. <a href="profile_cust.php"><- Kembali</a></div>'; // display data updated.'
}
?>
<!-- Form for updating data -->
<form align="center" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<div  class="form-group row">
<label class="col-sm-5 col-form-label">No IC</label>
<div class="col-sm-4">
<input type="text" name="customerID" value="<?php echo $row ['customerID']; ?>" class="form-control" placeholder="No IC " disabled>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Nama</label>
<div class="col-sm-4">
<input type="text" name="custName" value="<?php echo $row ['custName']; ?>" 
class="form-control" placeholder="Nama" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Jantina</label>
<div class="col-sm-4">
<select name="admin_gender" class="form-control" required>

<option value="<?php echo $row['admin_gender']; ?>"><?php echo $row['admin_gender']; ?></option>
<option value="Lelaki">Lelaki</option>
<option value="Perempuan">Perempuan</option>
</select>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Tarikh Lahir</label>
<div class="col-sm-4">
<input type="date" name="custDOB" value="<?php echo $row ['custDOB']; ?>" class="form-control" placeholder="dd-mm-yyyy" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Alamat</label>
<div class="col-sm-4">
<textarea name="custAddress" class="form-control" placeholder="Alamat" required><?php echo $row ['custAddress']; ?></textarea>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">No Telefon</label>
<div class="col-sm-4">
<input type="text" name="custNO" value="<?php echo $row ['custNO']; ?>" class="form-control" placeholder="No Telefon" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Email</label>
<div class="col-sm-4">
<input type="email" name="custEmail" value="<?php echo $row ['custEmail']; ?>" class="form-control" placeholder="Email" required>
</div>
</div>

<hr>
<div class="form-group row">
<label class="col-sm-4 col-form-label">&nbsp;</label>
<div class="col-sm-4">
<input type="submit" name="save" class="btn btn-sm btn-primary" value="Kemaskini" data-toggle="tooltip" title="Kemaskini Data">
<a href="profile_cust.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
</div>
</div>
</form>

</div> <!-- /.content -->
</div> <!-- /.container -->

</body>
</html>