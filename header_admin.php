<!DOCTYPE html>
<html>
<head>
<title>Halaman Admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap4.css">

<!-- Favicons -->
  <link href="img/terengganu.png" rel="icon">
  <link href="img/terengganu1.png" rel="apple-touch-icon">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<style>
.dropdown:hover>.dropdown-menu{
	display: block;
}

body{
margin:0;
background-color: #FFFFFF;
}

.header{
width:1370px;
height:210px;
margin:auto;
}
</style>

<div class="header">
<img src="assets/img/terengganu.png" width="1370px" height="210px">
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
  aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Utama <span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="admView_feedback.php">Senarai Maklumbalas <span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="admRecord_feed.php">Purata Maklumbalas <span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="admSearch_cust.php">Senarai Pengadu <span class="sr-only">(current)</span></a>
      </li>
	 
	  <li class="nav-item active">
        <a class="nav-link" href="logout.php">Log Keluar<span class="sr-only">(current)</span></a>
      </li>
	  
    </ul>
   
  </div>
</nav>
</body>
</html>
