
	<div class="lit-sidebar">
		<div class="lit-sidebar-content">
			<div class="lit-sidebar-item-div">
				<b><p class="lit-sidebar-items-title">Tab</p></b>
				<a <?php if($data['File']=='Home.php'){ echo'class="lit-sidebar-item  lit-sidebar-item-click"';}else{ echo' class="lit-sidebar-item"'; }?> href="<?php echo URLROOT?>">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" class="lit-sidebar-item-svg" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
					<p>Dashboard</p>
				</a>
				<a href="<?php echo URLROOT."/feed/Articles"?>" <?php if($data['File']=='Articles.php'){ echo'class="lit-sidebar-item  lit-sidebar-item-click"';}else{ echo' class="lit-sidebar-item"'; }?>>
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" class="lit-sidebar-item-svg" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><g><path d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z"/></g><path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z"/></g></svg>
					<p>Articles</p>
				</a>
				<a href="<?php echo URLROOT."/feed/Analytics"?>" <?php if($data['File']=='Analytics.php'){ echo'class="lit-sidebar-item  lit-sidebar-item-click"';}else{ echo' class="lit-sidebar-item"'; }?>>
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="lit-sidebar-item-svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></svg>
					<p>Analytics</p>
				</a>
				<a href="<?php echo URLROOT."/feed/Comments"?>" <?php if($data['File']=='Comments.php'){ echo'class="lit-sidebar-item  lit-sidebar-item-click"';}else{ echo' class="lit-sidebar-item"'; }?>>
					<svg xmlns="http://www.w3.org/2000/svg" class="lit-sidebar-item-svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM20 4v13.17L18.83 16H4V4h16zM6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"/></svg>
					<p>Comments</p>
				</a>
				
			</div>
			<?php if(isLoggedIn()){ ?>
			<div  class="lit-sidebar-item-div ">
				<b><p class="lit-sidebar-items-title">Account</p></b>
				<a href="<?php echo 'http://riseup.lit:81/feed/channel/'.$_SESSION['User_Id']; ?>" target="_BLANK" class="lit-sidebar-item ">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="lit-sidebar-item-svg"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
					<p>View channel</p>
				</a>
				<a href="<?php echo "http://riseup.lit:81"?>" class="lit-sidebar-item" target="_BLANK">
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="lit-sidebar-item-svg"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z"/><path d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z"/><path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z"/></g></g></svg>
					<p>RiseUp</p>
				</a>
				<a href="/feed/Customisation" class="lit-sidebar-item">
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" class="lit-sidebar-item-svg" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24" x="0"/></g><g><g><polygon points="20,7 20.94,4.94 23,4 20.94,3.06 20,1 19.06,3.06 17,4 19.06,4.94"/><polygon points="8.5,7 9.44,4.94 11.5,4 9.44,3.06 8.5,1 7.56,3.06 5.5,4 7.56,4.94"/><polygon points="20,12.5 19.06,14.56 17,15.5 19.06,16.44 20,18.5 20.94,16.44 23,15.5 20.94,14.56"/><path d="M17.71,9.12l-2.83-2.83C14.68,6.1,14.43,6,14.17,6c-0.26,0-0.51,0.1-0.71,0.29L2.29,17.46c-0.39,0.39-0.39,1.02,0,1.41 l2.83,2.83C5.32,21.9,5.57,22,5.83,22s0.51-0.1,0.71-0.29l11.17-11.17C18.1,10.15,18.1,9.51,17.71,9.12z M14.17,8.42l1.41,1.41 L14.41,11L13,9.59L14.17,8.42z M5.83,19.59l-1.41-1.41L11.59,11L13,12.41L5.83,19.59z"/></g></g></svg>
					<p>Customisation</p>
				</a>
				<?php if($_SESSION['Theme'] == 1){ ?>
				<a href="/feed/theme"  class="lit-sidebar-item">
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="lit-sidebar-item-svg" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><g><path d="M14,4c0.34,0,0.68,0.02,1.01,0.07C13.1,6.23,12,9.05,12,12s1.1,5.77,3.01,7.93C14.68,19.98,14.34,20,14,20 c-4.41,0-8-3.59-8-8S9.59,4,14,4 M14,2C8.48,2,4,6.48,4,12s4.48,10,10,10c1.82,0,3.53-0.5,5-1.35c-2.99-1.73-5-4.95-5-8.65 s2.01-6.92,5-8.65C17.53,2.5,15.82,2,14,2L14,2z"/></g></g></g></svg>
					<p>Dark theme</p>
				</a>
			<?php }else{ ?>
				<a href="/feed/theme"  class="lit-sidebar-item">
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="lit-sidebar-item-svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M12,9c1.65,0,3,1.35,3,3s-1.35,3-3,3s-3-1.35-3-3S10.35,9,12,9 M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5 S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1 s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0 c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95 c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41 L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41 s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06 c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z"/></svg>
					<p>Light theme</p>
				</a>
				<?php } ?>
								<a href="<?php echo URLROOT."/SignInAndUp/logoutActiv"?>" class="lit-sidebar-item">
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="lit-sidebar-item-svg"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g></svg>
					<p>Logout</p>
				</a>
			</div>
		<?php } ?>
		</div>
	</div>