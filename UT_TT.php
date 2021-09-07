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
	
	
	
	
	<?php require 'backnav.php'; //Navigation bar
        ?>

<?php 
	session_start();
	if($_SESSION['excess'])
	{
		?>
        
		<div  style="box-shadow: 0 0 8px #666;width:50%;margin-left:25%;padding:20px;border-radius:10px;">

        <p><font color="#cc0500" size="6"><center><b>Unit Test Time Table</font></b></center></p>
        <center>
			<form method="post" action="UT_add.php"> 		
               
                    Select Semester<br>
                    <select class="demo7" name="sem"  required>
                    <?php
                        $i=3;
                        while($row=mysqli_fetch_array($res))
                        {
                            echo "<option value=$i>$row[SemName]</option>";
                            $i++;
                        }
                    ?>
                    </select>
                        
                    <br>
                    <br>
                    
                    Select Subject<br>
                    <select name='sub' required  class='demo5'style= width:400px;>
                        
                        <?php

                        $query="select * from subjects order by Sem";
                        
                        $res=mysqli_query($conn,$query);
                    
                        while($row=mysqli_fetch_array($res))
                        {
                            echo "<option value='$row[SuID]'>$row[Sub] Semester-$row[Sem]</option>";       //Retewing SUBJECTS names from database
                        }
                        ?>
                        
                    </select>

                     <br>
                     <br>   

                    Select Date<br>	
                    <input type="date" class="demo7" name="date" required></input>
                    
                    <br>
                    <br>

                    Time<br>
                    <input type="time" class="demo7" name="time" required></input>
                    <br>
                    <button type="submit" class="demo6 btn" style= height:40px;>Add</button>

                </form>

				<?php

                
				if(isset($_GET['message']))
					{
						$message=$_GET['message'];
						echo "<center><font size='3'><p>$message</p></center>";
                    }    

                ?>
			
				<?php                          //Display All Subject of Semester
                
                    echo "<table class='table table-striped'>";


				?>
				
			</form>
            </center>
		</div>
        <hr>

        <div>
        <?php
        
        for($i=3;$i<=8;$i++)
        {
        $sem=$i;
        echo "<p style='color:grey;'><b>Computer Engineering Semester-$i</b></p>";
        echo "
            <table border='2' class='table table-striped'>
            <thead class='thead-dark'>
            <tr>
                <th>Subject</th>
                <th>Date</th>
                <th>Time</th>
                <th>Delete Record</th>
            </tr>
            </thead>";
          

                $tq="select UID,UTDate, subjects.Sub, UTime, semester.SemName from ut_tt,semester,subjects where subjects.SuID=ut_tt.Sub and ut_tt.sem=semester.SemID and ut_tt.Sem=".$sem." order by ut_tt.sem , ut_tt.UTDate , ut_tt.UTime";
                $tr=mysqli_query($conn,$tq);
                while($tro=mysqli_fetch_array($tr))
                {

                    echo "<tr>
                            <td>".$tro['Sub']."</td>
                            <td>".$tro['UTDate']."</td>
                            <td>".$tro['UTime']."</td>
                            <td><a href='deleteUT.php?id=".$tro['UID']." '>Delete</a></td>
                          </tr>";
                }
                echo "  </table>";
                echo "<hr>";
        }
            ?>

          

        </div>

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



<!--INCLUDE SUBJECT 1 TIME ONLY
