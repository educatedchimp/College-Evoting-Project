<?php

?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Student Elections</title>
		<link rel="stylesheet" href="css/style.css">
		
		<script>
				function submitForm()
				{
					var id=document.getElementById("studentID").value;
					var password=document.getElementById("password").value;
					if(id!=password)
					{
						alert("Incorrect Password.Enter correct password.");
					}
					else
					{
						if(id=="admin")
						{	
							window.location.replace("http://localhost/Evoting/result.php");
						}
						else
						{
							window.location.replace("http://localhost/Evoting/election.php?studentID=" + id);
						}
					}
				}
				
				function updateForm()
				{
					var id=document.getElementById("studentID").value;
					var password=document.getElementById("password").value;
					if(id!=password)
					{
						alert("Incorrect Password.Enter correct password.");
					}
					else
					{
						if(id=="admin")
						{	
							alert("Admin details cannot be updated");
						}
						else
						{
							window.location.replace("http://localhost/Evoting/updateUser.php?studentID=" + id);
						}
					}
				}
		</script>
			
	</head>
	<body style="background-color:#7f8c8d">
		
		<div id="main">	
		   <center>
			  <h2>TSEC Committee Elections</h2>
			  <img src="img/tsec.jpg" class="image" >	
		   </center>
		 
		   <form class="myform" action="election.php" method="get">
				<br/><br/>
				
				<label><b>Student ID </label><br>
				<input id="studentID" type="text" class="inputvalues" name="studentID" placeholder="Enter your ID" /><br>
			
				<br/><br/>
				
				<label><b>Password </label><br>
				<input id="password" type="password" class="inputvalues" name="password" placeholder="************" /><br>
			
				<br/><br/>
				
				<input type="button" onclick="submitForm()" id="login_btn" value="Login"><br>
		        <br/><br/>
				
				<input type="button" onclick="updateForm()" id="login_btn" value="Update"><br>
		        <br/><br/>
		        
		   </form>
		</div>
		
	</body>
</html>
