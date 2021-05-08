<html>
<head>

    <title>
		Oral/Practical Time Table
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>


<body>

<?php require 'navbar.php'; //Navigation bar
     ?>

<?php 
	session_start();
	if($_SESSION['excess'])
	{
		?>
        <center>
        <div  style="box-shadow: 0 0 8px #666;padding:20px;border-radius:10px;">

            <p><font color="#cc0500" size="6"><center><b>Practical / Oral Exam Details</font></b></center></p>
            
                <?php

           
                require "Connectivity.php";

                $i=3;
            while($i<=8)
                {
                    $sem=$i;
                  
                    //Showing the Details of Subjects,Dates and Semesters
                    $s="select lab_exam.EID,external_faculty.EID,ExID,LabNo,semester.SemName,subjects.Sub,date1,date2,date3,date4,EName,Experience,college,phone,email from lab_exam,subjects,semester,external_faculty where lab_exam.Sub=subjects.SuID and lab_exam.Sem=semester.SemID and external_faculty.EID=lab_exam.EID and lab_exam.sem=$sem";
                    $sre=mysqli_query($conn,$s);

                    echo "<div style='box-shadow: 0 0 5px #666;width:100%;padding:20px;border-radius:10px;margin:10px;'>";

                    echo "<p style='color:grey;'><b>Computer Engineering Semester-".$sem."</b></p>";

                    echo "<table  border='2' class='table table-striped'>";
                    echo "<tr>
                    <thead class='thead-dark'>
                            <th>Subject</th>
                            <th>Batch1/2</th>
                            <th>Batch3/4</th>
                            <th>Batch5/6</th>
                            <th>Batch7/8</th>
                            <th>Lab Number</th>
                            <th>External Name</th>
                            <th>Experience</th>
                            <th>College</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </thead>
                            </tr>";
                    ?>
                    <?php
                    while($sro=mysqli_fetch_array($sre))
                    {
                        echo "<tr>
                                <td>".$sro['Sub']."</td>
                                <td>".$sro['date1']."</td>
                                <td>".$sro['date2']."</td>
                                <td>".$sro['date3']."</td>
                                <td>".$sro['date4']."</td>
                                <td>".$sro['LabNo']."</td>
                                <td>".$sro['EName']."</td>
                                <td>".$sro['Experience']."</td>
                                <td>".$sro['college']."</td>
                                <td>".$sro['phone']."</td>
                                <td>".$sro['email']."</td>
                                <td><a href='updateLab.php?id=".$sro['ExID']."&& date1=".$sro['date1']."&& date2=".$sro['date2']."&& date3=".$sro['date3']."&&date4=".$sro['date4']."  ' >Edit Lab/Date Details</a></td>
                                <td><a href='deleteLabExam.php?id=".$sro['ExID']."'>Delete</a></td>
                            </tr>";
                    }
                    echo "</table>";

                    echo "</div>";
                    $i++; 
                }

                ?>
            </div>

        </center>
            
        <?php
        
    }
    
    else 
    {
        header("Location:login.php");
    }

    mysqli_commit($conn);
    mysqli_close($conn);

    ?>
</body>

</html>