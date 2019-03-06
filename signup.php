<?php
session_start();
if($_SESSION){
if($_SESSION['level']=="Administrator")
{
header("Location: admin.php");
}
if($_SESSION['level']=="Customer")
{
header("Location: customer.php");
}	
}
require_once 'connection.php';
if(isset($_POST['btn-signup'])) {
$ID = mysqli_real_escape_string($connection,$_POST['ID']);
$username=mysqli_real_escape_string($connection,$_POST['username']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$level = mysqli_real_escape_string($connection,$_POST['level']);
$check_ID = $connection->query("SELECT ID FROM user WHERE ID ='$ID'");
$countic = $check_ID->num_rows;
$check_username = $connection->query("SELECT username FROM user WHERE username='$username'");
$countun = $check_username->num_rows;
if (($countic==0) && ($countun==0)){
$query = "INSERT INTO user(username,password,level,ID) VALUES ('$username','$password','$level','$ID')";
if ($connection->query($query)) {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Pendaftaran Berjaya !
</div>";
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Ralat Semasa Mendaftar!

</div>";
}
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Maaf .. Nama pengguna atau Nombor IC sudah wujud!
</div>";
}
$connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pendaftaran</title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">

<!-- Favicons -->
  <link href="img/terengganu.png" rel="icon">
  <link href="img/terengganu1.png" rel="apple-touch-icon">
  
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Top content -->
<div class="top-content">
<div class="inner-bg">
<div class="container">
<div class="row">
<div class="col-sm-6 col-sm-offset-3 form-box">
<div class="form-top">
<div class="form-top-left">
<h1>Maklumat Pendaftaran</h1>
</div>
<div class="form-top-right">
<i class="fa fa-key"></i>
</div>
</div>
<div class="form-bottom">

<form role="form" class="login-form" method="post" id="register-form">
<?php
if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
<input type="text" class="form-control" placeholder="Nombor IC - Cth:961201115500 -" name="ID" required />
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Nama Pengguna" name="username" required />
</div>

<div class="form-group">
<input type="password" class="form-control" placeholder="Kata Laluan" name="password" required />
</div>
<div class="form-group">
<select name="level" class="form-control" required>
<option value="">Sila Pilih Tahap</option>
<option value="Customer">Pelanggan</option>
</select>
</div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="btn-signup">
<span class="glyphicon glyphicon-log-in"></span> &nbsp; Daftar Akaun
</button>
<hr/>
<a href="login.php" type="button" class="btn btn-primary">Log Masuk</a>
<a href="index.php" type="button" class="btn btn-primary">Kembali</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
</body>