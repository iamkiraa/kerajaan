<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
$customerID = $_SESSION['ID'];

?>
 <div class="container">
 <br/>
   <h1 align="center">Graf Maklumbalas Pelanggan</h1>
   <br /><br />
   
<div id="page-wrapper">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Senarai Graf</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="quest1">
                                        <td>1</td>
                                        <td>Graf Soalan 1</td>
                                        <td>
											<a href="admChart_feed.php" class="btn btn-primary" type ="button">Graf 1</a>
										</td>
                                        
                                    </tr>
									<tr class="quest2">
                                        <td>2</td>
                                        <td>Graf Soalan 2</td>
                                        <td>
											<a href="admChart_feed2.php" class="btn btn-primary" type ="button">Graf 2</a>
										</td>
                                        
                                    </tr>
									<tr class="quest3">
                                        <td>3</td>
                                        <td>Graf Soalan 3</td>
                                        <td>
											<a href="admChart_feed3.php" class="btn btn-primary" type ="button">Graf 3</a>
										</td>
                                        
                                    </tr>
									<tr class="quest4">
                                        <td>4</td>
                                        <td>Graf Soalan 4</td>
                                        <td>
											<a href="admChart_feed4.php" class="btn btn-primary" type ="button">Graf 4</a>
										</td>
                                        
                                    </tr>
									<tr class="quest5">
                                        <td>5</td>
                                        <td>Graf Soalan 5</td>
                                        <td>
											<a href="admChart_feed5.php" class="btn btn-primary" type ="button">Graf 5</a>
										</td>
                                        
                                    </tr>
									<tr class="quest6">
                                        <td>6</td>
                                        <td>Graf Soalan 6</td>
                                        <td>
											<a href="admChart_feed6.php" class="btn btn-primary" type ="button">Graf 6</a>
										</td>
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>	
<br/>
<div class="form-group row">
	<label class="col-sm-5 control-label">&nbsp;</label>
	<div class="col-sm-2">
		<a href="admin.php" class="btn btn-sm btn-info"><span  aria-hidden="true"></span> Kembali</a>
	</div>
</div>	
</div>	