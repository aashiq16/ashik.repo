<?php

include 'connect.php';

if(isset($_GET['deleteemp_ID'])){
    $ID=$_GET['deleteemp_ID'];

    $sql="delete from employee where emp_ID=$ID";
    $result=mysqli_query($con,$sql);
    if($result){
        header ('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}

?>