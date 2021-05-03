<html>
	<head>
	<title>
		Update Lab
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	<link rel="stylesheet" type="text/css" href="CSS/common.css">

	<?php require 'navbar.php'; //Navigation bar
        ?>
		
	<?php

		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
		}
		if(isset($_GET['date1']))
		{
			$date1=$_GET['date1'];
		}
		if(isset($_GET['date2']))
		{
			$date2=$_GET['date2'];
		}
		if(isset($_GET['date3']))
		{
			$date3=$_GET['date3'];
		}
		if(isset($_GET['date4']))
		{
			$date4=$_GET['date4'];
		}

		session_start();

		$_SESSION['id']=$id;



		//header("Location:EditLab.php")
	?>

		<center>
		<form method="post" action="allocateLab.php" >
		
		Select Date I , For Batch 1<br><input  type="date"  class="demo7" name="date1" <?php echo "value='$date1' " ?> ></input>
		<br>
		<br>
		Select Date II ,  For Batch 2<br><input  type="date"  class="demo7" name="date2" <?php echo "value='$date2' " ?> ></input>
		<br>
		<br>
		Select Date III , For Batch 3<br><input  type="date"  class="demo7" name="date3" <?php echo "value='$date3' " ?>></input>
		<br>
		<br>
		Select Date IV , For Batch 4<br><input  type="date"  class="demo7" name="date4" <?php echo "value='$date4' " ?>></input>
		<br>
		<br>
		<?php

		require "Connectivity.php";
		$q="select * from labs";
		$r=mysqli_query($conn,$q);
		
		echo "Select Lab <br>
		<select class='demo7' name='lab'  required>";

					while($row=mysqli_fetch_array($r))
					{
						echo "<option value='$row[labID]'>".$row['labID']."-".$row['labname']."</option>"; //showing semester in list
					}
		echo  "</select><br>";

         
		mysqli_commit($conn);
		mysqli_close($conn);

		?>

		<button type="submit" class="demo6 btn" style= height:40px;width:120;>Select Lab</button>

		</form>
		</center>

	</body>

</html>