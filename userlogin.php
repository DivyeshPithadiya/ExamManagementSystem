<html>
	<head>
	<title>
		Faculty Login
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	
			<link rel="stylesheet" type="text/css" href="CSS/common.css">
			<?php require 'FacNav.php'; //Navigation bar
        ?>
			<!-- <div class="demo1"> -->
				<div class="login">
					<p><font color="#cc0500" size="6"><center><b>Faculty Login</font></b></center></p>
					<center>
					
					<form method="post" action="userValidation.php">
					
					<input type="text" name="uname" required placeholder="Enter Username" class="demo7"  autofocus><br>
					<input type="password" required  name="upassword" placeholder="Enter Password" class="demo7"><br>
					
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
					<button type="reset" class="demo6 btn"style="margin-right:235px;">Reset</button>
					
					</center>

					
					
					</form>
			
<!-- 
			<div class="demo3">		
				</div> -->
				
				
			</div>
		
	</body>
	
</html>