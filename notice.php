<?php 
	session_start();
	if($_SESSION['excess'])
	{
		?>

<?php
  // Create database connection
	require 'Connectivity.php';

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
	  $target = "images/".basename($image);
	  
	  $my_date = date("Y-m-d H:i:s");

  	$sql = "INSERT INTO images (image, image_text,uploadDate) VALUES ('$image', '$image_text','$my_date')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "select * from images");
?>
<html>
<head>
	<title>
		Upload/Delete Notice
	</title>
	<link rel="icon" href="pageImages/mobileHomeImg.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="CSS/noticeImg.css">
    <link rel="stylesheet" type="text/css" href="CSS/common.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>
</head>
<body>

<?php require 'navbar.php'; //Navigation bar
        ?>
		
	<center><p><font color="#cc0500" size="6"><center><b>Notice Board</font></b></center></p>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) 
    {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' onclick='window.open(this.src)' style=height:200px ;width:2000px; >";
		echo "<p>".$row['image_text']."</p>";
		echo "<p> Uploaded On: ".$row['uploadDate']."</p>";
		echo "<a href='deleteNotice.php?id=".$row['id']."' style='text-decoration:none;'>Delete</a>" ; 
      echo "</div>";
	}
	mysqli_commit($conn);
	mysqli_close($conn);
  ?>
  <form method="POST" action="notice.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" class="demo6 btn" name="upload" style='background-color:#cc0500;color:white;'>POST</button>
  	</div>
  </form>
</div>
</body>
</html>

<?php 
	}

	else 
	{
		header("Location:login.php");
	}
?>