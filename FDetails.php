<html>
	<?php
		//page to take information about Internal faculty and External faculty
		require 'Connectivity.php';
	
		session_start();

		
			$_SESSION['ID']=$_POST['ID'];
			$_SESSION['Fname']=$_POST['Fname'];
			$_SESSION['Lname']=$_POST['Lname'];
			$_SESSION['exam']=$_POST['exam'];
			$_SESSION['Ename']=$_POST['Ename'];	
			$_SESSION['subexp']=$_POST['subexp'];
			$_SESSION['mail']=$_POST['mail'];
			$_SESSION['mobile']=$_POST['mobile'];
			$_SESSION['sem']=$_POST['sem'];
			$_SESSION['college']=$_POST['college'];
			
			
			mysqli_commit($conn);
			mysqli_close($conn);

			header('Location:selectLab.php');
			
	/*
		THIS CODE WILL BE WRITTEN AFTER TAKING THE DATA OF LAB AND DATES

	
	*/

	
	?>
	
</html>