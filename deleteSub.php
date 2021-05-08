<html>
	
	<?php

	require 'Connectivity.php';
	
	if(isset($_GET['sem']))
		{
		$sem=$_GET['sem'];
		}
	if(isset($_GET['sub']))
		{
		$sub=$_GET['sub'];
		}
	if(isset($_GET['Scode']))
		{
		$scode=$_GET['Scode'];
		}
	
		$query="delete from subjects where SuID='$scode' and Sub='$sub' and Sem=$sem";
	
		$res=mysqli_query($conn,$query);

		echo mysqli_error($conn);
		//$row=mysqli_fetch_array($res);

	switch($sem)
	{
		case 3:$show="III";
				break;
		case 4:$show="IV";
				break;
		case 5:$show="V";
				break;
		case 6:$show="VI";
				break;
		case 7:$show="VII";
				break;
		case 8:$show="VIII";
				break;
				
	}

	mysqli_commit($conn);
	mysqli_close($conn);

	header("Location:subject.php?message2=$sub Subject Deleted from semester $show && sem=$sem");

	?>
		
</html>