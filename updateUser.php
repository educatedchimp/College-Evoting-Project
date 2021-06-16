<?php
	include "dbconfig\config.php";
	
	$student=$_GET["studentID"];
	$queryStudent="select name from student where studentid=" . $student;
	$resultsStudent=mysqli_fetch_row(mysqli_query($con,$queryStudent));
	$studentName=$resultsStudent[0];
	
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
		 
		   <form class="myform" action="updateUserEntry.php" method="get">
				<br/><br/>
				<label><b>Enter Your name to be updated.</label><br>
				<input id="studentid" type="hidden" class="inputvalues" name="studentid" value="<?php echo $student; ?>" /><br>
				<input id="studentName" type="text" class="inputvalues" name="studentName" value="<?php echo $studentName; ?>" /><br>
			
				<br/><br/>
				

				<input type="submit" value="Update" /><br>
		        <br/><br/>
		        

		   </form>
		</div>
		
	</body>
</html>
