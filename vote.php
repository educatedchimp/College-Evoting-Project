<?php
	include "dbconfig\config.php";
	
	$student=$_GET["studentID"];
	$queryStudent="select name from student where studentid=" . $student;
	$resultsStudent=mysqli_fetch_row(mysqli_query($con,$queryStudent));
	$studentName=$resultsStudent[0];
	
	$committee=$_GET["comittee"];
	$position=$_GET["position"];
	$electionQuery="select electionid from election where comittee='".$committee."' and position='".$position."'";
	$electionid=mysqli_fetch_row(mysqli_query($con,$electionQuery));
	
	$candidatelistQuery="select candidateid,name from candidate,student where candidate.electionid=".$electionid[0];
	$candidatelistQuery=$candidatelistQuery." and candidate.studentid=student.studentid";
	$resultsCandidate=mysqli_query($con,$candidatelistQuery);
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
		 
		   <form class="myform" action="votingSubmit.php" method="get">
				<br/><br/>
				<input type="hidden" name="studentID" value="<?php echo $student;?>" />
				<input type="hidden" name="electionid" value="<?php echo $electionid[0];?>" />
				<br/><label><b>Student Name </b></label>: <label><b><?php echo $studentName;?></b></label>
				
				<br/>
				
				<br/><label><b>Commitee Name: </b></label> <label><b><?php echo $committee;?></b></label>
				
				<br/>
				
				<br/><label><b>Position Name:  </label><label><b><?php echo $position;?></b></label>
				<br/>		
				<br/><label><b> Candidates: </b><label/>
				<select name="candidate" style="max-width:90%;">
					<?php
						while($result = mysqli_fetch_row($resultsCandidate)) {
							?>
								<?php	echo '<option value="'. $result[0] . '">' . $result[1] .'</option>';
						}
					?>
				</select>
				<br/><br/>
		        <input type="submit" id="login_btn" value="Vote"><br>
		        <br/><br/>
		   </form>
		</div>
		
	</body>
</html>
