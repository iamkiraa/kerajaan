<?php
include('check_admin.php'); //check if user is a Administrator
include('header_admin.php'); //load header content for Administrator page
include("connection.php"); // connction to database
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Senarai Pengadu</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 </head>
 <body>
  
  <div class="container">
   <h1 align="center">Senarai Pengadu</h1>
   <br /><br />
   <label>Carian Maklumat Pengadu</label>
   <div id="search_area">
    <input type="text" name="customer_search" id="customer_search" class="form-control input-lg" autocomplete="off" placeholder="Details Pengadu" />
   </div>
   <br />
   <br />
   <div id="customer_data"></div>
  </div>
  
  <div class="form-group row">
	<label class="col-sm-6 control-label">&nbsp;</label>
	<div class="col-sm-4">
		<a href="admin.php" class="btn btn-sm btn-info"><span  aria-hidden="true"></span> Kembali</a>
	</div>
  </div>
  
 </body>
</html>

<script>
$(document).ready(function(){
 
 load_data('');
 
 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#customer_data').html(data);
   }
  });
 }
 
 $('#customer_search').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data){
     result($.map(data, function(item){
      return item;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });
 
 $(document).on('click', 'li', function(){
  var query = $(this).text();
  load_data(query);
 });
 
});
</script>

