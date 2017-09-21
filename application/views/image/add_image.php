<h1 class="text-center">Add Image to Gallery</h1>
<div class="container">
	<div class="row">
		<?= form_open_multipart('image/add_image') ?>
			<div class="form-group">
				<label for="img">Slika:</label>
				<input type="file" name="img" id="img" class="form-control">
			</div>
			<div class="form-group">
				<input class='btn btn-default' type="submit" name="submit" value="Add" />
			</div>
		</form>	
	</div>
	<div class="row">
		<?= ($submited)?$submited:"" ?>
	</div>
</div>