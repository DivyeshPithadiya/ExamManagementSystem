<?php

		//Development Connection

		$hostname="localhost";
		$username="root";
		$password="";
		$database="pbl_sem_5";


		//Remote Connection

		// $hostname="remotemysql.com";
		// $username="rL1fqLueqq";
		// $password="IlRY37yJqc";
		// $database="rL1fqLueqq";
	
		$conn=mysqli_connect($hostname,$username,$password,$database);	
		mysqli_autocommit($conn,FALSE);
		
?>