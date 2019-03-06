<?php
session_start();
$error='';
include "connection.php";
if(isset($_POST['submit']))
{
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);
$sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
$query = mysqli_query($connection,$sql);
$row = $query->fetch_array();
$count = $query->num_rows; // if email/password are correct returns must be 1 row

if ($count == 1)
{
	$_SESSION['username']=$row['username'];
	$_SESSION['level'] = $row['level'];
	$_SESSION['ID'] = $row['ID'];

	if($row['level'] == "Administrator")
{
header("Location: admin.php");
}
else if($row['level'] == "Customer")	
{
header("Location: customer.php");
}
else
{
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Log masuk gagal - Tahap pengguna tidak betul!
</div>";
}
}
else
{
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Nama Pengguna dan Kata Laluan Tidak Sah !
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
<title>Login</title>
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

<h1>Log Masuk</h1>
<p>Sila masukkan nama pengguna dan kata laluan:</p>
</div>
<div class="form-top-right">
<i class="fa fa-key"></i>
</div>
</div>
<div class="form-bottom">
<form role="form" action="" method="post" class="login-form">
<?php
if (isset($msg)) {
echo $msg;

}
?>
<div class="form-group">
<label class="sr-only" for="form-username">Nama Pengguna</label>
<input type="text" name="username" placeholder="Nama Pengguna" class="form-username form-control" id="form-username">
</div>
<div class="form-group">
<label class="sr-only" for="form-password">Kata Laluan</label>
<input type="password" name="password" placeholder="Kata Laluan" class="form-password form-control" id="form-password">
</div>
<button type="submit" name="submit" class="btn">Masuk!</button>
</form>
<hr />

<div class="text-center p-t-46 p-b-20">
	<span class="txt2"> Tidak Mempunyai Akaun? </span>
	<a href="signup.php" class="txt1">Daftar Akaun</a>
</div>
<a href="index.php" type="button" class="btn btn-primary">Kembali</a>
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
		