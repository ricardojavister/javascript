<?php 
include_once('header.php');
?>
<body>
	<nav class="navbar navbar-inverse bs-dark">
		<?php include('nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<?php
			if(isset($_GET['act']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$idtarget = mysqli_real_escape_string($con,(strip_tags($_GET["id"],ENT_QUOTES)));
				$idtargetdata = mysqli_query($con, "SELECT * FROM code WHERE id='$idtarget'");
				if(mysqli_num_rows($idtargetdata) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data to show.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM code WHERE id='$idtarget'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Row removed correctly.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, it was not possible to remove data.</div>';
					}
				}
			}
			?>

<div class="panel panel-default">
          <!-- /.panel-heading -->
          <div class="panel-body">
              <div class="table-responsive">
                  <table id="grid" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
													<th>Id</th>
													<th>Url</th>
			                    <th>Edit/Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php
													$sql = mysqli_query($con, "SELECT id,tag,codeurl,createdate, modifydate FROM code ORDER BY createdate");				
													if(mysqli_num_rows($sql) == 0){
														echo '<tr><td colspan="6">No data.</td></tr>';
													}else{
														$no = 1;
														while($row = mysqli_fetch_array($sql)){
															echo '
															<tr>
																<td>'.$row['id'].'</td>
																<td><a href='.$row['codeurl'].' target=_blank >'.$row['tag'].'</a></td><td>

																<a href="edit.php?id='.$row['id'].'" title="Edit data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
																<a href="index.php?act=delete&id='.$row['id'].'" title="Delete" onclick="return confirm(\'Are you sure to remove this data '.$row['tag'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
															</td>
															</tr>
															';
															$no++;
														}
													}
													?>
                      </tbody>
                  </table>
              </div>
              <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
      </div>			
		</div>
	</div>
<?php 
include_once('footer.php');
?>
<script type="text/javascript">
		$(document).ready(function() {
          $('#grid').DataTable({
						"pageLength": 300
					}
					);
      } );
	</script>
</body>
</html>