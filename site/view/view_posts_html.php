<div class="container content">
      <form method="post" action="search.php" class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="">
        </div>
        <button type="submit" class="btn">Search logs</button>
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
</div>

