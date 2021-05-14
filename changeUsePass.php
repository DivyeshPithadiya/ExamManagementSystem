<html>
	<head>
		<title>Exam_Management_System</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script type="text/javascript" src="validation.js"> </script>

	</head>
	
	<body style=background-color:white;;>
	
			<link rel="stylesheet" type="text/css" href="CSS/common.css">  

			<?php require 'navbar.php';  //Navigation bar
        ?> 
			
<!-- 			
			<div class="demo1"> -->
				<div class="changeDetails">
				
					
				<form method="post" action="usepassValidation.php" id="myForm">
					<center>
					<p><font color="#cc0500" size="6"><center><b>Change Username and Password of Admin</font></b></center></p>
					
					<input type="text" name="oname" required placeholder="Enter Your Old Username" style=width:400;height:30;margin-top:30;><br/>
					<input type="password" required  name="opassword" placeholder="Enter Your Old Password" class="demo7"><br/>
					
					<input type="text" name="nname" required placeholder="Enter Your New Username" class="demo7"><br/>
					<input type="password" required  name="npassword" placeholder="Enter Your New Password" class="demo7"><br/>
			
				
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
					
<!-- 
			<div class="demo3">		
			</div> -->
				
				
				</div>
				
		
	
		
		    
	</body>
	
</html>