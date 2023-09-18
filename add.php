
		<?php
		//include database connection file
		include_once("config.php");
		
		if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$age=$_POST["age"];
			$email=$_POST["email"];
			if(empty($name)|| empty($age) || empty($email))
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
				//insert all field are filled (not empty)
				
				//insert data to database
				$result=mysqli_query($myconn,"insert into username(Name,Age,Email) values('$name','$age','$email')");
				
				//display success massage.
				echo "<font color='green'>Data added successfuliy.";
				echo "<br/><a href='index.php'>
				View Result</a>";
			}
			header("Location:index.php");
		}
		?>
	 