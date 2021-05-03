<html>
	<?php
		$on=$_POST['oname'];
		$op=$_POST['opassword'];
		$nn=$_POST['nname'];
		$np=$_POST['npassword'];
		
		require "Connectivity.php";
		
		$query="select * from admin where id=1";
		$res=mysqli_query($conn,$query);
		
		$row=mysqli_fetch_array($res);
		
		if($on==$row['username'] && $op==$row['password'])
		{
			$q1="delete from admin where id=1";
			$rs1=mysqli_query($conn,$q1);
			$q2="insert into admin(id,username,password) values(1,'$nn','$np')";
			$rs2=mysqli_query($conn,$q2);
			
			header('Location:changeUsePass.php?message=Your Username and Password changed');
		}
		else
		{
			header('Location:changeUsePass.php?message=Please enter correct Username and Password');
		}
		
		mysqli_commit($conn);
		mysqli_close($conn);

	?>	
</html>