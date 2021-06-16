<?php
	include "dbconfig\config.php";
	
	$student=$_GET["studentID"];
	$electionid=$_GET["electionid"];
	$candidateid=$_GET["candidate"];
	$queryVote="select count(*) from vote where studentid=" . $student . " and electionid=" .$electionid. " and candidateid=" .$candidateid;
	$resultsVote=mysqli_fetch_row(mysqli_query($con,$queryVote));
	$resultCount=$resultsVote[0];
	
	$queryeDate="select electiondate from election where electionid=" .$electionid;
	$resultseDate=mysqli_fetch_row(mysqli_query($con,$queryeDate));
	$resulteDate=$resultseDate[0];
	//echo "Date from php: ".date("Y-m-d");
	//echo "Date from database: ".$resulteDate;

	$message="";
	$voteInsert="";
	
	if($resultCount==0 && $resulteDate==date("Y-m-d"))
	{
			$voteInsert="insert into vote (candidateid, electionid, studentid) values (" .$candidateid.",".$electionid.",".$student.")";
			mysqli_query($con,$voteInsert);
			$message="Vote has been successfully inserted.";
	}
	else
	{
		$message="Date does not match or You have already submitted vote for this committee and Position.";
		
	}	
?>

<html>
	<head>

	</head>

	<body>
		
		<form action="election.php"> 
			<label><b><?php echo $message;?></b></label>
			<input name="studentID" type=hidden value="<?php echo $student; ?>" />
			<input type="button" onclick='this.form.submit();' value="OK" />
		</form>
	</body>
</html>


