<html>

	<?php
	require 'Connectivity.php';  //import connectivity code from Connectivity.php
	$query="select SemName from semester"; //Executing Query
	$res=mysqli_query($conn,$query); // Performing Query and result stored in $res 
	?>
	<head>
    <title>
		Term Test Time Table
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
	<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
	
	<?php require 'navbar.php'; //Navigation bar
        
        echo "
        <center>
            <table border='2' class='table table-striped'>
            <thead class='thead-dark'>
            <tr>
                <th>Examiner Name</th>
                <th>Experience</th>
                <th>College</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Delete Record</th>

            </tr>
            
            </thead>";
        
        $q="select * from external_faculty";
        $r=mysqli_query($conn,$q);
        while($row=mysqli_fetch_array($r))
        {

            echo "<tr>
                    <td>".$row['EName']."</td>
                    <td>".$row['Experience']."</td>
                    <td>".$row['college']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['email']."</td>
                    <td><a href='deleteExternalFaculty.php?id=".$row['EID']." '>Delete</a></td>
                  </tr>";
        }
       echo"</table></center>";
        

        mysqli_commit($conn);
        mysqli_close($conn);
    
        ?>

    
