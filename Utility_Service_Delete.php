<?php
require("../connection.php");
$id=$_GET['id'];
$name=$_GET["name"];
$sql="UPDATE `service_master` SET Deleted=1 WHERE Service_id='$id'";
$query="UPDATE `caretaker_master` SET Deleted=1 WHERE Service_id='$id'";
$result=mysqli_query($con,$sql);
$res=mysqli_query($con,$query);
//$r=mysql_query($sq,$con);
if($res && $result){
    echo "<script>alert('$name is successfully Deleted.');document.location='Service_View_Delete.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again.');document.location='Service_View_Delete.php';</script>";
}

