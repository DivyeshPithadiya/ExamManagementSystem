<html>
	<?php
	
		require 'Connectivity.php';
	
		if(isset($_GET['Scode']))
		{
			$scode=$_GET['Scode'];
		}

		if(isset($_GET['Sname']))
		{
			$sub=$_GET['Sname'];
		}

		if(isset($_GET['SemName']))
		{
			$sem=$_GET['SemName'];
		}
		
		$query="select count(Sub) from subjects where Sub='$sub' || SuID='$scode' "; //to check wheather same subject is aready present in table or not
		$result=mysqli_query($conn,$query);
		$rowCount=mysqli_fetch_array($result);
		
		
		$q1="select count(Sub) from subjects where Sem= $sem ";
		$res1=mysqli_query($conn,$q1);
		$row1=mysqli_fetch_array($res1);
		
		if($rowCount['count(Sub)']==0)
		{
			if($row1['count(Sub)']<8)
			{
				$q2="insert into subjects(SuID,Sub,Sem) values('$scode','$sub',$sem)";
				$res2=mysqli_query($conn,$q2);
		
				header("Location:subject.php?message=Subject Added && sem=$sem" );
			}
			else 
			{
				header("Location:subject.php?message=Can not add more than Eight Subjects for one Semester && sem=$sem ");
			}
		}
		else 
		{
			if($rowCount['count(Sub)']>0)
			{
			header("Location:subject.php?message=This Subject Code or Subject Name Already Exist For This or Another Semester && sem=$sem");
			}
	}
	
	mysqli_commit($conn);
	mysqli_close($conn);
	?>
	
</html>