<?php
include_once("config.php");
if(isset($_POST['update']))	
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	if(empty($name)||empty($age)||empty($email))
	{
		if(empty($name))
				{
					echo "<font color='red'>Name field is empty.</font><br/>";
				}
		if(empty($age))
				{
					echo "<font color='red'>Age field is empty.</font><br/>";
				}
		if(empty($email))
				{
					echo "<font color='red'>Email field is empty.</font><br/>";
				}
				//link the previous page
				echo "<br/><a href='javascript:self.histroy.back();'>Go Back</a>";
	}
			else{
				$sql= mysqli_query($myconn,"UPDATE username set Name='$name',Age='$age',Email='$email' where id= $id");
				header("Location:index.php");
			}
}

?>
 <html>
	<head>
	<title>Edit data</title>
	<!-- Latest compiled and minified CSS -->
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	</head>
	<body>
		<a href="index.php"><button class="btn btn-danger mt-1">Home</button></a><br/><br/>
		<?php
		include_once("config.php");
		 $uid = $_GET["id"];
		 $query="select * from username where id = {$uid} ";
		 $result=mysqli_query($myconn,$query) or die("Query Failed");
		 if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result))
		 {
			
		?>
		<form  method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>" >
			<table border="0">
				<tr>
				<td><b>Name</b></td><td><input type="text" class="form-control" name="name" value="<?php echo $row["Name"]; ?>">
				</tr>
				<tr>
				<td><b>Age</b></td><td><input type="text" class="form-control" name="age" value="<?= $row["Age"] ?>">
				</tr>
				<tr>
				<td><b>Email</b></td><td><input type="text" class="form-control" name="email" value="<?= $row["Email"]  ?>">
				</tr>
				<tr>
				<td><input type="hidden" name="id" value="<?php echo $row["id"]; ?>" ></td>
				<td><input type="submit" class="btn btn-outline-success" name="update" value="Update"></td>
				
			</table>
		</form>
		<?php
			}
		 }
		?>
		
 	</body>
</html>