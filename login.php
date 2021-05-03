<html>
	<head>
	<title>
		Admin Login
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
			
	<?php require 'navbar.php'; //Navigation bar
        ?>

		<div>
			<div class="demo1">
				<div class="demo2">
					<p><font color="#cc0500" size="6"><center><b>Admin Login</font></b></center></p>
					<center>
					
					<form method="post" action="validation.php">
					
					<input type="text" name="name" required placeholder="Enter Your Uername" autofocus class="demo7";>
					<input type="password" required  name="password" placeholder="Enter Your Password" class="demo7">
					
					<?php
						if(isset($_GET['message']))
						{
							echo "<br><br>";
							echo "<font color='red'>";
							echo "$_GET[message]";
							echo "</font>";
						}
					?>
					
					</center>
					
					<button type="submit" class="demo6 btn" style=margin-left:191;>Login</button>
					<button type="reset" class="demo6 btn">Reset</button>
					
							
					<a href="changeUsePass.php" style=color:#cc0500;text-decoration:none;><p style=margin-left:191;>Click here to Change Username and Password</p></a>
					
					</form>
				<div class="demo3">		
			
				</div>
			
			</div>
		</div>


	</body>
	
</html>