<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Sign Up to Captain's Log</title>

    <link href="../assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Captain's Log</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="login.php">Log in</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
  	</nav>

    <div class="container form-container">
	   	
	   	<?php echo $extra_html; ?>
	   	<div class="row">
	   		<div class="col-xs-12 col-sm-6">
	   			<form class="form-signin" action="catch_sign_up.php" method="post">
					<h2 class="form-signin-heading">Sign Up</h2>
					<input type="text" name="name" value="" placeholder="First name" class="form-control"/><br>
					<input type="text" name="email" value="" placeholder="Email address" class="form-control"/><br>
					<input type="password" name="password1" value="" class="form-control" placeholder="Password"/><br>
					<input type="password" name="password2" value="" class="form-control" placeholder="Retype password"/><br>
					<!--<label class="checkbox">
			          <input type="checkbox" value="remember-me"> Remember me
			        </label> -->
					<!--<input type="submit" value="Login"/> -->
					<button class="btn btn-lg btn-default btn-block" type="submit">Sign up</button>
					<h5>Already have an account? <a href="login.php">Log in </a></h5>
				</form>
				
	   		</div>
	   		<div class="col-xs-12 col-sm-6 form-signin">
	   			<h4 class="form-signin-sub-heading">Why you'll love Captain's log:</h4>
	   			<ul>
	   				<li>Easy to log daily posts</li>
	   				<li>See and search your past posts</li>
	   				<li>no spam, no ads, and your data is kept safe and secure</li>
	   			</ul>
	   		</div>
	   	</div>
		
		
    </div> <!-- /container -->

  </body>
</html>