<div class="container">
	<div class="row">
			<h1><?= $title ?></h1>
	</div>
	<div class="row">
		<p>
			<?= $posts->post_content ?>
		</p>
		<mark><?= $posts->posted_at ?></mark>
		<br>
		<?php if 
		(isset($_SESSION['user_id']) && 
		$_SESSION['user_id'] == $posts->post_author): ?>
			<a href="<?= base_url() ?>blog/update_post/<?= $posts->blog_post_id ?>">
				Edit post
			</a>
		<?php endif ?>
	</div>
</div>