<?php
	include "dbconfig\config.php";
	
	$student=$_GET["studentID"];
	$queryStudent="select name from student where studentid=" . $student;
	$queryComittee="SELECT distinct(comittee) FROM election";
	$queryPosition="SELECT distinct(position) FROM election";
	
	$resultsComittee=mysqli_query($con,$queryComittee);
	$resultsPosition=mysqli_query($con,$queryPosition);
	$resultsStudent=mysqli_fetch_row(mysqli_query($con,$queryStudent));
	$studentName=$resultsStudent[0];
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Committee Elections</title>
		<link rel="stylesheet" href="css/style.css">
		
		<script type="text/javascript">
				function goBack()
				{
					window.location.replace('http://localhost/Evoting');
				}
		</script>
	</head>
	
	<body style="background-color:#7f8c8d">
		
		<div id="main">	
		   <center>
			  <h2>TSEC Committee Elections</h2>
			  <img src="img/tsec.jpg" class="image" >	
		   </center>
		 
		   <form class="myform" action="vote.php" method="get">
			    <input type="hidden" name="studentID" class="inputvalues" value="<?php echo $student; ?>"><br>
				<br/><label><b><?php echo $studentName; ?> </label><br>
				
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
				
		        <br/><input type="submit" id="login_btn" value="Register Vote "><br/><br/>
					
					<input type="button" onclick="goBack()" value="Back" /><br/><br/>
		      </form>
		      
		      
		   
		</div>
		
	</body>
</html>
