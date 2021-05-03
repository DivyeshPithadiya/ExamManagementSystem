<?php

    require "Connectivity.php";

    session_start();
        $id=$_SESSION['id'];

    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    $date3=$_POST['date3'];
    $date4=$_POST['date4'];
    $lab=$_POST['lab'];

    echo $lab;

    $q="update lab_exam set date1='$date1' , date2='$date2' , date3='$date3' , date4='$date4',LabNo=$lab where ExID=$id";
    $res=mysqli_query($conn,$q);

    mysqli_commit($conn);
    
    mysqli_close($conn);

    header("Location:EditLab.php");
    ?>