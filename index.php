<html>
<head>
	<title>
		Exam Managemenet System
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
	<link rel="stylesheet" type="text/css" href="CSS/indexcss.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>
	<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0 ,user-scalable=no" >
</head>

	<body>
		

		<div style="border:0.5px solid gray;margin:10;padding-bottom:10;border-radius:10px;box-shadow:0.5px 0.5px 1px 1px;">

			<div class="menu"> 
				<?php
				require "menu.php";
				?>
			</div>

			<div>
				<center>
				<img src="pageImages/home.jpg" height="120" width="820" class="img-css"></img>
				</center>

		
				<center>
				<img src="pageImages/mobileHomeImg.png" height="100" width="100" class="img-css2"></img>
				</center>
			
			</div>
		</div>
		
		<div class="i4" style="border:0.5px solid gray;box-shadow:0.5px 0.5px 1px 1px;">

			<center>
				<p class="i5" style="position:relative;left: 0px;top: 100px;"><b>Department of Computer Engineering <br>Time Table</b></p>
			</center>
		</div>

		<div>
		<?php

			require "Connectivity.php";

			$q="select * from images order by uploadDate asc";
			$res=mysqli_query($conn,$q);
		?>

<div class="notice">
		<center><p class="notice2"><b>Latest Notice</b></p></center> 
		</div>
		

		<?php

		echo "<marquee height='20' scrollamount='10' ><div>";
		
				echo "<ul>";

				$i=1;
				while($row = mysqli_fetch_array($res))
				{
					echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<li style='display:inline-block;'><b><a href='noticeShow.php' class><span style='color:brown;'>* ".$row['image_text']."(".$row['uploadDate'].")"."</span></a></b></li>";
					$i++;
					if($i==100)
					{
						break;
					}
				}

				echo "<ul>";

		
		echo "</div></marquee>";
		
		
		?>
		<hr>
		<?php
			mysqli_close($conn);
		?>
	</body>
		<script>
			document.body.style.zoom="100%";
		</script>
</html>

<?php //rgb(209, 0, 0);?>