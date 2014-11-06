<!-- header included above -->

<div class="container content">
	<h3>Hi Captain <?php echo $name?>! What did you do today?</h3>

  <?php echo $notification_text; ?>
  <div class="saved">
  	Your log has been saved.
  </div>
  <div class="error alert alert-danger hidden"></div>

<form id="new_post_form" action="catch_new_post.php" method="post">
	
	<textarea id="new-post-textarea" type="text" name="post"><?php echo $post ?></textarea><br>
	<button class="btn btn-lg btn-default save" type="submit">Save</button>
</form>

</div> <!-- /container -->

<!-- footer below -->
