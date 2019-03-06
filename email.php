<?php
include('check_admin.php'); //check if user is a Administrator
include('header_admin.php'); //load header content for Administrator page
include("connection.php"); // connction to database
?>

<div class="container" style="margin-top:10px">
<div class="content">
<h2>Pilihan email templates &raquo;</h2>
<hr />
<?php
$event = 'Maklumbalas ';
$customerID = $_GET['customerID']; // get selected ic number
$sql = mysqli_query($connection, "SELECT * FROM customer WHERE customerID='$customerID'"); // query for select member by ic number
if(mysqli_num_rows($sql) == 0){
header("Location: admView_feedback.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
$custName = $row['custName'];
$custGender = $row['custGender'];
$custDOB = $row['custDOB'];
$custNO = $row['custNO'];
$to = $row['custEmail'];

if(isset($_POST['send'])){ // if send email button clicked

$subject = $_POST['email_template'];
if ($subject == 'Pemberitahuan Selamat Datang'){
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='https://jonlejeng.000webhostapp.com/cclub/assets/img/cclub.png' height='100' width='200' /></th>

<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >Arau High School Computer Club</th>
</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi' ".$custName.",</p>
<hr />
<p style='font-size:25px;'>Selamat datang ke e-Participation: Online Feedback System</p>
<p style='font-size:20px;'>Berikut adalah maklumat peribadi anda:-</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Nama: ".$custName."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Jantina: ".$custGender."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Tarikh Lahir: ".$custDOB."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>No Telefon: ".$custNO."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Hubungi kami jika anda ada sebarang pertanyaan..</p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

} elseif ($subject == 'Ucapan Terima Kasih') {
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='https://jonlejeng.000webhostapp.com/cclub/assets/img/cclub.png' height='100' width='200' /></th>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >e-Participation: Online Feedback System</th>

</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi' ".$custName.",</p>
<hr />
<p style='font-size:25px;'>Ucapan Terima Kasih</p>
<p style='font-size:20px;'>Terima kasih kerana telah memberi maklumbalas yang positif terhadap laman rasmi Portal Terengganu. Kerjasama daripada anda amat kami hargai.</p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

} else {
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='https://jonlejeng.000webhostapp.com/cclub/assets/img/cclub.png' height='100' width='200' /></th>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >e-Participation: Online Feedback System</th>
</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi' ".$custName.",</p>
<hr />
<p style='font-size:25px;'>Ucapan Terima Kasih</p>
<p style='font-size:20px;'>Terima kasih kerana telah menjawab soalan kaji selidik. Segala kesulitan amat kami kesali dan memohon maaf. Kami akan cuba mempertingkatkan lagi Portal Terengganu dan memenuhi kehendak anda.  </p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
}

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: OFS Administrator <ofs.terengganu@gmail.com>' . "\r\n";
$headers .= 'Cc: odf.terengganu@gmail.com' . "\r\n";
$mail = mail($to,$subject,$message,$headers);
if(!$mail) {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-remove-circle'></span> &nbsp; Tidak dapat menghantar e-mel!!
</div>";
} else {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-ok-circle'></span> &nbsp; Emel anda telah berjaya dihantar.
</div>";
}
}
?>

<form class="form-horizontal" action="" method="post">

<?php
if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
<label class="col-sm-9 control-label">Pilihan templates email kepada: <b><?php echo $custName; ?> </b></label>
<div class="col-sm-4">
<select name="email_template" class="form-control" required>
<option value="Pemberitahuan Selamat Datang">Pemberitahuan Selamat Datang</option>
<option value="Ucapan Terima Kasih">Feedback Positif</option>
<option value="Feedback Negatif">Feedback Negatif</option>
</select>
</div>
</div><br>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-5">
<input type="submit" name="send" class="btn btn-sm btn-primary" value="Hantar Email" data-toggle="tooltip" title="Hantar Email">
<a href="admView_feedback.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Kembali">Kembali</a>
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