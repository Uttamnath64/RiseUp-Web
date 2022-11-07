<div class="lit-post-create-main" style="padding: 2rem;">
	<div style="width: 100%;">
		<label class="lit-post-create-web-title">Create article</label>
		<div class="lit-post-create-error-text"></div>
		<div style="display: flex;">
		<div class="lit-post-create-title-div" style="width: 65%; margin-right: 2rem;">
			<label class="lit-post-create-title-lable">Title</label>
			<input readonly="ture" class="lit-post-create-title-input" style="" type="text" name="Post_Title" value="<?=$data['Article']['Edit_Title']?>">
			<input style="display: none;" type="text" name="Post_Url" value="<?=$data['Article']['Edit_Url']?>">
		</div>
		<div class="lit-post-create-image-display" style="width: 35%;">
			<img class="lit-post-create-image-display-img" src="<?=RISEUP.'/images/'.$data['Article']['Edit_Image']?>">
		</div>
		</div>
		<div class="lit-post-create-blog-div">
			<label class="lit-post-create-blog-lable">Article</label>
			<textarea readonly="ture" name="Post_Blog" class="lit-post-create-blog-input" ><?=$data['Article']['Edit_Article']?></textarea>
		</div> 
		<div class="lit-post-create-tags-div">
			<label class="lit-post-create-tags-lable">Keyword (Optionel)</label>
			<textarea readonly="ture" name="Post_Tags" class="lit-post-create-tags-input"><?=$data['Article']['Edit_Tags']?></textarea>
		</div>
		<div style="display: flex;">
		<div class="lit-post-create-Paid-div" style="width: 50%;">
			<label class="lit-post-create-Paid-lable">Paid promotion (Optionel)</label>
			<input readonly="ture" name="Post_Paid" class="lit-post-create-Paid-input" placeholder="Add link" value="<?=$data['Article']['Edit_Paid_Promotion']?>" type="text" style="width: 80%;" >
		</div>
		<div class="lit-post-create-category-div" style="width: 50%;">
			<label class="lit-post-create-category-lable">Category</label>
			<select readonly="ture" style="width: 80%;" name="Post_Category" class="lit-post-create-category-input">
							<?php

				foreach ( $data['Category'] as $key => $value) {
					if ($value->Id == $data['Article']['Edit_Category_Id']) {
						echo '<option value="'.$value->Id.'"selected>'.$value->Category_Name.'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	</div>
	<div style="display:flex; width: 100%;">
		<div class="lit-post-create-Visibility-div" style="width: 50%;">
			<label class="lit-post-create-Visibility-lable">Visibility</label>
			<select readonly="ture" style="width: 80%;" name="Post_Visibility" class="lit-post-create-Visibility-input">
			<?php
				if($data['Article']['Edit_Visibility'] == 'PU'){
					?><option value="PU" selected>Public</option><?php
				}elseif($data['Article']['Edit_Visibility'] == 'UN'){
					?><option value="UN" selected>Unlisted</option><?php
				}elseif($data['Article']['Edit_Visibility'] == 'PR'){
					?><option value="PR" selected>Private</option><?php
				}else{

				}
			?>
			</select>
		</div>
		<div class="lit-post-create-Comments-div" style="width: 50%;">
			<label class="lit-post-create-Comments-lable">Comments</label>
			<select readonly="ture" style="width: 80%;" name="Post_Comments" class="lit-post-create-Comments-input">
				<?php
					if($data['Article']['Edit_Comments'] == '1'){
						?><option selected>Allow all comments</option><?php
					}elseif($data['Article']['Edit_Comments'] == '0'){
						?><option  selected>Disable comments</option><?php
					}
				 ?>
			</select>
		</div>
	</div>
	<div style="margin-bottom: 15rem;">
		
	</div>
</div>
