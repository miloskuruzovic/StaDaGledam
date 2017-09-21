<div class="container-fluid" style="margin-top: 10px;">
<?php $i = 0;  ?>
	<?php foreach ($images as $image): ?>
<?php if ($i%3 == 0): ?>
	<div class="row">
<?php endif ?>
		<div class="col-sm-4">
		<img class="img-responsive" src="<?= base_url() ?>img/<?= $image['name'] ?>">
		<?php $i++; ?>
		</div>	
	
<?php if ($i%3 == 0): ?>
	</div>
<?php endif ?>
	<?php endforeach ?>
	
</div>