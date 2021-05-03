<html>

	<?php
	require 'Connectivity.php';  //import connectivity code from Connectivity.php
	$query="select SemName from semester"; //Executing Query
	$res=mysqli_query($conn,$query); // Performing Query and result stored in $res 
	?>
	<head>
    <title>
		Internal Faculty Details
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <?php  require 'navbar.php'; //Navigation bar?>
    </head>

	</head>
	
	<body style=background-color:white;>
    <p><font color="#cc0500" size="6"><center><b>Internal Faculty Details</font></b></center></p>
    
	<link rel="stylesheet" type="text/css" href="CSS/common.css">
	<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
	
	<?php
        
        echo "
        <center>
            <table border='2' class='table table-striped'>
            <thead class='thead-dark'>
            <tr>
                <th>Faculty ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Delete Record</th>
            </tr>
            
            </thead>";
        
        $q="select * from faculty";
        $r=mysqli_query($conn,$q);
        while($row=mysqli_fetch_array($r))
        {

            echo "<tr>
                    <td>".$row['FID']."</td>
                    <td>".$row['FName']."</td>
                    <td>".$row['FLName']."</td>
                    <td><a href='deletefaculty.php?id=".$row['FID']." '>Delete</a></td>
                  </tr>";
        }
       echo"</table></center>";
        

        mysqli_commit($conn);
        mysqli_close($conn);
    
        //<?php echo date("Y");

        ?>

    
