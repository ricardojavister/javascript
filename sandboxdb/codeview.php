<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : https://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Code Data</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$idcode = mysqli_real_escape_string($con,(strip_tags($_GET["idcode"],ENT_QUOTES)));
			
			$sql = mysqli_query($con, "SELECT c.id,c.title,c.description,c.solution,c.datecreated,c.dateupdated,cat.name as categoryname FROM CODE c INNER JOIN cat ON c.idcategory = cat.idcategory WHERE c.idcode='$idcode' ORDER BY title ASC");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['act']) == 'delete'){
				$delete = mysqli_query($con, "DELETE FROM CODE WHERE idcode='$idcode'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>This record was deleted.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>It was not possible to delete this record.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">Title</th>
					<td><?php echo $row['title']; ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td><?php echo $row['description']; ?></td>
				</tr>
				<tr>
					<th>Solution</th>
					<td><?php echo $row['solution']; ?></td>
				</tr>
				<tr>
					<th>Category</th>
					<td><?php echo $row['categoryname']; ?></td>
				</tr>
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Back to Index</a>
			<a href="edit.php?idcode=<?php echo $row['idcode']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="codeview.php?act=delete&idcode=<?php echo $row['idcode']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this record ? <?php echo $row['title']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>