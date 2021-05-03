<?php

require 'Connectivity.php';
    
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}

$q="delete from external_faculty where EID=".$id;
$res=mysqli_query($conn,$q);

mysqli_commit($conn);
mysqli_close($conn);

header("Location:facDetails.php");

?>