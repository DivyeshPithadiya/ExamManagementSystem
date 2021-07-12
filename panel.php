<html>
	<head>
	<title>
		Admin Panel
	</title>
		<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	<link rel="stylesheet" type="text/css" href="CSS/common.css">



	<?php
	session_start();   //  If Logged in than go to Admin Panel 
	if($_SESSION['excess']) 
	{	
	require 'navbar.php'; //Navigation bar
        ?>

				<div class="panel">

				<center>
				<div>
					<p><font color="#cc0500" size="6"><center><b>Admin Panel</font></b></center></p>
				</div>
				
				<div class="flex-container">
					
					<div>
						<a href="fchangeUsePass.php" class="demo8">
							<span>Change Faculty Username and Password</span><br>
						</a>
					</div>

					<div>
						<a href="notice.php" class="demo8">
							<span>Upload Notice</span>
						</a>
					</div>

					<div>
						<a href="EditLab.php" class="demo8">
							<span>Edit Oral/Practical Time Table</span><br>
						</a>
					</div>

					<div>
						<a href="UT_TT.php" class="demo8">
							<span>Edit Term Test Time Table</span><br>
						</a>
					</div>

					<div>
						<a href="subject.php" class="demo8">
							<span>Subject Details</span>
						</a>
					</div>

					<div>
						<a href="labs.php" class="demo8">
							<span>Edit Lab Details</span>
						</a>
					</div>

					<div>
						<a href="facDetails.php" class="demo8">
							<span>Internal Faculty Details</span>
						</a>
					</div>

					<div>
						<a href="exFacultyDetails.php" class="demo8">
							<span>External Faculty Details</span>
						</a>
					</div>

				</div>
				</center>

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