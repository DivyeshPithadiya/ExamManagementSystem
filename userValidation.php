<html>
	<head></head>
	<body>
	
		<?php
		$user=$_POST['uname'];
		$pass=$_POST['upassword'];
		
		require "Connectivity.php";
		
		$query="select * from admin where id=2";
		$res=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($res);
		
		if($user==$row['username'] && $pass==$row['password'])
		{
			header("Location:information.php");
			session_start();
			$_SESSION['excessFac']=true;
			
		}
		else
		{
			header('Location:userlogin.php?message=Invalid Username or Password');
		}

		mysqli_commit($conn);
		mysqli_close($conn);
			
		?>
	</body>
</html>