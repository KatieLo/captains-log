<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Log in to Cpatain's Log</title>

    <link href="../assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	   	<a href="index.php">Back to homepage</a>
	   	<?php echo $extra_html; ?>
	   	<div class="row">
	   		<div class="col-xs-12 col-sm-6 col-md-8">
	   			<form class="form-signin" action="catch_login.php" method="post">
					<h2 class="form-signin-heading">Please log in</h2>
					<input type="text" name="email" value="" placeholder="Email address" class="form-control"/><br>
					<input type="password" name="password" value="" class="form-control" placeholder="Password"/><br>
					<!--<label class="checkbox">
			          <input type="checkbox" value="remember-me"> Remember me
			        </label> -->
					<!--<input type="submit" value="Login"/> -->
					<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
					<h5>Don't have an account? <a href="login.php">Sign up</a></h5>
				</form>
	   		</div>
	   	</div>
		
		
    </div> <!-- /container -->

  </body>
</html>
