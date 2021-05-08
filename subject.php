<html>

	<?php
	require 'Connectivity.php';  //import connectivity code from Connectivity.php
	$query="select SemName from semester"; //Executing Query
	$res=mysqli_query($conn,$query); // Performing Query and result stored in $res 
	?>
	<head>
	<title>
		Shubject Details
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<?php 
	session_start();
	if($_SESSION['excess'])
	{
		?>

	<body style=background-color:white;>
	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
	<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
	
	
	<?php require 'navbar.php'; //Navigation bar
        ?>
		<div style="box-shadow: 0 0 8px #666;width:50%;margin-left:25%;padding:20px;border-radius:10px;">
		<center>

			<p><font color="#cc0500" size="6"><center><b>Subject Deteils</font></b></center></p>

			<form method="get" action="subjectAdd.php">

				<input type="text" placeholder="Enter Subject Code to be added" class="demo7" name="Scode" required></input>
				<br>	
				<input type="text" placeholder="Enter Subject to be added" class="demo7" name="Sname" required></input>
				<br>
				<select class="demo7" name="SemName" required>
				<?php
					$i=3;
					while($row=mysqli_fetch_array($res))
					{
						echo "<option value=$i>$row[SemName]</option>";
						$i++;
					}
				?>
				
				</select>
				<br>
				<button type="submit" class="demo6 btn">Add</button>	
			
				<?php
				if(isset($_GET['message']))
					{
						$message=$_GET['message'];
						if(strncmp($message,'Subject Added',13)==0)
						{
						echo "<center><font size='5'><p style=color:green;>$message</p></center>";
						}
						else 
						{
						echo "<center><font size='5'><p style=color:red;>$message</p></center>";	
						}
					}
				?>
				<?php                          //Display All Subject of Semester
					if(isset($_GET['sem']))
					{
						$sem=$_GET['sem'];
						
						if($sem==3)
						{
							$show="III";
						}
						else
						{
							if($sem==4)
							{
							$show="IV";
							}
							else 
							{
								if($sem==5)
								{
									$show="V";
								}
								else 
								{
									if($sem==6)
									{
									$show="VI";
									}
									else 
									{
										if($sem==7)
										{
											$show="VII";
										}
										else 
										{
											if($sem==8)
												{
													$show="VIII";
												}
										}
									}
									
								}
							}
							
						}
						
						echo "<br><br>";
						echo "<p><b><u>Subjects Of Semester $show</u></b></p>"; //just for printing the statement
					
						$s1query="select SuID,Sub,Sem from subjects where Sem=$sem";
						$s1res=mysqli_query($conn,$s1query);
						echo "<table border='2' class='table-striped'>
							<tr>
							<thead class='thead-dark'>
								<th>Subject Code</th>
								<th>Subject</th>
								<th>Delete</th>
							</thead>
							</tr>";
						while($s1row=mysqli_fetch_array($s1res))
						{
					  echo "<tr>
					  			<td>$s1row[SuID]</td>
								<td>$s1row[Sub]</td>
								<td><a href='deleteSub.php?sub=$s1row[Sub] && sem=$s1row[Sem] && Scode=$s1row[SuID]'>Delete</a></td>
							</tr>";
						}
					}
				
					echo "</table>";

				?>
				<?php
					if(isset($_GET['message2']))
					{
						$message2=$_GET['message2'];
						echo "<center><font size='5'><p style=color:green;>$message2</p></center>"; //displaying message for deleting sub
					}
				
				?>
				
			</form>
		</center>
		</div>
	
	<?php 
	}

	else 
	{
		header("Location:login.php");
	
	}

	mysqli_commit($conn);
	mysqli_close($conn);
	?>
	
	
	<div class="flex-container-subjects" style="margin-top:40px;">
		
		<div><a href="subject.php?sem=3" style=text-decoration:none;color:#cc0500;><center><P>Semeter III Subjects</p></center></a></div>
		<div><a href="subject.php?sem=4" style=text-decoration:none;color:#cc0500;><center><P >Semeter IV Subjects</p></center></a></div>
		<div><a href="subject.php?sem=5" style=text-decoration:none;color:#cc0500;><center><P >Semeter V Subjects</p></center></a></div>
		<div><a href="subject.php?sem=6" style=text-decoration:none;color:#cc0500;><center><P >Semeter VI Subjects</p></center></a></div>
		<div><a href="subject.php?sem=7" style=text-decoration:none;color:#cc0500;><center><P>Semeter VII Subjects</p></center></a></div>
		<div><a href="subject.php?sem=8" style=text-decoration:none;color:#cc0500;><center><P>Semeter VIII Subjects</p></center></a></div>
		
	</div>
	
	</body>
	
</html>