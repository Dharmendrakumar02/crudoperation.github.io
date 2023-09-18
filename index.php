
<html>
	<head>
	<title>homepage</title>
	<!-- Latest compiled and minified CSS -->
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
		.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:3;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:2;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
		
		#admin-content .content-table{
			border: 1px solid #000;
			width: 100%;
			margin: 0 0 20px;
		}

		#admin-content .content-table thead{
			color: #fff;
			background-color: #333;
		}

		#admin-content .content-table th{
			padding: 10px;
			border: 1px solid #fff;
			font-weight: 600;
			text-align: center;
			text-transform: uppercase;
		}

		#admin-content .content-table tbody{
			color: #333;
		}

		#admin-content .content-table tbody tr{
			background-color: #e7e7e7;
		}
		#admin-content .content-table tbody tr:nth-child(even){
			background-color: transparent;
		}
		#admin-content .content-table tbody td{
			padding: 10px;
			border: 1px solid #fff;
			text-align: center;

		}

		#admin-content .content-table tbody td:nth-child(2){
			text-align: left;
		}
		</style>
	</head>
	<body>
	<div id="admin-content col-md-12">
		<a href="add.html" id="link" class="btn btn-warning">Add New Data</a><br/><br/>
			<?php
			if(isset($_GET['page'])){
					$page=$_GET['page'];
				}else{
					$page=1;
				}
				$limit=8;
				
				$offset=($page-1)* $limit;
				
				//including the database connection file
				include_once("config.php");
				
				//fetching the data desending order 
				$sql="SELECT * FROM username ORDER BY id DESC limit {$offset},{$limit}";
				$result=mysqli_query($myconn,$sql) or die(" First Query Failed");
				//using by mysql query
		   	    if(mysqli_num_rows($result)>0){
				
			?>
			<table width="80%" border="2" class="table table-dark table-hover ">
			<thead>
			<tr border="2">
			<!--<th>Sr No.</th>-->
			<th>Id</td>
			<th>Name</th>
			<th>Age</th>
			<th>Email</th>
			<th>Update</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$serial=$offset+1;
		
				while($res = mysqli_fetch_array($result)){
				
			?>	
				<tr>
				<td><?php echo $serial;?></td>
 				 <td><?=$res["Name"]?></td>
				 <td><?=$res["Age"]?></td>
				 <td><?=$res["Email"]?></td>
				 <td><a href="edit.php?id=<?=$res['id']?>" class="btn btn-success ">Edit</a>
				<a href="delete.php?id=<?=$res['id']?> " 
				onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
				</tr>
			<?php
				$serial++;
				}
			?>
			</tbody>
			</table>
			<?php
				
				}
					$sql1="select * from username";
					$result=mysqli_query($myconn,$sql1) or die("Query failed");
					if(mysqli_num_rows($result) >0 ){
						
					$total_record=mysqli_num_rows($result);
					$total_page=ceil($total_record / $limit);
					
					
					echo '<center>';
					echo "<ul class='pagination justify-content-center'>";
					if($page > 1){
					echo '<li><a href="index.php?page='.($page-1).'">Prev</a></li>';
					}
					for($i=1; $i<=$total_page; $i++){
						if($i==$page){
							$active="active";
						}else{
							$active="";
						}
						echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
					}
					if($total_page > $page){
					echo '<li><a href="index.php?page='.($page+1).'">Next</a></li>';
					}
					echo "</ul>";
					echo '</center>';
					}
			
			?>
		</div>	
	</body>
</html>