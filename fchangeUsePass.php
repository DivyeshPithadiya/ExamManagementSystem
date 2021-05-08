<html>
	<head>
	<title>
		Faculty Login Credentials
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script type="text/javascript" src="validation.js"> </script>
	</head>
	
	<body style=background-color:white;>
	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
	<?php require 'navbar.php'; //Navigation bar
        ?>
	<?php 
	session_start();
	if($_SESSION['excess'])
	{
		?>
			
				<div class="panel">
								
					<form method="post" id="myForm"  action="fusepassValidation.php">
						<center>
						<p><font color="#cc0500" size="6"><center><b>Change Username and Password of Faculty</font></b></center></p>
						
						<input autofocus type="text" name="oname" required placeholder="Enter Faculty Old Username" style=width:400;height:30;margin-top:30;><br/>
						<input type="password" required  name="opassword" placeholder="Enter Faculty Old Password" class="demo7"><br/>
						
						<input type="text" name="nname" required placeholder="Enter Faculty New Username" class="demo7"></br>
						<input type="password" required  name="npassword" placeholder="Enter Faculty New Password" class="demo7"><br/>
				
					
						<button type="submit" class="demo6 btn">Submit</button>
						<button type="reset" class="demo6 btn" style="margin-right:235px;">Reset</button>

						</center>
					
						<center>
						<?php
						echo "<font style=color:#cc0500>";
							if(isset($_GET['message']))
							{
								echo $_GET['message'];
							}
						echo "</font>";
						?>
						</center>
					</form>
					
				</div>
				
		
	
	<?php
	}
	
	else 
	{
		header("Location:login.php");
	}
	?>
		
	</body>
	
</html>