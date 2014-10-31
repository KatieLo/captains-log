<!-- header included above -->

<div class="container content">
	<h3>Hi Captain <?php echo $name?>! What did you do today?</h3>

  <?php echo $notification_text; ?>

<form action="catch_new_post.php" method="post">
	
	<textarea rows="15" type="text" name="post"><?php echo $post ?></textarea><br>
	<button class="btn btn-lg btn-default " type="submit">Save</button>
</form>

</div> <!-- /container -->

<!-- footer below -->
