<html>

	<head>
	<title>
		Select Lab
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	
	<body style=background-color:white;>

	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
	<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
	
	<?php require 'FacNav.php'; //Navigation bar
        ?>


	<?php
		session_start();
		if($_SESSION['excessFac'])
		{
	?>


	<?php
	
	require 'Connectivity.php';

	$sem=$_SESSION['sem'];
	$ID=$_SESSION['ID'];

	$q0="select count(Sub) from subjects where Sem=$sem"; // To check whether number of subjects are atleast 5 or not if it is 6 than only give them permission to select leb other wise show message
	$res0=mysqli_query($conn,$q0);
	$row0=mysqli_fetch_array($res0);

	if($row0['count(Sub)']==0)
	{
		echo "<center><p style=color:red;>Sorry ! You can not Store Details now. Please Try Again Later !</p></center>"; 
	}

	else 
	{
	
	$q="select SuID,Sub from subjects where Sem=$sem"; //show the table of subjects of selected semester from information page
	$res=mysqli_query($conn,$q);

	?>
		<form style=margin-left:200; action="information.php" method="POST">
			<button class="demo6 btn" style= height:40px;width:120;>Go Back</button>
		</form>

		<form style=margin-left:200; name="myform" onsubmit="return validate()" method="get" action="storeLabDetails.php" >

				Select Subject <br><select class="demo7" name="subject"  required>

				<?php
					while($row=mysqli_fetch_array($res))
					{
						echo "<option value=".$row['SuID'].">".$row['Sub']."</option>"; //showing subjects in list
					}
				?>
				</select>
				<br>
				<br>
				Select Date I , For Batch 1 and 2<br><input  type="date"  class="demo7" name="date1" ></input>
				<br>
				<br>
				Select Date II ,  For Batch 3 and 4<br><input  type="date"  class="demo7" name="date2" ></input>
				<br>
				<br>
				Select Date III , For Batch 5 and 6<br><input  type="date"  class="demo7" name="date3" ></input>
				<br>
				<br>
				Select Date IV , For Batch 7 and 8<br><input  type="date"  class="demo7" name="date4" ></input>
				<br>
				<button type="submit" class="demo6 btn" style= height:40px;width:120;>Select Dates</button>

				<p name="error" style=color:red;></p>

				<?php

					if(isset($_GET['message']))
					{

						echo "<p style=color:red>".$_GET['message']."</p>";
					}

				?>


		</form>

	

	<div style=position:absolute;left:700;top:80;>

	
			
		<?php

			//Showing the Details of Subjects,Dates and Semesters
			$s="select semester.SemName,subjects.Sub,date1,date2,date3,date4 from lab_exam,subjects,semester where lab_exam.Sub=subjects.SuID and lab_exam.Sem=semester.SemID and lab_exam.Sem=$sem ";
			$sre=mysqli_query($conn,$s);

			echo "<p> <b><u>Semester ".$sem." Subjects and Their Assigned Dates <u></b></p>";
			echo "<table border='2' id='timeTableExport' class='table table-striped'>
			<thead classs='thead-dark'>
				<tr>
					<th>Subject</th>
					<th>Batch1/2</th>
					<th>Batch3/4</th>
					<th>Batch5/6</th>
					<th>Batch7/8</th>
				  </tr>
			</thead>";
			
			while($sro=mysqli_fetch_array($sre))
			{
				echo "<tr>
						<td>".$sro['Sub']."</td>
						<td>".$sro['date1']."</td>
						<td>".$sro['date2']."</td>
						<td>".$sro['date3']."</td>
						<td>".$sro['date4']."</td>
					  </tr>";
			}

			mysqli_commit($conn);
			mysqli_close($conn);


		?>
	</div>


	<script>  // Validate that at least one date is selected or not

		function validate()
		{
			var d1=document.myform.date1.value;
			var d2=document.myform.date2.value;
			var d3=document.myform.date3.value;
			var d4=document.myform.date4.value;

			if((d1=="" || d1==null) && (d2=="" || d2==null) && (d3=="" || d3==null) && (d4=="" || d4==null) )
			{
				alert("Please select at least one Date");
				return false;
			}
		}

	</script>

	
<?php  } ?>


<?php }

		else 
		{
			header("Location:userlogin.php");
		}
	
	?>

</body>

<html>