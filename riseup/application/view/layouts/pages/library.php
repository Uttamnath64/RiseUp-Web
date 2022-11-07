<div class="lit-library-main">
	<div class="lit-library-left">
		<div class="lit-library-contenar">
			<?php include "../application/view/layouts/library/".$data['librarydata']['File_Name'];
			?>
		</div>
	</div>
	<div class="lit-library-right">
		<div class="lit-library-opsion-bar">
			<p class="lit-library-opsion-bar-tab-name">Library</p>
			<a href="/feed/library/history" <?= ($data['librarydata']['File_Name'] == "history.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?> >
				<p>History</p>
			</a>

			<a href="/feed/library/your_article" <?= ($data['librarydata']['File_Name'] == "Article.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?>>
				<p>Your article</p>
			</a>

			<a href="/feed/library/liked_article" <?= ($data['librarydata']['File_Name'] == "Article_Like.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?> >
			<p>Liked articles</p>
			</a>

			<a href="/feed/library/bookmark" <?= ($data['librarydata']['File_Name'] == "Bookmark.php") ? 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item"' ?>>
				<p>Bookmark</p>
			</a>
		</div>
	</div>
</div>
