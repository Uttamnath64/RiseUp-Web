<div class="lit-library-main">
	<div class="lit-library-left">
		<div class="lit-library-contenar">
			<?php include "../application/view/layouts/Article/".$data['Article']['File_Name'];
			?>
		</div>
	</div>
	<div class="lit-library-right">
		<div class="lit-library-opsion-bar">
			<p class="lit-library-opsion-bar-tab-name">Article</p>
			<a href="<?=RISEUP?>/feed/article/<?=$data['Article']['SB_Url']?>/RiseUp Studio">
			<div class="lit-lithome-contant-title slit-articl-title" style="display: flex; margin-left: 1rem;">
			<div class="lit-notifi-img" style="width:35%; margin: 0.5rem 0;">
				<img src="http://riseup.lit:81/images/<?=$data['Article']['SB_Image']?>">
			</div>
				<p style="width: 65%; height: 4rem; margin-left: 1rem;"><?=$data['Article']['SB_Title']?></p>
			</div>
		</a>
			<a href="/feed/article/<?=$data['Article']['SB_Url']?>/edit" <?= ($data['Article']['File_Name'] == "Edit.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?>>
				<p>Edit article</p>
			</a>

			<a href="/feed/article/<?=$data['Article']['SB_Url']?>/analytics" <?= ($data['Article']['File_Name'] == "analytics.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?> >
			<p>Analytics</p>
			</a>

			<a href="/feed/article/<?=$data['Article']['SB_Url']?>/comments" <?= ($data['Article']['File_Name'] == "comments.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?>>
				<p>Comments</p>
			</a>
		</div>
	</div>
</div>