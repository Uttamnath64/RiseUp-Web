<form class="lit-edit-from" action="#" method="POST" enctype="multipart/form-data" autocomplete="off"><div style="width: 100%; padding-top: 4rem; height: 92vh; overflow-x: hidden; overflow-y: auto; ">
<div class="lit-library-contenar" style="width:50%; height: auto; margin: auto; margin-bottom: 5rem;">
	<div class="lit-history-main">
		<div class="lit-history-title">
			<p>Edit profile</p>
		</div>
		<div class="slit-al-data slit-channel-edit-main-div">
			<div>
	<div>
		<div class="lit-post-create-error-text"></div>
		<table>
			<tr><th class="slit-channel-c-size"></th><th></th></tr>
			<tr>
				<td class="slit-edit-channel-profile-img-div"><img class="slit-edit-channel-profile-img" src="<?=RISEUP?>/images/<?=$data['Customisation_Data']['Channel_Logo']?>"></td>
				<td>
  <input type="file" accept="image/jpeg,image/jpg" onchange="showImg(this);" name="Image">

	</td>
</tr>
</table>
<div class="slit-channel-main-title">Account information</div>
<table>				
			<tr><th class="slit-channel-c-size"></th><th></th></tr>
			<tr>
				<td>First name</td>
				<td><input class="lit-signup-input" type="text" name="F_Name" value="<?=$data['Customisation_Data']['F_Name']?>"></td>
			</tr>
			<tr>
				<td>Last name</td>
				<td><input class="lit-signup-input" type="text" name="L_Name" value="<?=$data['Customisation_Data']['L_Name']?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="lit-signup-input" type="email" name="Email" value="<?=$data['Customisation_Data']['Email']?>"></td>
			</tr>
			<tr>
				<td>Mobile number</td>
				<td><input type="number" readonly="ture" class="lit-signup-input" value="<?=$data['Customisation_Data']['Mobile_Number']?>"></td>
			</tr>
			<tr>
				<td>Date of birth</td>
				<td><input class="lit-signup-input" type="date" name="DOB" value="<?=$data['Customisation_Data']['DOB']?>"></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><select class="lit-signup-input" name="Country" id="">
							<option value="none">-- Select country --</option>
						<?php

						foreach ( $data['Data'] as $key => $value) {
							if ($data['Customisation_Data']['Country_Id'] == $value->Id) {
								echo '<option value="'.$value->Id.'" selected>'.$value->country_name.'</option>';
							}else{
								echo '<option value="'.$value->Id.'">'.$value->country_name.'</option>';
							}
						}
						?>
							
						</select></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><select class="lit-signup-input" name="Gender" id="">
							<option value="none">-- Select gender --</option>
							<?php if ($data['Customisation_Data']['Gender'] == 'M') {
								?> <option value="M" selected>Male</option>
								<option value="F">Female</option>
								<option value="O">Other</option> <?php
							}elseif ($data['Customisation_Data']['Gender'] == 'M') {
								?> <option value="F">Male</option>
								<option value="F" selected>Female</option>
								<option value="O">Other</option> <?php
							}else{
								?> <option value="M">Male</option>
								<option value="F">Female</option>
								<option value="O" selected>Other</option> <?php
							}
							?>
						</select></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea class="lit-signup-input" name="Description" rows="5"><?=$data['Customisation_Data']['Description']?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="lit-edit-btn-submit lit-signin-input lit-signin-input-btn " type="submit" name="Submit" value="Save" name=""></td>
			</tr>
		</table>
	</div>
</div>
		</div>
	</div>
</div>
</div>
</form>
<script type="text/javascript" src="/script/customisation.js"></script>