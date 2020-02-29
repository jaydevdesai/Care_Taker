<?php
$con=mysqli_connect("localhost","root","ursHXMBrgXx026lG");
if(!$con)
{
    echo "Something went Wrong. Please Check your network connection.";
}
mysqli_select_db($con,"caretaker");