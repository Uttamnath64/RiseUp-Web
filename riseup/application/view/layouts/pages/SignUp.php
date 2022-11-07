
	<div class="lit-signup-main">
		<div class="lit-signup-c">
			<div class="lit-signup-div">
				<p class="lit-signup-title">Welcome</p>
				<form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
					<div class="lit-signup-error-text"></div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">First name</p>
						<input class="lit-signup-input" type="text" name="F_Name">
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Last name</p>
						<input class="lit-signup-input" type="text" name="L_Name">
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Mobile number</p>
						<input class="lit-signup-input" type="text" name="Mobile_Number">
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Email</p>
						<input class="lit-signup-input" type="email" name="Email">
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Gender</p>
						<select class="lit-signup-input" name="Gender" id="">
							<option value="none">-- Select gender --</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="O">Other</option>
						</select>
					</div>

					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Date of birth</p>
						<input class="lit-signup-input" type="date" name="DOB">
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Country</p>
						<select class="lit-signup-input" name="Country" id="">
							<option value="none">-- Select country --</option>
						<?php

						foreach ( $data['Data'] as $key => $value) {
							echo '<option value="'.$value->Id.'">'.$value->country_name.'</option>';
						}
						?>
							
						</select>
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Password</p>
						<input class="lit-signup-input" type="password" name="Password">
					</div>
					<div class="lit-signup-input-div">
						<p class="lit-signup-input-text">Profile picture</p>
						<input class="lit-signup-input" accept="image/jpeg,image/jpg" type="file" name="Image">
					</div>
					<input class="lit-signup-input lit-signup-input-btn" type="submit" name="submit" value="Sign Up">
				</form>
				<div class="lit-signup-signin-link">
					<label>Do you have a account?</label>
					<a href="<?=URLROOT?>/feed/signin">SignIn</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=URLROOT?>/script/SignUp.js"></script>