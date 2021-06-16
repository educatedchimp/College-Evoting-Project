
<?php
	include "dbconfig\config.php";
	
	
	$queryComittee="SELECT distinct(comittee) FROM election";
	$queryPosition="SELECT distinct(position) FROM election";
	
	$resultsComittee=mysqli_query($con,$queryComittee);
	$resultsPosition=mysqli_query($con,$queryPosition);
	
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Committee Elections</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body style="background-color:#7f8c8d">
		
		<div id="main">	
		   <center>
			  <h2>TSEC Committee Elections</h2>
			  <img src="img/tsec.jpg" class="image" >	
		   </center>
		 
		   <form class="myform" action="rtable.php" method="get">
			    
				
				<br/><label><b>Commitee Name </label><br/>
				<select name="comittee" style="max-width:90%;">
					<?php
						while($result = mysqli_fetch_row($resultsComittee)) {
							?>
								<?php	echo '<option value="'. $result[0] . '">' . $result[0] .'</option>';
						}
					?>
				</select>
				
				<br/><br/><label><b>Position </label><br>
				<select name="position">
					<?php
						while($result = mysqli_fetch_row($resultsPosition)) {
							?><label><b>Commitee Name </label><br/>
								<?php	echo '<option value="'. $result[0] . '">' . $result[0] .'</option>';
						}
					?>
				</select>
				<br>
				
		        <br/><input type="submit" id="login_btn" value=" Result "><br/><br/>
		   </form>
		</div>
		
	</body>
</html>
	
