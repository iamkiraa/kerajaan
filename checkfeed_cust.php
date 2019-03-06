<?php
include('check_cust.php'); //check if user if an customer
include('header_cust.php'); //load header content for customer page
include("connection.php"); // connection to database
$customerID = $_SESSION['ID'];

?>
<div class="container" style="margin-top:10px">
<div class="content">
<h2> Semakan Maklumbalas &raquo;</h2>
<hr />
<?php

$sql = mysqli_query($connection, "SELECT * FROM feedback WHERE customerID='$customerID'");
// query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: customer.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
?>

<form>
  <div class="form-group">
    <label for="quest1"><b>1. Apakah tujuan anda melawat portal ini?</b></label>
	<div class="col-sm-4">
		<?php echo $row['quest1']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>2. Adakah maklumat yang dikehendaki mudah untuk dicari?</b></label>
	<div class="col-sm-4">
		<?php echo $row['quest2']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>3. Adakah maklumat yang dikehendaki jelas dipaparkan?</b></label>
	<div class="col-sm-4">
		<?php echo $row['quest3']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>4. Adakah Laman Web ini mudah dicapai?</b></label>
	<div class="col-sm-4">
		<?php echo $row['quest4']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>5. Kandungan/maklumat dalam Laman Web ini menepati keperluan pengunjung?</b></label>
	<div class="col-sm-4">
		<?php echo $row['quest5']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>6. Berapa penilaian anda untuk Laman Web kami?</b></label>
	<div class="col-sm-4">
		<?php echo $row['quest6']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>7. Cadangan anda untuk meningkatkan Laman Web ini.</b></label>
	<div class="col-sm-9">
		<?php echo $row['quest7']; ?>
	</div>	
  </div>
  
  <div class="form-group">
    <label for="quest1"><b>8. Sila berikan emel anda</b></label>
	<div class="col-sm-9">
		<?php echo $row['quest8']; ?>
	</div>	
  </div>
  
  <hr>
<div class="form-group row">
<label class="col-sm-5 control-label">&nbsp;</label>
<div class="col-sm-4">
<a href="customer.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
<a href="updateFeed_cust.php?customerID=<?php echo $row['customerID']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Kemaskini</a>
</div>
</div>

</form>

</div> <!-- /.content -->
</div> <!-- /.container -->

</body>