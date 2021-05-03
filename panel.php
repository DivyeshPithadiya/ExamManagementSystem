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
	session_start();
	if($_SESSION['excess'])
	{	
	require 'navbar.php'; //Navigation bar
        ?>
			<div class="demo1">
				<div class="demo2">

				<p><font color="#cc0500" size="6"><center><b>Admin Panel</font></b></center></p>

				<ul>
				
					<a href="fchangeUsePass.php" class="demo8">
						<span>1.  Change Faculty Username and <br>Password</span><br>
					</a>
					
					<a href="EditLab.php" class="demo8" style="position:absolute;top:160px;">
						<span>2.  Edit Oral/Practical Time Table</span><br>
					</a>
					
					<a href="UT_TT.php" class="demo8" style="position:absolute;top:220px;">
						<span>3.  Edit Term Test Time Table</span><br>
					</a>
					
					<a href="notice.php" class="demo8" style="position:absolute;top:290px;">
						<span>4.  Upload/Delete Notice</span>
					</a>
					<br>
					<a href="subject.php" class="demo8" style="position:absolute;top:360px;">
						<span>5.  Subject Details</span>
					</a>

					<a href="labs.php" class="demo8" style=position:absolute;left:450;top:78;>
						<span>6.  Edit Lab Details</span>
					</a>

					<a href="facDetails.php" class="demo8" style=position:absolute;left:450;top:155;>
						<span>7.  Internal Faculty Details</span>
					</a>

					<a href="exFacultyDetails.php" class="demo8" style=position:absolute;left:450;top:220;>
						<span>8.  External Faculty Details</span>
					</a>

				</ul>
				<div class="demo3">	
				</div>	
			</div>
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