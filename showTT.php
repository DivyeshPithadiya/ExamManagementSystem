<html>

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
        
        <?php require 'FacNav.php'; //Navigation bar
        ?>

        <div>
            <?php

                for($i=3;$i<=8;$i++)
                {
                    echo "<center>
                            <a href='showTT.php?sem=".$i."' style='text-decoraction:none;'><b><p style='color:#cc0500'>Term Test Time Table For Semester ".$i."</p></b></a>
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



            $q="select count(UID) from ut_tt where Sem=$sem";
            $r=mysqli_query($conn,$q);
            $ro=mysqli_fetch_array($r);

            if($ro['count(UID)']<5)
            {
                         
                mysqli_commit($conn);
                mysqli_close($conn);
                header("Location:showTT.php?message=Term Test Time Table is Not Ready for Semester ".$sem." !!");
            }
            else 
            {
            echo "<p style='color:#cc0500'><b><i>Semester ".$sem." Term Test Time Table</i></b></p>";

            echo "
                <table border='2' class='table table-striped'>
                <thead class='thead-dark'>
                <tr>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                </thead>";
            

                    $tq="select UTDate, subjects.Sub, UTime, semester.SemName from ut_tt,semester,subjects where subjects.SuID=ut_tt.Sub and ut_tt.sem=semester.SemID and ut_tt.Sem=".$sem." order by ut_tt.sem , ut_tt.UTDate, ut_tt.UTime";
                    $tr=mysqli_query($conn,$tq);
                    while($tro=mysqli_fetch_array($tr))
                    {

                        echo "<tr>
                                <td>".$tro['Sub']."</td>
                                <td>".$tro['UTDate']."</td>
                                <td>".$tro['UTime']."</td>
                            </tr>";
                    }
                    echo "  </table>";
            }
        }

                 
        mysqli_commit($conn);
        mysqli_close($conn);

            ?>




    </body>
    </html>