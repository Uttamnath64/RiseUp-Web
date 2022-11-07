<header>
		<div class="lit-header-main">
			<div class="lit-header-div">
				<button class="lit-header-sidebar-btn" ><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g class="style-scope yt-icon"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" class="style-scope yt-icon"></path></g></svg></button>
				<div class="lit-header-riseup-logo">
					<img src="/images/riseup.png">
					<b><p>RiseUp</p></b>
				</div>
				<form action="/feed/Search" method="POST">
					<div class="lit-header-search-div">
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
						<input type="text" autocapitalize="none" autocomplete="off" autocorrect="off" name="search_query" value="<?=(isset($data['Home_Data']['search_query']))? $data['Home_Data']['search_query'] : '' ?>" placeholder="Search RiseUp">		
					</div>
				</form>
				<div class="lit-header-btn">
					<button class="lit-header-search-btn">
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
					</button>
					
					<a href="<?=URLROOT?>/feed/notification" class="h-btn">
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
					</a>
					<a href="<?=URLROOT?>/feed/CreateArticle" class="h-btn">
						<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M19,13h-6v6h-2v-6H5v-2h6V5h2v6h6V13z"/></g></g></svg>
					</a>
					<div class="lit-header-account-login-div">
					<a href="<?=URLROOT?>/feed/signin" style="<?php if(!isLoggedIn()){echo 'display: block;';}else{ echo 'display: none;'; } ?>" class=" lit-header-account-login"><div>Login</div></a>
				</div>
					<div class="lit-header-account" style="<?php if(!isLoggedIn()){ echo 'display: none;'; } ?>" >
						<?php 
						if(isLoggedIn()){
							$userdata = getdata();
						?>
						<img src="<?=URLROOT?>/images/<?=$userdata->Channel_Logo?>">
						<div class="lit-header-account-name">
							<b><p><?php if($userdata->L_Name =="."){ echo $userdata->F_Name; }else{ echo $userdata->F_Name." ".$userdata->L_Name; } ?></p></b>
						<?php
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>