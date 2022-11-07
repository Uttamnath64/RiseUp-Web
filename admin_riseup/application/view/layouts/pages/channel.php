<div class="lit-library-main">
	<div class="lit-library-left">
		<div class="lit-library-contenar">
			<?php include "../application/view/layouts/Channel/".$data['Channel']['File_Name'];
			?>
		</div>
	</div>
	<div class="lit-library-right">
		<div class="lit-library-opsion-bar">
			<p class="lit-library-opsion-bar-tab-name">Channel</p>
			
			<a href="/feed/Channel/<?=$data['Channel']['SB_Url']?>/read" <?= ($data['Channel']['File_Name'] == "read.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?>>
				<p>View Channel</p>
			</a>

			<a href="/feed/Channel/<?=$data['Channel']['SB_Url']?>/analytics" <?= ($data['Channel']['File_Name'] == "analytics.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?> >
				<p>Analytics</p>
			</a>
		</div>
	</div>
</div>