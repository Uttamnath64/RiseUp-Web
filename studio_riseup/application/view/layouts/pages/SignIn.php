
	<div class="lit-signin-main">
		<div class="lit-signin-c">
			<div class="lit-signin-div">
				<p class="lit-signin-title">Welcome Back</p>
				<form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
					<div class="lit-signin-error-text"></div>
					<div class="lit-signin-input-div">
						<p class="lit-signin-input-text">Mobile number</p>
						<input class="lit-signin-input" type="text" name="Mobile_Number">
					</div>
					<div class="lit-signin-input-div">
						<p class="lit-signin-input-text">Password</p>
						<input class="lit-signin-input" type="password" name="Password">
					</div>
					<input class="lit-signin-input lit-signin-input-btn" type="submit" name="submit" value="Sign In">
				</form>
			</div>
			<div class="lit-signin-signup-link">
				<label>Don't have any account?</label>
				<a href="<?=RISEUP?>/feed/signup">SignUp</a>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=URLROOT?>/script/SignIn.js"></script>