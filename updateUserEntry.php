<?php
	include "dbconfig\config.php";
	
	$studentid=$_GET["studentid"];
	$studentname=$_GET["studentName"];
	$queryStudent="update student set name='".$studentname."' where studentid=" . $studentid;
	$resultsStudent=mysqli_query($con,$queryStudent);	
?>

<DOCTYPE HTML>
<html>
	<head>
		<title>Student Elections</title>
		<link rel="stylesheet" href="css/style.css">
			
	</head>
	<body style="background-color:#7f8c8d">
		
		<div id="main">	
		   <center>
			  <h2>TSEC Committee Elections</h2>
			  <img src="img/tsec.jpg" class="image" >	
		   </center>
		 
		   <form class="myform" action="index.php" method="get">
				<br/><br/>
				
				<label><b>Update Successfully Done. Goto Login Page.</label><br>

				<input type="submit" value="GO" /><br>
		        <br/><br/>
		        

		   </form>
		</div>
		
	</body>
</html>

