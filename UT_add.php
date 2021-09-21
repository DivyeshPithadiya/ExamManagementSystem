<html>
	<?php
	
	require 'Connectivity.php';
	$sem=$_POST['sem'];
	$sub=$_POST['sub'];
	$date=$_POST['date'];
    $time=$_POST['time'];
    $endtime=$_POST['endtime'];
    
    $q0="select Sub from subjects where SuID='$sub'";
    $r0=mysqli_query($conn,$q0);
    $ro0=mysqli_fetch_array($r0);


    $q1="select count(Sub) from ut_tt where Sub='$sub'";//check wheather This Subject is already Present oin UT table or not
    $r1=mysqli_query($conn,$q1);
    $ro1=mysqli_fetch_array($r1);

    if($ro1['count(Sub)']==0)
    {
        $q2="select count(Sub) from ut_tt where UTdate='$date' and sem=$sem";
        $r2=mysqli_query($conn,$q2);
        $ro2=mysqli_fetch_array($r2);
        
        $q3="select count(UTime) from ut_tt where UTdate='$date' and UTime='$time' and sem=$sem";
        $r3=mysqli_query($conn,$q3);
        $ro3=mysqli_fetch_array($r3);
		
		$q4="select count(UTime) from ut_tt where UTdate='$date' and UTime='$time' and sem=$sem";
        $r4=mysqli_query($conn,$q4);
        $ro4=mysqli_fetch_array($r4);

        if(($ro2['count(Sub)']<2) && ($ro3['count(UTime)']==0) && ($ro4['count(EndTime)']==0))
        {
            $qf="insert into ut_tt(UTDate,Sub,UTime,EndTime,Sem) values('$date','$sub','$time','$endtime',$sem)"; //Storing data into the Table of Unit Test
			$resf=mysqli_query($conn,$qf);
			header("Location:UT_TT.php?message=Exam Data Stored for ".$ro0['Sub']." Subject");
        }
        else 
        {
            header("Location:UT_TT.php?message=Other Exam at same Time Or Date.Please Select another Date or Time for ".$ro0['Sub']." Subject");
        }

    }
    else 
    {
	
        header("Location:UT_TT.php?message=Exam Data Already Present for ".$ro0['Sub']." Subject");
	}
	mysqli_commit($conn);
	mysqli_close($conn);


	
    



     /*
	 header("refresh:2,url=ut_tt_edit.php");
	  
		<!--$query="select count(Sub) from UT_TT where Sub='$sub; //to check wheather same subject is aready present in table or not
		$result=mysqli_query($conn,$query);
		$rowCount=mysqli_fetch_array($result);
		
		
		$q1="select count(Sub) from subjects where Sem= $sem ";
		$res1=mysqli_query($conn,$q1);
		$row1=mysqli_fetch_array($res1);
		
		if($rowCount['count(Sub)']==0)
		{
			if($row1['count(Sub)']<8)
			{
				$q2="insert into UT_TT(UTDate,Sub,UTime,Sem) values('$date','$sub',$sem)";
				$res2=mysqli_query($conn,$q2);
				header("Location:subject.php?message=Subject Added && sem=$sem" );
			}
			else 
			{
				header("Location:subject.php?message=Can not add more than Eight Subjects for one Semester && sem=$sem ");
			}
		}
		else 
		{
			if($rowCount['count(Sub)']>0)
			{
			header("Location:subject.php?message=This Subject Code or Subject Name Already Exist For This or Another Semester && sem=$sem");
			}
		}
        */
	?>
	
</html>