</style>
<div class="lit-library-main">
	<div class="lit-library-left">
		<div class="lit-library-contenar">
			<?php include "../application/view/layouts/notification/".$data['Notification_Data']['File_Name'];
			?>
		</div>
	</div>
	<div class="lit-library-right">
		<div class="lit-library-opsion-bar">
			<p class="lit-library-opsion-bar-tab-name">Channels</p>
			
			<a href="/feed/notification/" <?= ($data['Notification_Data']['File_Name'] == "notification.php") ? 'class="lit-library-opsion-bar-item 
			lit-library-opsion-bar-item-list lit-library-opsion-bar-item-click"' : 'class="lit-library-opsion-bar-item lit-library-opsion-bar-item-list"' ?>>
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="lit-joined-item-svg"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M21 5h2v14h-2zm-4 0h2v14h-2zm-3 0H2c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1h12c.55 0 1-.45 1-1V6c0-.55-.45-1-1-1zm-1 12H3V7h10v10z"></path><circle cx="8" cy="9.94" r="1.95"></circle><path d="M11.89 15.35c0-1.3-2.59-1.95-3.89-1.95s-3.89.65-3.89 1.95V16h7.78v-.65z"></path></svg>
				<p>All Notification</p>
			</a>

			<?=$data['Notification_Data']['Joined_Channel_item']?>
		</div>
	</div>
</div>