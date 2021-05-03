<html>

	<head>
	<title>
		Lab Details
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
	<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
	
	<?php require 'navbar.php'; //Navigation bar
        ?>

<?php 
	session_start();
	if($_SESSION['excess'])
	{
		?>
	
		<div>
		<center>

			<p><font color="#cc0500" size="6"><center><b>Lab Deteils</font></b></center></p>

			<form method="get" action="labAdd.php">

				<input type="number" placeholder="Enter Lab Number" class="demo7" name="LID" required></input>
				<br>	
				<input type="text" placeholder="Enter Lab Name" class="demo7" name="Lname" required></input>
				<br>
				</select>
				<br>
				<button type="submit" class="demo6 btn" style= 'height:40px'>Add</button>	
			</form>

			<?php

				if(isset($_GET['message']))  //Used to print message coming from labAdd.php page 
				{
					$message=$_GET['message'];
					if(strncmp($message,'Lab Added',9)==0)
						{
						echo "<center><font size='5'><p style=color:green;>$message</p></center>";
						}
						else 
						{
						echo "<center><font size='5'><p style=color:red;>$message</p></center>";	
						}
				}


			?>

			<?php

			require 'Connectivity.php';
			$q="select * from labs"; // show details of Lab
			$res=mysqli_query($conn,$q);

			?>
			<table border="2">
				<tr>
					<th>Lab Number</th>
					<th>Lab Name</th>
					<th>Delete</th>
				</tr>

			<?php
				while($row=mysqli_fetch_array($res))
				{
					echo "<tr>
							<td>$row[labID]</td>
							<td>$row[labname]</td>
							<td><a href='deleteLab.php?LID=$row[labID]'>Delete</a></td> 
						  </tr>";

				}

				mysqli_commit($conn);
				mysqli_close($conn);
			?>

			</table>

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