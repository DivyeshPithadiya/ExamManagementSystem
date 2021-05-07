<html>
	<head>
	<title>
		Admin Login
	</title>
		<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	</head>
	
	<body style=background-color:white;>
	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
			
	<?php 
	session_start();
	if(!isset($_SESSION['excess']))
	{	
	require 'navbar.php'; //Navigation bar
        ?>

		<!-- <div> -->
			<!-- <div class="demo1"> -->
				<div class="login">
					<p><font color="#cc0500" size="6"><center><b>Admin Login</font></b></center></p>
					<center>
					
					<form method="post" action="validation.php">
					
					<input type="text" name="name" required placeholder="Enter Your Username" autofocus class="demo7";><br>
					<input type="password" required  name="password" placeholder="Enter Your Password" class="demo7"><br>
					
					<?php
						if(isset($_GET['message']))
						{
							echo "<br><br>";
							echo "<font color='red'>";
							echo "$_GET[message]";
							echo "</font>";
						}
					?>

					
					<button type="submit" class="demo6 btn">Login</button>
					<button type="reset" class="demo6 btn" style="margin-right:235px;">Reset</button>
					
					<a href="changeUsePass.php" style=color:#cc0500;text-decoration:none;><p style=margin-right:80px;>Click here to Change Username and Password</p></a>

					</center>
										
					</form>
				<!-- <div class="demo3">		
			
				</div>
			
			</div> -->
		</div>
	<?php
	}
	else
	{
		header("Location:panel.php");
	}
	?>

	</body>
	
</html>