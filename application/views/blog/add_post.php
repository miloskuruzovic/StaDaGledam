<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<div class="container text-center">
	<div class="row">
		<h1 class="h1-test">New Blog Post</h1>
	</div>
	<div class="row">
            <?= form_open_multipart('blog/add_post') ?>
                <div class="form-group">
                    <input type="text" 
                    name="title" 
                    class="form-control" 
                    id="blog-post-title" 
                    placeholder="Post Title"
                    required >
                    <input type="hidden" name="sent" value="sent">
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea name="post" id="post" rows="20" cols="100">
                        Ready to start writting about movies? :)
                        </textarea>
                        <script>CKEDITOR.replace( 'post' );</script>  
                    </div>
                    <div class="col-sm-2">
                        <select name="category" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value=<?= $category['blog_category_id']?>>
                                <?= $category['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>  
                </div>         
            </form> 		
	</div>
    <div class="row">

    </div>
</div>