<?php

		//Development Connection

		$hostname="localhost";
		$username="root";
		$password="";
		$database="examManagementSystem";


		//Remote Connection

		// $hostname="remotemysql.com";
		// $username="4kNSXyw0WC";
		// $password="hVdxJbLUB2";
		// $database="4kNSXyw0WC";
	
		$conn=mysqli_connect($hostname,$username,$password,$database);	
		mysqli_autocommit($conn,FALSE);
		
?>