<html>
    <?php

require 'Connectivity.php';
    
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}

$q="delete from lab_exam where ExID=$id";
$res=mysqli_query($conn,$q);

mysqli_commit($conn);
mysqli_close($conn);

header("Location:EditLab.php");        
    ?>
</html>