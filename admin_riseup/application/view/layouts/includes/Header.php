<header>
		<div class="lit-header-main">
			<div class="lit-header-div">
				<button class="lit-header-sidebar-btn" ><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g class="style-scope yt-icon"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" class="style-scope yt-icon"></path></g></svg></button>
				<div class="lit-header-riseup-logo">
					<img src="<?=RISEUP?>/images/riseup.png">
					<b><p> Admin Studio</p></b>
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
					
					<div class="lit-header-account-login-div">
					<a href="/feed/signin" style="<?php if(!isLoggedIn()){echo 'display: block;';}else{ echo 'display: none;'; } ?>" class=" lit-header-account-login"><div>Login</div></a>
				</div>
					
					</div>
				</div>
			</div>
		</div>
	</header>