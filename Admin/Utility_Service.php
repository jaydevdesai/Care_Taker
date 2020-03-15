<?php
require("../connection.php");
$Service=$_POST['Service'];
//$Desc=$_POST['Desc'];
//$path="../images/icons/". basename($_FILES['Icon']['name']);
//$gandhi=basename($path);
$Fees=$_POST['Fees'];
$mit="SELECT * FROM `service_master` WHERE Service_type='$Service'";
$res=mysqli_query($con,$mit);
if(mysqli_num_rows($res)==1){
    echo "<script>alert('$Service is already Existed. Try Again.');document.location='Service_Add.php';</script>";
}
else{
    //if(isset($_FILES)){
     //   if(empty($_FILES['Icon']['tmp_name'])){
            $sql="INSERT INTO `service_master`(`Service_type`,`Service_fees`) VALUES ('$Service','$Fees')";
            $result=mysqli_query($con,$sql);
            if($result){
                echo "<script>alert('$Service is Successfully Added!');document.location='Service_Manage.php';</script>";
            }
            else{
                echo "<script>alert('Something went Wrong.');document.location='Service_Add.php';</script>";
            }

}