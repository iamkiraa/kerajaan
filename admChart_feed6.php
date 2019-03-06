<?php  
 $connection = mysqli_connect("localhost", "root", "", "maklumbalas_db");  
 $query = "SELECT quest6, COUNT(*) AS number FROM feedback GROUP BY quest6";  
 $result = mysqli_query($connection, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Graf Maklumbalas</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Quest6', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["quest6"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '6. Berapa penilaian anda untuk Portal Terengganu kami?',  
                      //is3D:true,  
                      pieHole: 0.0
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
		   
		    <!-- Favicons -->
			  <link href="img/terengganu.png" rel="icon">
			  <link href="img/terengganu1.png" rel="apple-touch-icon">
		   
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Graf Maklumbalas Pelanggan</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div> 
		   <div align="center" class="form-group row">
				<label class="col-sm-5 control-label">&nbsp;</label>
				<div class="col-sm-2">
					<a href="admRecord_feed.php" class="btn btn-sm btn-info"><span  aria-hidden="true"></span> Kembali</a>
				</div>
			</div>
 <br/>
      </body>  
 </html> 