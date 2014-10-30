<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Search results</title>

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

    <a href="view_posts.php"><- Back to your logs</a>

    <form method="post" action="search.php">
      <input type="text" name="search" value="<?php echo $search_term; ?>">
      <input type="submit" name="submit" value="Search">
    </form>
    	
      <?php
        if(count($results) > 0){
          echo '<h3>Search results for "'.$search_term.'"</h3>';
          
          foreach($results as $result){
            if($result["date"] == $today){
              echo '<div class="row">
              <div class="col-xs-4 col-sm-2"><a href="view_post.php?date='.$result["date"].'">Today</a></div>
              <div class="col-xs-8 col-sm-10">'.$result["content"].'</div>
              </div>';

            } else {
              echo '<div class="row">
              <div class="col-xs-4 col-sm-2"><a href="view_post.php?date='.$result["date"].'">'.$result["date"].'</a></div>
              <div class="col-xs-8 col-sm-10">'.$result["content"].'</div>
              </div>';
            }
            

          }

        } else {
          echo '<h3>There aren\'t any results that match "'.$search_term.'"</h3>';
        }
      ?>


    </div> <!-- /container -->

  </body>
</html>
