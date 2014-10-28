<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Your Posts</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/styles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <a href="view_posts.php">See all your posts</a>
      <a href="logout.php">Logout</a>

    	<h3>Hi, <?php echo $name?>.</h3>
 
		<?php echo $notification_text; ?>

		<form action="catch_new_post.php" method="post">
			<h4>Today</h4>
			<textarea type="text" name="post"><?php echo $post ?></textarea>
			<button type="submit">Save</button>
		</form>

    </div> <!-- /container -->

  </body>
</html>
