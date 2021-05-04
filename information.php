<html>
	<head>
	<title>
		Faculty Information
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script type="text/javascript" src="validation.js"> </script>

<script type="text/javascript">
function validate()
{
var number =document.getElementById("mobile").value;
var regx =/^[6-9][0-9]{9}$/;
if(regx.test(number))
{
return true;
}
else
{
document.getElementById("p").innerHTML = "Number must start with 6 or 7 or 8 or 9";
return false;
}
}
</script>


	</head>
	
	<?php
		session_start();
		if($_SESSION['excessFac'])
		{
	?>
	<body style=background-color:white;>
			
			<link rel="stylesheet" type="text/css" href="CSS/common.css"></link>
			<?php require 'FacNav.php'; //Navigation bar
        ?>
	
	</div>
				
				<p><font color="#cc0500" size="6"><center><b>Faculty Information</font></b></center></p>
					
				<form method="post" id="myForm" action="FDetails.php">

			<fieldset style="margin-left:200;margin-right:200;;padding:10;border:solid 1px;">
			<legend style=width:auto;font-size:20;>Internal Faculty Details</legend>
					<input type="number" name="ID" required placeholder="Internal Faculty ID Number"  class="demo5" autofocus><br>
					<input type="text" name="Fname" required placeholder="Internal Faculty First Name"  class="demo5"><br>
					<input type="text" name="Lname" required placeholder="Internal Faculty Last Name"  class="demo5"><br>
			</fieldset><br>
					
			<fieldset style="margin-left:200;margin-right:200;;padding:10;border:solid 1px;">
			<legend style=width:auto;font-size:20;>External Faculty Details</legend>	
					<input type="text" required  name="Ename" placeholder="Examiner Full Name" class="demo5"><br>
					<input type="text" name="college" required placeholder="Examiner College/Institute"  class="demo5"><br>
					
					<input type="number" name="subexp" required placeholder="Examiner Experience"  class="demo5"><br>
					<input type="email" name="mail" required placeholder="Examiner Email"  class="demo5"><br>
					<input type="text" required id="mobile" name="mobile" maxlength="10" placeholder="Examiner Mobile Number"  class="demo5"> <p id="p"></p><br>
			</fieldset><br>	
				
			<fieldset style="margin-left:200;margin-right:200;;padding:10;border:solid 1px;">
			<legend style=width:auto;font-size:20;>Exam Details</legend>	
			
					<select name='sem' required  class='demo5'>
					
					<?php
						
						require 'Connectivity.php';
						
						$query="select SemName from semester";
						
						$res=mysqli_query($conn,$query);
					
						$i=3;
						while($row=mysqli_fetch_array($res))
						{
						echo "<option value='$i'>$row[SemName]</option>";  
						$i++;                                              //Retewing semester names from database
						}

						mysqli_commit($conn);
						mysqli_close($conn);

					?>
					
					</select><br>

					<select name="exam" required style=width:300;height:30;margin-top:30;>
				
					<option>Oral Exam</option>
					<option>Practical Exam</option>
					</select>

					<br>

			</fieldset><br>	
					<button onclick="return validate()" type="submit" class="demo6 btn" style="margin-left:200">Next>></button>
					<button type="reset" class="demo6 btn">Reset</button>


					<?php

						if(isset($_GET['message']))
						{
							echo "<center><font size='6'><p style= color:green;>".$_GET['message']."</font></p></center>";
						}
					?>

				</form>
				
	<?php
		}

		else 
		{
			header("Location:userlogin.php");
		}

	?>		
	</body>
	
</html>