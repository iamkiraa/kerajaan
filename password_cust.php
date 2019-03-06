<?php
include('check_cust.php'); //check if user if an customer
include('header_cust.php'); //load header content for customer page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:20px">
<div class="content">
<h2>Tukar Kata Laluan &raquo;</h2>
<hr />
<?php
if(isset($_POST['change'])){ // if change button clicked
$username = $_SESSION['username'];
$password = $_POST['password']; // assign password with md5 encryption
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$check = mysqli_query($connection, "SELECT * FROM user WHERE username='$username' AND password='$password'"); // select query ic number and password
if(mysqli_num_rows($check) == 0){ // if password and ic number match
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kata laluan salah. Sila cuba lagi!</div>';
}else{
if($password1 == $password2){ // if password 1 same as password 2
if(strlen($password1) >= 6){ // minimum 6 character
$update = mysqli_query($connection, "UPDATE user SET password='$password1' WHERE username='$username'"); // query update password
if($update){ // if update query successful
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ubah kata laluan berjaya! <a href="login.php"><- Log Masuk</a></div>';
}else{ // if updating failed
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kata laluan tidak boleh diubah!</div>';
}
}else{ // if password less than 6
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Minimum panjang kata laluan adalah 6 aksara!</div>';
}

}else{ // if password 1 not same as password 2
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kata laluan tidak padan!div>';
}
}
}
?>
<!-- Form to update password -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">Kata Laluan Lama</label>
<div class="col-sm-4">
<input type="password" name="password" class="form-control" placeholder=" etc: 123456 " required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Kata Laluan Baru</label>
<div class="col-sm-4">
<input type="password" name="password1" class="form-control" placeholder=" etc: 654321 " required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Masukkan Semula Kata Kaluan Baru</label>
<div class="col-sm-4">
<input type="password" name="password2" class="form-control" placeholder=" etc:654321 " required>
</div>
</div>

<hr>
<div class="form-group">
<label class="col-sm-4 control-label">&nbsp;</label>
<div class="col-sm-4">
<input type="submit" name="change" class="btn btn-sm btn-info" value="Tukar" data-toggle="tooltip" title="Tukar Kata Laluan">
<a href="add_cust_data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel"><b>Batal</b></a>
</div>
</div>
</form>
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>