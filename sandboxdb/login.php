<?php
session_start();
if (isset($_POST['userid']))
{
  if (isset($_POST['login']))
  {
    if ($_POST['login']=='rabitoxp'){
        $_SESSION['userid']=$_POST['userid'];
        $_SESSION['login']=$_POST['login'];
        header("location:index.php");
    }
    else
    {
      echo 'Incorrect user!';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Cms :.. </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-black.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!--DatePicker -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!--DatePicker -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Boostrap validator -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" rel="stylesheet">    
    <!-- Boostrap validator -->
    <style type="text/css">
      @import url(https://fonts.googleapis.com/css?family=Exo:400,500,500italic,400italic,600,600italic,700,700italic,800,800italic,300,300italic);

      body {
        padding-top: 250px;
        /*The below background is just to add some color, you can set this to anything*/
        background-color: #f2f4f4;
      }
      .well{
        background-color: white;
      }

      .login-form{width:390px;}
      .login-title{font-family: 'Exo', sans-serif;text-align:center;color: black;}
      .login-userinput{margin-bottom: 10px;}
      .login-button{margin-top:10px;}
      .login-options{margin-bottom:0px;}
      .login-forgot{float: right;}

      .container{
        width: 360px;
      }
    </style>
  </head>
 
  <body>
<div class="container login-form">
  <img src="images/logo-header.png" style="width:62%;
    height:auto; display:none;" />  
    <h2 class="login-title">- Cms Login -</h2>
         <div class="container">

      <form class="well form-horizontal" action="login.php" method="post"  id="contact_form">
        <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" >Usuario</label> 
             <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="userid" placeholder="Usuario" class="form-control"  type="text">
            </div>
          </div>
        </div>
        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Password</label> 
             <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input name="login" placeholder="Password" class="form-control"  type="password">
            </div>
          </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</button>
            </div>
          </div>
      </fieldset>
    </form>

</div>
  
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- DatePicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
    <!-- DatePicker -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!-- Boostrap validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>

    <!-- Boostrap validator -->
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
            username: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'El usuario es requerido.'
                    }
                }
            },
            password: {
                validators: {
                    stringLength: {
                        min: 5,
                    },
                    notEmpty: {
                        message: 'El password es requerido.'
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
