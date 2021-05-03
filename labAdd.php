<html>
	<?php

		if(isset($_GET['LID']))
		{
			$LID=$_GET['LID'];
		}
		if(isset($_GET['Lname']))
		{
			$Lname=$_GET['Lname'];
		}

		require 'Connectivity.php';

		$q0="select count(*) from labs "; //to count number of rows in labs if it is greter than 10 than do not accept 
		$res0=mysqli_query($conn,$q0);
		$row0=mysqli_fetch_array($res0);

		if($row0['count(*)']<20)
		{

			$q="select count(labID) from labs where labID=$LID or labname='$Lname' ";// check whether same lab is already present in database or not 
			$res=mysqli_query($conn,$q);
			$row=mysqli_fetch_array($res);

			if($row['count(labID)']==0)
			{

				$q1="insert into labs(labID,labname) values($LID,'$Lname')"; //insert data into gthe labs table
				$res1=mysqli_query($conn,$q1);

				header("Location:labs.php?message=Lab Added ");
			}
			else 
			{
				if($row['count(labID)']>0)
				{

					header("Location:labs.php?message=This Lab Number or Lab Name is Already Exist");

				}

			}
		}
		else 
		{
		
			header("Location:labs.php?message=Only Twenty Labs are accepted");
		}

		mysqli_commit($conn);
		mysqli_close($conn);
	?>
</html>