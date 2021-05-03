<html>
	<head></head>
	<body>
	
		<?php
		$user=$_POST['name'];
		$pass=$_POST['password'];
		
		require "Connectivity.php";

		$query="select * from admin where id=1";
		$res=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($res);
		
		if($user==$row['username'] && $pass==$row['password'])
		{
			header("Location:panel.php");
			session_start();
			$_SESSION['excess']=true;
		}
		else
		{
			header('Location:login.php?message=Invalid Username or Password');
		}
			
		mysqli_commit($conn);
        mysqli_close($conn);
		?>
	</body>
</html>