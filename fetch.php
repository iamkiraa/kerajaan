<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connection = mysqli_connect("localhost", "root", "", "maklumbalas_db");
 $request = mysqli_real_escape_string($connection, $_POST["query"]);
 $query = "
  SELECT * FROM customer 
  WHERE customerID LIKE '%".$request."%' 
  OR custName LIKE '%".$request."%' 
  OR custGender LIKE '%".$request."%' 
  OR custDOB LIKE '%".$request."%' 
  OR custAddress LIKE '%".$request."%' 
  OR custNO LIKE '%".$request."%' 
  OR custEmail LIKE '%".$request."%'
 ";
 $result = mysqli_query($connection, $query);
 $data =array();
 $html = '';
 $html .= '
  <table width="100%" class="table table-striped table-bordered table-hover">
   <tr>
   <th>No IC</th>
    <th>Nama</th>
    <th>Jantina</th>
	<th>Tarikh Lahir</th>
	<th>Alamat</th>
	<th>No Telefon</th>
    <th>Email</th>
	<th>Tindakan</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["customerID"];
   $data[] = $row["custName"];
   $data[] = $row["custGender"];
   $data[] = $row["custDOB"];
   $data[] = $row["custAddress"];
   $data[] = $row["custNO"];
   $data[] = $row["custEmail"];
   
   $html .= '
   <tr>
    <td>'.$row["customerID"].'</td>
	<td>'.$row["custName"].'</td>
	<td>'.$row["custGender"].'</td>
	<td>'.$row["custDOB"].'</td>
	<td>'.$row["custAddress"].'</td>
    <td>'.$row["custNO"].'</td>
    <td>'.$row["custEmail"].'</td>
	<td>
	<center>	
		<a href="admView_cust.php?action=delete&customerID='.$row['customerID'].'" title="Keluarkan Data" data-toggle="tooltip" onclick="return confirm(\'Anda pasti ingin keluarkan data'.$row['custName'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	</center>	
	
	</td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'Tiada maklumat dijumpai';
  $html .= '
   <tr>
    <td colspan="3">Tiada maklumat dijumpai</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>