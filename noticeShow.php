<html>
<head>
  <title>
		Notice Board
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="CSS/noticeImg.css">
    <link rel="stylesheet" type="text/css" href="CSS/common.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>
</head>
<body>

<?php require 'FacNav.php'; //Navigation bar
        ?>
        
	<center><p><font color="#cc0500" size="6"><center><b>Notice Board</font></b></center></p>

<?php

    require "Connectivity.php";

    $q="select * from images";
    $res=mysqli_query($conn,$q);
?>

<div id="content">
  <?php
    while ($row = mysqli_fetch_array($res)) 
    {
      echo "<div id='img_div'>";
      	// echo "<img src='images/".$row['image']."' onclick='window.open(this.src)' style=height:200px ;width:2000px; >";
    // echo "<p>".$row['image_text']."</p>";
    echo "<a href='images/".$row['image']."'>".$row['image_text']."</a>";
    echo "<p>Uploaded On: ".$row['uploadDate']."</p>";
      echo "</div>";
    }

    mysqli_commit($conn);
    mysqli_close($conn);
  ?>
</div>
</body>
</html>