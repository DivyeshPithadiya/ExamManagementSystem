<html>
	<?php

		if(isset($_GET['LID']))
		{
			$LID=$_GET['LID'];
		}

		require 'Connectivity.php';

		$q="delete from labs where labID=$LID ";
		$res=mysqli_query($conn,$q);

		mysqli_commit($conn);
		mysqli_close($conn);

		header('Location:labs.php');
	?>
</html>