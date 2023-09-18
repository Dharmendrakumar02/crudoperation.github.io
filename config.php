<?php
$server="localhost";
$username="root";
$password="";
$dbname="registration";
$myconn=mysqli_connect("$server","$username","$password","$dbname");
if($myconn){
	//echo "Success";
}else{
mysqli_close($myconn);
}
?>