<html>
	
	<?php

		if(isset($_GET['date1']))
		{
			$date1=$_GET['date1'];
		}
		
		if(isset($_GET['date2']))
		{
			$date2=$_GET['date2'];
		}

		if(isset($_GET['date3']))
		{
			$date3=$_GET['date3'];
		}

		if(isset($_GET['date4']))
		{
			$date4=$_GET['date4'];
		}

		if(isset($_GET['subject']))
		{
			$sub=$_GET['subject'];
		}
	
		
		session_start();

		$ID=$_SESSION['ID'];
		$Fname=$_SESSION['Fname'];
		$Lname=$_SESSION['Lname'];
		$exam=$_SESSION['exam'];
		$Ename=$_SESSION['Ename'];
		$subexp=$_SESSION['subexp'];
		$mail=strtolower($_SESSION['mail']);
		$mobile=$_SESSION['mobile'];
		$sem=$_SESSION['sem'];
		$college=$_SESSION['college'];


		require 'Connectivity.php';

		$q1="select count(Sub) from lab_exam where Sub='$sub'"; //check wheather this subject is already present in lab_examor not
		$res1=mysqli_query($conn,$q1);
		$row1=mysqli_fetch_array($res1);


	// if($date1==$date2 && ($date1!=null && $date2!=null) ) /* check wheather user is not inserting same dates for two batches */
	// {	
	// 	header("Location:selectLab.php?message=Please Select Different Dates for Batch 1/2 and Batch 3/4");
	// }
	// else 
	// {
	// 	if($date1==$date3 && ($date1!=null && $date3!=null) )
	// 	{
	// 		header("Location:selectLab.php?message=Please Select Different Dates for Batch 1/2 and Batch 5/6");
	// 	}
	// 	else 
	// 	{
	// 		if($date1==$date4 && ($date1!=null && $date4!=null))
	// 		{
	// 			header("Location:selectLab.php?message=Please Select Different Dates for Batch 1/2 and Batch 7/8");

	// 		}
	// 		else 
	// 		{
	// 			if($date2==$date3 && ($date2!=null && $date3!=null))
	// 			{
	// 				header("Location:selectLab.php?message=Please Select Different Dates for Batch 3/4 and Batch 5/6");

	// 			}
	// 			else 
	// 			{
	// 				if($date2==$date4 && ($date2!=null && $date4!=null))
	// 				{
	// 					header("Location:selectLab.php?message=Please Select Different Dates for Batch 3/4 and Batch 7/8");

	// 				}
	// 				else 
	// 				{
	// 					if($date3==$date4 && ($date3!=null && $date4!=null) )
	// 					{
	// 						header("Location:selectLab.php?message=Please Select Different Dates for Batch 5/6 and Batch 7/8");

	// 					}
					/* check wheather user is not inserting same dates for two batches */
						// else 
						{

											
							if($row1['count(Sub)']==0) //Perform insertion if Subject is not present
							{

								// for one date for a semester only Two exams should be there
								$c1="select count(ExID) from lab_exam where date1='$date1' and Sem=$sem";
								$rc1=mysqli_query($conn,$c1);
								$roc1=mysqli_fetch_array($rc1);

								$c2="select count(ExID) from lab_exam where date2='$date1' and Sem=$sem";
								$rc2=mysqli_query($conn,$c2);
								$roc2=mysqli_fetch_array($rc2);

								$c3="select count(ExID) from lab_exam where date3='$date1' and Sem=$sem";
								$rc3=mysqli_query($conn,$c3);
								$roc3=mysqli_fetch_array($rc3);

								$c4="select count(ExID) from lab_exam where date4='$date1' and Sem=$sem";
								$rc4=mysqli_query($conn,$c4);
								$roc4=mysqli_fetch_array($rc4);

								if(($roc1['count(ExID)']+ $roc2['count(ExID)']+ $roc3['count(ExID)']+$roc4['count(ExID)'])>=2 )
								{
									header("Location:selectLab.php?message=Semester ".$sem." already have 2 Exmas On ".$date1);
								}
								else 
								{
									$cd21="select count(ExID) from lab_exam where date1='$date2' and Sem=$sem";
									$rcd21=mysqli_query($conn,$cd21);
									$rocd21=mysqli_fetch_array($rcd21);

									$cd22="select count(ExID) from lab_exam where date2='$date2' and Sem=$sem";
									$rcd22=mysqli_query($conn,$cd22);
									$rocd22=mysqli_fetch_array($rcd22);

									$cd23="select count(ExID) from lab_exam where date3='$date2' and Sem=$sem";
									$rcd23=mysqli_query($conn,$cd23);
									$rocd23=mysqli_fetch_array($rcd23);

									$cd24="select count(ExID) from lab_exam where date4='$date2' and Sem=$sem";
									$rcd24=mysqli_query($conn,$cd24);
									$rocd24=mysqli_fetch_array($rcd24);
									if(($rocd21['count(ExID)']+ $rocd22['count(ExID)']+ $rocd23['count(ExID)']+$rocd24['count(ExID)'])>=2 )
									{
										header("Location:selectLab.php?message=Semester ".$sem." already have 2 Exmas On ".$date2);
									}
									else 
									{
										$cd31="select count(ExID) from lab_exam where date1='$date3' and Sem=$sem";
										$rcd31=mysqli_query($conn,$cd31);
										$rocd31=mysqli_fetch_array($rcd31);

										$cd32="select count(ExID) from lab_exam where date2='$date3' and Sem=$sem";
										$rcd32=mysqli_query($conn,$cd32);
										$rocd32=mysqli_fetch_array($rcd32);

										$cd33="select count(ExID) from lab_exam where date3='$date3' and Sem=$sem";
										$rcd33=mysqli_query($conn,$cd33);
										$rocd33=mysqli_fetch_array($rcd33);

										$cd34="select count(ExID) from lab_exam where date4='$date3' and Sem=$sem";
										$rcd34=mysqli_query($conn,$cd34);
										$rocd34=mysqli_fetch_array($rcd34);

										if(($rocd31['count(ExID)']+ $rocd32['count(ExID)']+ $rocd33['count(ExID)']+$rocd34['count(ExID)'])>=2 )
										{
											header("Location:selectLab.php?message=Semester ".$sem." already have 2 Exmas On ".$date3);
										}
										else 
										{
											$cd41="select count(ExID) from lab_exam where date1='$date4' and Sem=$sem";
											$rcd41=mysqli_query($conn,$cd41);
											$rocd41=mysqli_fetch_array($rcd41);
						
											$cd42="select count(ExID) from lab_exam where date2='$date4' and Sem=$sem";
											$rcd42=mysqli_query($conn,$cd42);
											$rocd42=mysqli_fetch_array($rcd42);
						
											$cd43="select count(ExID) from lab_exam where date3='$date4' and Sem=$sem";
											$rcd43=mysqli_query($conn,$cd43);
											$rocd43=mysqli_fetch_array($rcd43);
						
											$cd44="select count(ExID) from lab_exam where date4='$date4' and Sem=$sem";
											$rcd44=mysqli_query($conn,$cd44);
											$rocd44=mysqli_fetch_array($rcd44);

											if(($rocd31['count(ExID)']+ $rocd32['count(ExID)']+ $rocd33['count(ExID)']+$rocd34['count(ExID)'])>=2 )
											{
											header("Location:selectLab.php?message=Semester ".$sem." already have 2 Exmas On ".$date4);
											}
											else 
											{

												$q2="select count(FID) from faculty where FID=$ID"; //check whether the same faculty exist in table or not 
												$res2=mysqli_query($conn,$q2);
												$row2=mysqli_fetch_array($res2);
												
												if($row2['count(FID)']==0)
												{
														$q3="insert into faculty(FID,FName,FLName) values($ID,'$Fname','$Lname')";  //Inserting faculty Data if it is not present in table
														$res3=mysqli_query($conn,$q3);
												}
													
												$q6="select count(date1) from lab_exam where date1='$date1' and Sem=$sem"; //for this semester this date is alloted or not
												$res6=mysqli_query($conn,$q6);
												$row6=mysqli_fetch_array($res6);
							
												$q7="select count(date2) from lab_exam where date2='$date2' and Sem=$sem";
												$res7=mysqli_query($conn,$q7);
												$row7=mysqli_fetch_array($res7);
							
												$q8="select count(date3) from lab_exam where date3='$date3' and Sem=$sem";
												$res8=mysqli_query($conn,$q8);
												$row8=mysqli_fetch_array($res8);
							
												$q9="select count(date4) from lab_exam where date4='$date4' and Sem=$sem";
												$res9=mysqli_query($conn,$q9);
												$row9=mysqli_fetch_array($res9);
							
												if($row6['count(date1)']!=0 || $row7['count(date2)']!=0 || $row8['count(date3)']!=0 || $row9['count(date4)']!=0)
												{
													if($row6['count(date1)']!=0)
													{
													header("Location:selectLab.php?message=Batch 1 and 2 students already have Exam On ".$date1.". Please select Some other date for Batch 1 and 2 !");
													}
													else  
													{
														if($row7['count(date2)']!=0)
														{
														header("Location:selectLab.php?message=Batch 3 and 4 students already have Exam On ".$date2.". Please select Some other date for Batch 3 and 4 !");
														}
														else
														{
															if($row8['count(date3)']!=0)
															{
															header("Location:selectLab.php?message=Batch 5 and 6 students already have Exam On ".$date3." Please select Some other date for Batch 5 and 6 !");
															}
															else 
															{
																if($row9['count(date4)']!=0)
																{
																header("Location:selectLab.php?message=Batch 7 and 8 students already have Exam On ".$date1.". Please select Some other date for Batch 7 and 8 !");
																}
															}
														}
													}
							
												}
												else 
												{
													
											
													
													$q4="select count(EID) from external_faculty where email='$mail' and phone='$mobile'"; //check whether the same External faculty exist in table or not 
													$res4=mysqli_query($conn,$q4);
													$row4=mysqli_fetch_array($res4);
												
													if($row4['count(EID)']==0)
													{
														$q4="insert into external_faculty(Ename,Experience,college,phone,email) values('$Ename',$subexp,'$college','$mobile','$mail')";   //Inserting External faculty Data
														$res4=mysqli_query($conn,$q4);
													}

													$q5="select EID from external_faculty where email='$mail' and phone='$mobile' "; //retrive the External faculty ID
													$res5=mysqli_query($conn,$q5);
													$row5=mysqli_fetch_array($res5);
							
							
													$EID=$row5['EID']; //storing External ID in EID
							
													if($date2==null && $date3==null && $date4==null)
													{
													$q10="insert into lab_exam(ExType,Sub, Sem, FID, EID, date1) values('$exam','$sub',$sem,$ID,$EID,'$date1')";
													$res10=mysqli_query($conn,$q10);
													}
													else 
													{
														if($date3==null && $date4==null)
														{
															$q10="insert into lab_exam(ExType,Sub, Sem, FID, EID, date1, date2) values('$exam','$sub',$sem,$ID,$EID,'$date1','$date2')";
															$res10=mysqli_query($conn,$q10);
														}
														else 
														{
															if($date4==null)
															{
																$q10="insert into lab_exam(ExType,Sub, Sem, FID, EID, date3, date1, date2) values('$exam','$sub',$sem,$ID,$EID,'$date3','$date1','$date2')";
																$res10=mysqli_query($conn,$q10);
															}
															else
															{
																$q10="insert into lab_exam(ExType,Sub, Sem, FID, EID, date3, date4, date1, date2) values('$exam','$sub',$sem,$ID,$EID,'$date3','$date4','$date1','$date2')";
																$res10=mysqli_query($conn,$q10);
							
															}
														}
													}

													header("Location:selectLab.php?message=Dates Alloted");
												}

											}
										}
									}
								}
								//for one date for a semester only Two exams should be there
								
										
							}
							else 
							{
								header("Location:selectLab.php?message=Dates are already assigned for this Subject");
							}
						}

					

	mysqli_commit($conn);
	mysqli_close($conn);
		
	?>
</html>