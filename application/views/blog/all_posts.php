<div class="container all-posts">
	<h1>All Blog Posts</h1>
	<?php foreach ($posts as $post): ?>
		<div class="row blog-post">
			<div class="col-sm-4">
				<a href="<?= base_url() ?>/blog/post/<?= $post['blog_post_id'] ?>">
				<?= $post['blog_post_id'] ?>		
				</a>
				<br>
				<mark>
				<?= $post['posted_at'] ?>
				</mark>
			</div>
			<div class="col-sm-8">
				<?= $post['post_content'] ?>
			</div>
		</div>
	<?php endforeach ?>
	
</div>