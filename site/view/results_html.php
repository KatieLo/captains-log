
  <div class="container content">
     <form method="post" action="search.php" class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="<?php echo $search_term; ?>">
        </div>
        <button type="submit" class="btn">Search logs</button>
      </form>
    	
      <?php
        if(count($results) > 0){
          echo '<h3>Search results for "'.$search_term.'"</h3>';
          
          foreach($results as $result){
            $highlighted_content = highlight_text($result["content"], $search_term);
            if($result["date"] == $today){
              echo '<div class="row">
              <div class="col-xs-4 col-sm-2"><a href="view_post.php?date='.$result["date"].'">Today</a></div>
              <div class="col-xs-8 col-sm-10">'.$highlighted_content.'...</div>
              </div>';

            } else {
              echo '<div class="row">
              <div class="col-xs-4 col-sm-2"><a href="view_post.php?date='.$result["date"].'">'.$result["date"].'</a></div>
              <div class="col-xs-8 col-sm-10">'.$highlighted_content.'...</div>
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
