<?php
include 'check_admin.php'; //check if user is a Administrator
include 'header_admin.php'; //load header content for Administrator page
include "connection.php"; // connction to database
?>
<div class="container" style="margin-top:30px">
<div class="content">
<h2>Senarai Maklumbalas</h2>
<hr/>

<?php

if (isset($_GET['action']) == 'delete') {
    // if remove button clicked
    $customerID = $_GET['customerID']; // get customerID value
    $check      = mysqli_query($connection, "SELECT * FROM customer WHERE customerID='$customerID'"); // query for selected ic number
    if (mysqli_num_rows($check) == 0) { // if no customerID selected
        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Tiada data yang dijumpai.</div>'; // display message no data found.'
    } else {
        // if there are data found
        $delete = mysqli_query($connection, "DELETE FROM customer WHERE customerID='$customerID'"); // query for removing data
        if ($delete) { // if delete query succesfull
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berjaya dikeluarkan.</div>'; // display message data removed'
        } else { // if delete query unsuccesfull
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Tidak boleh keluarkan data.</div>'; // display message cannot remove data'
        }
    }
}
?>
<!-- start responsive table-->
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover">
<tr>
<th>No</th>
<th>No IC</th>
<th>Nama Pengadu</th>
<th>Soalan 1</th>
<th>Soalan 2</th>
<th>Soalan 3</th>
<th>Soalan 4</th>
<th>Soalan 5</th>
<th>Soalan 6</th>
<th>Soalan 7</th>
<th>Soalan 8</th>
<th>Tarikh</th>
<th>Tindakan</th>
</tr>

<?php

//Learn to use left join SQL Query, lagi senang nak join table
$sql = mysqli_query($connection, "SELECT  f.feedback_id, f.customerID, f.quest1, f.quest2, f.quest3, f.quest4,
									f.quest5, f.quest6, f.quest7, f.quest8, f.date, c.custName as cName
							FROM feedback f LEFT JOIN customer c
							ON c.customerID = f.customerID
							ORDER BY customerID ASC"); // query for selecting ic number from db

//$sql = mysqli_query($connection, "SELECT * FROM feedback ORDER BY customerID ASC");
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="14">Tiada data yang diambil.</td></tr>'; // if no data retrieved from database
} else {
    // if there are data
    $no = 1; // start from number 1
    while ($row = mysqli_fetch_assoc($sql)) {
        // fetch query into array
        // Use the column name from the TABLE, do not confuse using the column name from the QUERY
        // $row = [f.feedback_id] == WRONG
        // $row = [feedback_id] == TRUE
        echo '
<tr>
<td>' . $no . '</td>
<td>' . $row['customerID'] . '</td>
<td>' . $row['cName'] . '</td>
<td>' . $row['quest1'] . '</td>
<td>' . $row['quest2'] . '</td>
<td>' . $row['quest3'] . '</td>
<td>' . $row['quest4'] . '</td>
<td>' . $row['quest5'] . '</td>
<td>' . $row['quest6'] . '</td>
<td>' . $row['quest7'] . '</td>
<td>' . $row['quest8'] . '</td>
<td>' . $row['date'] . '</td>
<td>
<center>
<a href="email.php?customerID='.$row['customerID'].'" title="Hantar Email" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
<a href="admprofile_cust.php?customerID='.$row['customerID'].'" title="Profil Pengadu" data-toggle="tooltip" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
<a href="admView_feedback.php?action=delete&customerID=' . $row['customerID'] . '" title="Keluarkan Data" data-toggle="tooltip" onclick="return confirm(\'Anda pasti ingin keluarkan data' . $row['cName'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
</center>
</td>
</tr>
';
        $no++; // next number
    }
}
?>
</table>
</div> <!-- /.table-responsive -->
<br>
</div> <!-- /.content -->
</div> <!-- /.container -->
</body>
</html>
