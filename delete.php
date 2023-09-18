<?php

include_once('config.php');
$id=$_GET['id'];

 if(isset($_GET['id'])){
	$id=$_GET['id'];
	$result=mysqli_query($myconn,"delete FROM username WHERE id='$id' ");
	if($result){
		mysqli_close($myconn);
		header("Location:index.php");
		exit();
	}else{
		echo "Row is not deleted";
	}
 }
?>