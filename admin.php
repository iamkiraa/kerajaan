<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
    position: relative;
    width: 45%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
</head>
<body>
<div class="container" style="margin-top:30px">
<div class="content">

<div class="row placeholders">

<div class="container">
<h3>Jumlah bilangan Lelaki:</h3>
  <img src="assets/img/icon/avatar1.png" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text"
	<?php 
		$q=mysqli_query($connection,"select * from customer where custGender = 'lelaki'");
			$r1=mysqli_num_rows($q);			
		echo "<h2 style='color:orange'> $r1</h2>";	
	?>
	</div>
  </div>
</div>

<div class="container">
<h3>Jumlah bilangan Perempuan:</h3>
  <img src="assets/img/icon/avatar2.png" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text"
	<?php 
		$q=mysqli_query($connection,"select * from customer where custGender = 'perempuan'");
			$r1=mysqli_num_rows($q);			
		echo "<h2 style='color:orange'> $r1</h2>";	
	?>
	</div>
  </div>
</div>

<div class="container">
<h3>Jumlah bilangan Pengadu:</h3>
  <img src="assets/img/icon/avatar3.png" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text"
	<?php 
		$q=mysqli_query($connection,"select * from feedback");
			$r1=mysqli_num_rows($q);			
		echo "<h2 style='color:orange'> $r1</h2>";	
	?>
	</div>
  </div>
</div>



</div>
</div>
</div>
</body>
</html>

