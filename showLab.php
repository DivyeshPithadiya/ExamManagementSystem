<html>

	<head>
    <title>
		Practical/Oral Time Table
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>

	</head>
	
	<body style=background-color:white;>
	
        <link rel="stylesheet" type="text/css" href="CSS/common.css">
        <link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
        
        <?php require 'FacNav.php'; //Navigation bar
        ?>

        <div>
            <?php

                for($i=3;$i<=8;$i++)
                {
                    echo "<center>
                            <a href='showLab.php?sem=".$i."' style='text-decoraction:none;'><b><p style='color:#cc0500'>Practical/Oral Time Table For Semester ".$i."</p></b></a>
                          </center>";
                }

                echo "<br><br><br>";
                if(isset($_GET['message']))
                {
                    echo "<center><p style='color:red'><b><i>".$_GET['message']."</i></b></p></center>";
                }

            ?>
        </div>

        <?php

        require "Connectivity.php";

        if(isset($_GET['sem']))
        {
            $sem=$_GET['sem'];



            $q="select count(ExID) from lab_exam where Sem=$sem";
            $r=mysqli_query($conn,$q);
            $ro=mysqli_fetch_array($r);

            if($ro['count(ExID)']<1) //Atleast 1 subjects are having Practical Exam
            {
                header("Location:showLab.php?message=Practical/Oral Time Table is Not Ready for Semester ".$sem." !!");
            }
            else 
            {
                    $s="select semester.SemName,subjects.Sub,date1,date2,date3,date4 from lab_exam,subjects,semester where lab_exam.Sub=subjects.SuID and lab_exam.Sem=semester.SemID and lab_exam.Sem=$sem ";
                    $sre=mysqli_query($conn,$s);

                    echo "<p style='color:#cc0500'><b><i>Semester ".$sem." Practical/Oral Time Table</i></b></p>";
                    echo "<table  border='2' class='table table-striped'>
                    <thead class='thead-dark'>
                            <th>Subject</th>
                            <th>Batch1/2</th>
                            <th>Batch3/4</th>
                            <th>Batch5/6</th>
                            <th>Batch7/8</th>
                        
                        </tr> </thead>";
                    
                    while($sro=mysqli_fetch_array($sre))
                    {
                        echo "<tr>
                                <td>".$sro['Sub']."</td>
                                <td>".$sro['date1']."</td>
                                <td>".$sro['date2']."</td>
                                <td>".$sro['date3']."</td>
                                <td>".$sro['date4']."</td>
                            </tr>";
                    }
                    echo "</table>";

            }
        }

                 
        mysqli_commit($conn);
        mysqli_close($conn);


            ?>




    </body>
    </html>