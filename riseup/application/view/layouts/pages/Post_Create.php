<form class="lit-post-create-from" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="lit-post-create-main">
	<div class="lit-post-create-c">
		<label class="lit-post-create-web-title">Create article</label>
		<div class="lit-post-create-error-text"></div>
		<div class="lit-post-create-title-div">
			<label class="lit-post-create-title-lable">Title</label>
			<input class="lit-post-create-title-input" type="text" name="Post_Title" >
		</div>
		<div class="lit-post-create-blog-div">
			<label class="lit-post-create-blog-lable">Article</label>
			<textarea name="Post_Blog" class="lit-post-create-blog-input"></textarea>
		</div> 
		<div class="lit-post-create-tags-div">
			<label class="lit-post-create-tags-lable">Keyword (Optionel)</label>
			<textarea name="Post_Tags" class="lit-post-create-tags-input"></textarea>
		</div>
	
		<div class="lit-post-create-category-div">
			<label class="lit-post-create-category-lable">Category</label>
			<select name="Post_Category" class="lit-post-create-category-input">
				<option value="none">-- Select category --</option>
							<?php

				foreach ( $data['Category'] as $key => $value) {
					echo '<option value="'.$value->Id.'">'.$value->Category_Name.'</option>';
				}
				?>
			</select>
		</div>
	</div>
		<div class="lit-post-create-right">
		<label class="lit-post-create-web-title">Article details</label>
		<div class="lit-post-create-image-display">
			<img class="lit-post-create-image-display-img" src="">
		</div>
		<div class="lit-post-create-image-div">
			<label class="lit-post-create-image-lable">Image</label>
			<input class="lit-post-create-image-input" accept="image/jpeg,image/jpg"  type="file" onchange="showImg(this);" name="Image">
		</div>
		<div class="lit-post-create-Visibility-div">
			<label class="lit-post-create-Visibility-lable">Visibility</label>
			<select name="Post_Visibility" class="lit-post-create-Visibility-input">
				<option value="PU">Public</option>
				<option value="UN">Unlisted</option>
				<option value="PR">Private</option>
			</select>
		</div>
		<div class="lit-post-create-Comments-div">
			<label class="lit-post-create-Comments-lable">Comments</label>
			<select name="Post_Comments" class="lit-post-create-Comments-input">
				<option value="1">Allow all comments</option>
				<option value="0">Disable comments</option>
			</select>
		</div>
		<div class="lit-post-create-Paid-div">
			<label class="lit-post-create-Paid-lable">Paid promotion (Optionel)</label>
			<input name="Post_Paid" class="lit-post-create-Paid-input" placeholder="Add link" type="text" >
		</div>
	</div>
	<div class="lit-post-create-bottom">
		<label class="lit-post-create-web-title">Article upload</label>
		<div class="lit-post-create-btn">
			<a href="<?=URLROOT?>/feed/home">Cancel</a>
			<input class="lit-post-create-btn-submit" type="submit" name="submit" value="Upload">
		</div>
	</div>
	</form>
</div>
</form>
<script type="text/javascript" src="<?=URLROOT?>/script/Post_create.js"></script>