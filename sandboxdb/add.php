<?php 
include_once('header.php');
?>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Add New</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$codeurl	= mysqli_real_escape_string($con,(strip_tags($_POST["codeurl"],ENT_QUOTES)));
				$tag	= mysqli_real_escape_string($con,(strip_tags($_POST["tag"],ENT_QUOTES)));
				
				$insert = mysqli_query($con, "INSERT INTO code(tag,codeurl,createdate, modifydate)
													VALUES('$tag','$codeurl',now(),now())") or die(mysqli_error());

				if($insert){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Done! Record saved!</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. It was not possible to save thsi record !</div>';
				}

			}
			?>

			<form name="contact_form" id="contact_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				
			<div class="form-group">
					<label class="col-sm-3 control-label">Codeurl</label>
					<div class="col-sm-4">
						<input type="text" name="codeurl" class="form-control" placeholder="Codeurl" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tag</label>
					<div class="col-sm-4">
						<input type="text" name="tag" class="form-control" placeholder="Tag" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Save">
						<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
			</form>
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
        })
        .on('success.form.bv', function(e) {
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