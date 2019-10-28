<?php 
include_once('header.php');
?>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Sandbox &raquo; Edit Data</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$id = mysqli_real_escape_string($con,(strip_tags($_GET["id"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM code WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$codeurl	= mysqli_real_escape_string($con,(strip_tags($_POST["codeurl"],ENT_QUOTES)));
				$tag	= mysqli_real_escape_string($con,(strip_tags($_POST["tag"],ENT_QUOTES)));

				$update = mysqli_query($con, "UPDATE code SET codeurl='$codeurl',tag='$tag', modifydate=now() WHERE id=$id") or die(mysqli_error());
				if($update){
					header("Location: edit.php?id=".$id."&mode=update");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, it was no possible to save data.</div>';
				}
			}
			
			if(isset($_GET['mode']) == 'update'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data updated succesfully!</div>';
			}
			?>
			<div class="row">
			<form name="contact_form" id="contact_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-2 control-label">Tag</label>
					<div class="col-sm-10">
						<input type="text" name="tag" value="<?php echo $row['tag']; ?>" class="form-control" placeholder="codeurl" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Code url</label>
					<div class="col-sm-10">
						<input type="text" name="codeurl" value="<?php echo $row['codeurl']; ?>" class="form-control" placeholder="codeurl" required>
					</div>
				</div>			
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-10">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Save Data">
						<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
			</form>

			</div>
			
		</div>
	</div>
<?php 
include_once('footer.php');
?>
<script type="text/javascript">
       $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            codeurl: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply the codeurl'
                    }
                }
            },
             tag: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply the tag'
                    }
                }
            }
          }
        })        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});


    </script>
</body>
</html>