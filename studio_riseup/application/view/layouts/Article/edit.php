<form class="lit-post-create-from" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="lit-post-create-main" style="padding: 2rem;">
	<div style="width: 100%;">
		<label class="lit-post-create-web-title">Create article</label>
		<div class="lit-post-create-error-text"></div>
		<div style="display: flex;">
		<div class="lit-post-create-title-div" style="width: 65%; margin-right: 2rem;">
			<label class="lit-post-create-title-lable">Title</label>
			<input class="lit-post-create-title-input" style="" type="text" name="Post_Title" value="<?=$data['Article']['Edit_Title']?>">
			<input style="display: none;" type="text" name="Post_Url" value="<?=$data['Article']['Edit_Url']?>">
		</div>
		<div class="lit-post-create-image-display" style="width: 35%;">
			<img class="lit-post-create-image-display-img" src="<?=RISEUP.'/images/'.$data['Article']['Edit_Image']?>">
		</div>
		</div>
		<div class="lit-post-create-blog-div">
			<label class="lit-post-create-blog-lable">Article</label>
			<textarea name="Post_Blog" class="lit-post-create-blog-input" ><?=$data['Article']['Edit_Article']?></textarea>
		</div> 
		<div class="lit-post-create-tags-div">
			<label class="lit-post-create-tags-lable">Keyword (Optionel)</label>
			<textarea name="Post_Tags" class="lit-post-create-tags-input"><?=$data['Article']['Edit_Tags']?></textarea>
		</div>
		<div style="display: flex;">
		<div class="lit-post-create-Paid-div" style="width: 50%;">
			<label class="lit-post-create-Paid-lable">Paid promotion (Optionel)</label>
			<input name="Post_Paid" class="lit-post-create-Paid-input" placeholder="Add link" value="<?=$data['Article']['Edit_Paid_Promotion']?>" type="text" style="width: 80%;" >
		</div>
		<div class="lit-post-create-category-div" style="width: 50%;">
			<label class="lit-post-create-category-lable">Category</label>
			<select style="width: 80%;" name="Post_Category" class="lit-post-create-category-input">
				<option value="none">-- Select category --</option>
							<?php

				foreach ( $data['Category'] as $key => $value) {
					$selected = "";
					if ($value->Id == $data['Article']['Edit_Category_Id']) {
						$selected = "selected";
					}
					echo '<option value="'.$value->Id.'"'.$selected.'>'.$value->Category_Name.'</option>';
				}
				?>
			</select>
		</div>
	</div>
	</div>
	<div style="display:flex; width: 100%;">
		<div class="lit-post-create-Visibility-div" style="width: 50%;">
			<label class="lit-post-create-Visibility-lable">Visibility</label>
			<select style="width: 80%;" name="Post_Visibility" class="lit-post-create-Visibility-input">
				<option value="PU" <?php echo ($data['Article']['Edit_Visibility'] == 'PU') ? 'selected' : '' ;?>>Public</option>
				<option value="UN" <?php echo ($data['Article']['Edit_Visibility'] == 'UN') ? 'selected' : '' ;?>>Unlisted</option>
				<option value="PR"<?php echo ($data['Article']['Edit_Visibility'] == 'PR') ? 'selected' : '' ;?>>Private</option>
			</select>
		</div>
		<div class="lit-post-create-Comments-div" style="width: 50%;">
			<label class="lit-post-create-Comments-lable">Comments</label>
			<select style="width: 80%;" name="Post_Comments" class="lit-post-create-Comments-input">
				<option value="1" <?php echo ($data['Article']['Edit_Comments'] == '1') ? 'selected' : '' ;?>>Allow all comments</option>
				<option value="0" <?php echo ($data['Article']['Edit_Comments'] == '0') ? 'selected' : '' ;?>>Disable comments</option>
			</select>
		</div>
	</div>
		<div style="width:100%; display: flex;">
			<div class="lit-post-create-image-div"style="width: 50%;">
			<label class="lit-post-create-image-lable">Image</label>
			<input class="lit-post-create-image-input"style="width: 80%;" accept="image/jpeg,image/jpg"  type="file" onchange="showImg(this);" name="Image">
		</div>
		</div>
	<div class="lit-post-create-bottom">
		<label class="lit-post-create-web-title" style="width: 78%;">Article upload</label>
		<div class="lit-post-create-btn">
			<a href="feed/home" >Cancel</a>
			<input class="lit-post-create-btn-submit" type="submit" name="submit" value="Save">
		</div>
	</div>
	</form>
</div>
</form>
<script type="text/javascript" src="/script/article.js"></script>