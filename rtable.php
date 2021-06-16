<?php
	include "dbconfig\config.php";
	
	$comittee=$_GET['comittee'];
	$position=$_GET['position'];
	$queryGetElectionID="select electionid,electiondate from election where position='".$position."' and comittee='".$comittee."'";
	$electionid=mysqli_fetch_row(mysqli_query($con,$queryGetElectionID))[0];
	$electionDate=mysqli_fetch_row(mysqli_query($con,$queryGetElectionID))[1];
	
	$queryresult="SELECT name,count(voteid) as votecount,vote.candidateid ";
	$queryresult=$queryresult." from vote inner join candidate on vote.candidateid=candidate.candidateid";
	$queryresult=$queryresult." INNER join student on candidate.studentid=student.studentid";
	$queryresult=$queryresult." where vote.electionid=".$electionid;
	$queryresult=$queryresult." group by vote.candidateid order by voteCount desc";
	
	
	//echo $queryresult;
	$resultsresult=mysqli_query($con,$queryresult);
	$candidateid=mysqli_fetch_row(mysqli_query($con,$queryresult))[2];
	//echo $candidateid;
	$queryfecount="SELECT count(*) * 100.0/80.0 FROM vote WHERE studentid LIKE '1%'"	;
	$querysecount="SELECT count(*) * 100.0/80.0 FROM vote WHERE studentid LIKE '2%'";
	$querytecount="SELECT count(*) * 100.0/80.0 FROM vote WHERE studentid LIKE '3%'";
    $querybecount="SELECT count(*) * 100.0/80.0 FROM vote WHERE studentid LIKE '4%'";
    
    $wvotefe="SELECT count(*) FROM vote WHERE candidateid='$candidateid' and studentid LIKE '1%'";
    $wvotese="SELECT count(*) FROM vote WHERE candidateid='$candidateid' and studentid LIKE '2%'";
    $wvotete="SELECT count(*) FROM vote WHERE candidateid='$candidateid' and studentid LIKE '3%'";
    $wvotebe="SELECT count(*) FROM vote WHERE candidateid='$candidateid' and studentid LIKE '4%'";
    
    $fecount=mysqli_fetch_row(mysqli_query($con,$queryfecount))[0];
    $secount=mysqli_fetch_row(mysqli_query($con,$querysecount))[0];
    $tecount=mysqli_fetch_row(mysqli_query($con,$querytecount))[0];
    $becount=mysqli_fetch_row(mysqli_query($con,$querybecount))[0];
    
    $wfecount=mysqli_fetch_row(mysqli_query($con,$wvotefe))[0];
    $wtecount=mysqli_fetch_row(mysqli_query($con,$wvotete))[0];
    $wsecount=mysqli_fetch_row(mysqli_query($con,$wvotese))[0];
    $wbecount=mysqli_fetch_row(mysqli_query($con,$wvotebe))[0];
    
	//echo $queryresult;
?>

<html>
	<head>
		<center><h1>Result</h1></center>
		<center><h2> Committee: <?php echo $comittee;?></h2></center>
		<center><h2>Position: <?php echo $position;?></h2></center>
	</head>
	<body style="background-color:#F2D7D5">
		<center>
		<table style="text-align:center">
			<tr>
				<th>Candidate</th>
				<th>Vote Count</th>
			</tr>
			<?php
			
				while($result = mysqli_fetch_row($resultsresult)) 
				{?>
					<tr>
						<td><?php echo $result[0];?></td>
						<td><?php echo $result[1];?></td>
					</tr>
					<?php
				}?>
		</table>
	    <br/><br/>
	    
	    <table >
			<tr>
				<th> </th>
			   <th>Participation</th>
			   <th>Winner Votes</th>		
			</tr>
			
			<tr>
				
			   <td><b>FE</b></td>
			   <td><?php echo $fecount;?>%</td>
			   <td><?php echo $wfecount;?></td>
			</tr>
			<tr>
				
			   <td><b>SE</b></td>
			   <td><?php echo $secount;?>%</td>
			   <td><?php echo $wsecount;?></td>
			</tr><tr>
				
			   <td><b>TE</b></td>
			   <td><?php echo $tecount;?>%</td>
			   <td><?php echo $wtecount;?></td>
			</tr><tr>
				
			   <td><b>BE</b></td>
			   <td><?php echo $becount;?>%</td>
			   <td><?php echo $wbecount;?></td>
			</tr>
			
				
			
	    </table>
	    </center>
	</body>	
</html>
