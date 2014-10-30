<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Your Logs</title>

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
            <li><a href="new_post.php">Today's log</a></li>
            <li><a href="logout.php">Log out</a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    	<form method="post" action="search.php">
                <input type="text" name="search">
                <input type="submit" name="submit" value="Search logs">
              </form>
      <?php
        if(count($posts) > 0){

          echo '<h3>'.$name.', here are your past logs.</h3>';
          
          foreach($posts as $post){
            if($post["date"] == $today){
              echo '<div class="row">
              <div class="col-xs-4 col-sm-2"><a href="view_post.php?date='.$post["date"].'">Today</a></div>
              <div class="col-xs-8 col-sm-10">'.$post["content"].'</div>
              </div>';

            } else {
              echo '<div class="row">
              <div class="col-xs-4 col-sm-2"><a href="view_post.php?date='.$post["date"].'">'.$post["date"].'</a></div>
              <div class="col-xs-8 col-sm-10">'.$post["content"].'</div>
              </div>';
            }
          }

        } else {
          echo '<h3> Your logbook is empty. How about logging todays\'s entry <a href="new_post.php">now</a>?</h3>';
        }
      ?>


    </div> <!-- /container -->

  </body>
</html>
