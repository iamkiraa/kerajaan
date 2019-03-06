<?php
//check if user has login
include('check_cust.php'); //check if teacher logged in
include('header_cust.php'); //load header content for teacher page
include("connection.php"); // connction to database

$customerID = $_SESSION['ID'];
?>
<div class="container" style="margin-top:10px">
<div class="content">
<h2> Detail Pengadu &raquo;</h2>
<hr />
<?php

if(isset($_POST['add'])){ // if button Add clicked
$custName = $_POST['custName'];
$custGender = $_POST['custGender'];
$custDOB = $_POST['custDOB'];
$custAddress = $_POST['custAddress'];
$custNO = $_POST['custNO'];
$custEmail = $_POST['custEmail'];

$check = mysqli_query($connection, "SELECT * FROM customer WHERE customerID ='$customerID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database
$insert = mysqli_query($connection, "INSERT INTO customer(customerID, custName, custGender, custDOB, custAddress, custNO, custEmail) 
 VALUES('$customerID','$custName', '$custGender', '$custDOB', '$custAddress', '$custNO', '$custEmail')") or die(mysqli_error()); // query for adding data into database
 
 if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data untuk pengadu baru ditambah. <a href="customer.php"><- Kembali</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ops,tidak dapat menambah data untuk pengadu baru! <a href="customer.php"><- Kembali</a></div>'; // display message data unsuccessfull added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nombor IC telah wujud! Anda adalah mendaftar!<a href="customer.php"><- Kembali</a></div>'; // display message ic number already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form align="center" class="form-horizontal" action="" method="post">
<div class="form-group row">
<label class="col-sm-5 col-form-label">No IC</label>
<div class="col-sm-4">
<input type="text" name="customerID" class="form-control" placeholder="<?php echo $customerID; ?>" disabled>
</div>
</div>

<div  class="form-group row">
<label class="col-sm-5 col-form-label">Nama</label>
<div class="col-sm-4">
<input type="text" name="custName" class="form-control" placeholder="Nama" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Jantina</label>
<div class="col-sm-4">
<select name="custGender" class="form-control" required>
<option value=""> - Pilih Jantina - </option>
<option value="Lelaki">Lelaki</option>
<option value="Perempuan">Perempuan</option>
</select>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Tarikh Lahir</label>
<div class="col-sm-4">
<input type="date" name="custDOB" class="form-control" placeholder="dd-mm-yyyy" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Alamat</label>
<div class="col-sm-4">
<textarea name="custAddress" class="form-control" placeholder="Alamat" required></textarea>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">No Telefon</label>
<div class="col-sm-4">
<input type="text" name="custNO" class="form-control" placeholder="No Telefon" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-5 col-form-label">Email</label>
<div class="col-sm-4">
<input type="email" name="custEmail" class="form-control" placeholder="Email" required>
</div>
</div>

<hr>
<div class="form-group row">
<label class="col-sm-4 control-label">&nbsp;</label>
<div class="col-sm-4">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Pengadu">
<a href="customer.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Batal</a>

<a href="password_cust.php" class="btn btn-sm btn-success" data-toggle="tooltip" title="Tukar">Tukar Kata laluan</a>
</div>
</div>
</form> <!-- /form -->

</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>
