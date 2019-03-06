<?php
include('check_cust.php'); //check if user is Customer
include('header_cust.php'); //load header content for customer page
include("connection.php"); // connection to database
?>

<div class="container" style="margin-top:30px">
<div class="content">

<?php 
extract($_POST);
if(isset($sub))
{
$customerID=$_SESSION['ID'];


$sql=mysqli_query($connection,"select * from feedback where customerID='$customerID'");
$r=mysqli_num_rows($sql);

if($r==true)
{
echo "<div class='alert alert-danger' role='alert'> Maklumbalas tidak dihantar. Sila jawab sekali lagi! </div>";
}
else
{
$query="insert into feedback values('','$customerID','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8',now())";

mysqli_query($connection,$query);

echo "<div class='alert alert-success' role='alert'> Kami amat menghargai masa dan kerjasama yang diberikan. Terima kasih. </div>";
}
}

?>

<form method="post">
<fieldset>
<center><u>Kajian Kepuasan Pelanggan</u></center><br>
 
<fieldset>


<h3>Sila berikan jawapan berdasarkan soalan-soalan yang dikemukakan:</h3>

<br>
<p align="center">
<!-- Indicates a dangerous or potentially negative action -->
<button type="button" class="btn btn-danger"> 1 Sangat Tidak Memuaskan </button>

<!-- Indicates caution should be taken with this action -->
<button type="button" class="btn btn-warning"> 2 Tidak Memuaskan </button>

<!-- Contextual button for informational alert messages -->
<button type="button" class="btn btn-info"> 3 Sederhana </button>

<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<button type="button" class="btn btn-primary"> 4 Memuaskan </button>

<!-- Indicates a successful or positive action -->
<button type="button" class="btn btn-success"> 5 Sangat Memuaskan </button>
</p>

<br>
<table class="table table-bordered">
<h5>Bahagian A</h5>

<tr>
<td><b>1:</b> Apakah tujuan anda melawat portal Terengganu ?:</td>  
<td><input type="radio" name="quest1" value="1" required> Mendapatkan bahan penerbitan
	<br><input type="radio" name="quest1" value="2"> Muat turun dokumen
	<br><input type="radio" name="quest1" value="3"> Mendapatkan maklumat untuk kajian
	<br><input type="radio" name="quest1" value="4"> Mendapatkan maklumat perhubungan
</td>
</tr>
  
<tr>
<td><b>2:</b> Adakah maklumat yang dikehendaki mudah untuk dicari?:</td> 
<td>
	<input type="radio" name="quest2" value="1" required> Ya
    <input type="radio" name="quest2" value="2"> Tidak
</td>
</tr>

<tr>
<td>
<b>3:</b> Adakah maklumat yang dikehendaki jelas dipaparkan?:</td> 
<td>
	<input type="radio" name="quest3" value="1" required> Ya
    <input type="radio" name="quest3" value="2"> Tidak
    <input type="radio" name="quest3" value="3"> Tidak Berkenaan
</td>
</tr>

<tr>
<td>
<b>4:</b> Adakah Portal Terengganu mudah dicapai?:</td> 
<td>
	<input type="radio" name="quest4" value="1" required> 1
	<input type="radio" name="quest4" value="2"> 2
	<input type="radio" name="quest4" value="3"> 3
	<input type="radio" name="quest4" value="4"> 4
	<input type="radio" name="quest4" value="5"> 5
</td>
</tr>

<tr>
<td>
<b>5:</b> Kandungan/maklumat dalam Portal Terengganu menepati keperluan pengunjung?:</td> 
<td>
	<input type="radio" name="quest5" value="1" required> 1
	<input type="radio" name="quest5" value="2"> 2
	<input type="radio" name="quest5" value="3"> 3
	<input type="radio" name="quest5" value="4"> 4
	<input type="radio" name="quest5" value="5"> 5
</td>
</tr>

<tr>
<td>
<b>6:</b> Berapa penilaian anda untuk Portal Terengganu kami?:</td> 
<td>
	<input type="radio" name="quest6" value="1" required> 1
	<input type="radio" name="quest6" value="2"> 2
	<input type="radio" name="quest6" value="3"> 3
	<input type="radio" name="quest6" value="4"> 4
	<input type="radio" name="quest6" value="5"> 5
</td>
</tr>
</table>

<h5>Bahagian B</h5>

<b>1:</b> Cadangan anda untuk meningkatkan Portal Terengganu :<br><br>
<center>
<textarea name="quest7" rows="5" cols="60" id="comments" style="font-family:sans-serif;font-size:1.2em;" required>
</textarea>
</center>
<br>
<br>

<b>2:</b> Sila berikan emel anda :<br><br>
<center>
<textarea name="quest8" rows="5" cols="60" id="comments" style="font-family:sans-serif;font-size:1.2em;" required>
</textarea>
</center>

<br>
<p align="center">
	<input type="submit" name="sub" class="btn btn-sm btn-primary" value="Hantar" data-toggle="tooltip" title="Hantar Maklumbalas">
</p>


</form>
</fieldset>


<!--<a href="transport.html"><p align="right"><button type="Button"style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Next</button></p></a>
<a href="About.php"><p align="right"><button type="Button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Back</button></p></a>-->

</div><!--close content_item-->
      </div><!--close content-->   
	
	</div><!--close site_content-->  	
  
   
    </div><!--close main-->
  </form>
<center>