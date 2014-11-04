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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  

  <body class="signup">
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
            <li><a href="#">About</a></li>
            <li><a href="sign_up.php">Sign up</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
  </nav>
  
    <div class="container form-container">	
	   	<?php echo $extra_html; ?>
	   			<form class="form-signin" action="catch_login.php" method="post">
					<h2 class="form-signin-heading">Please log in</h2>
					<input type="text" name="email" value="" placeholder="Email address" class="form-control"/>
					<input type="password" name="password" value="" class="form-control" placeholder="Password"/>
					<!--<label class="checkbox">
			          <input type="checkbox" value="remember-me"> Remember me
			        </label> -->
					<!--<input type="submit" value="Login"/> -->
					<button class="btn btn-lg btn-default btn-block" type="submit">Log in</button>
					<h5>Don't have an account? <a href="sign_up.php">Sign up</a></h5>
				</form>
    </div> <!-- /container -->

    <script src="../assets/js/script.js"></script>
  </body>
</html>
