<script src="../ckeditor/ckeditor.js"></script>
<div class="container text-center">
	<div class="row">
		<h1 class="h1-test">Test Form</h1>
	</div>
	<div class="row">
		<?= form_open_multipart('film/add_test') ?>
            <textarea name="post" id="post" rows="50" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="post"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'post' );
            </script>
        </form>
	</div>
</div>