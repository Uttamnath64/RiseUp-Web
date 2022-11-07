<form class="lit-edit-from" action="#" method="POST" enctype="multipart/form-data" autocomplete="off"><div style="width: 100%;  height: 92vh; overflow-x: hidden; overflow-y: auto; ">
<div class="lit-library-contenar" style=" height: auto; margin: auto; margin-bottom: 5rem;">
	<div class="lit-history-main">
		<div class="lit-history-title">
			<p>View profile</p>
		</div>
		<div class="slit-al-data slit-channel-edit-main-div">
			<div>
	<div>
		<div class="lit-post-create-error-text"></div>
		<table>
			<tr><th class="slit-channel-c-size"></th><th></th></tr>
			<tr> 
				<td>Profile photo</td>
				<td class="slit-edit-channel-profile-img-div"><img class="slit-edit-channel-profile-img" src="<?=RISEUP?>/images/<?=$data['Channel']['Channel_Channel_Logo']?>"></td>
</tr>
			<tr>
				<td>First name</td>
				<td><input class="lit-signup-input" readonly="ture" type="text" name="F_Name" value="<?=$data['Channel']['Channel_F_Name']?>"></td>
			</tr>
			<tr>
				<td>Last name</td>
				<td><input class="lit-signup-input" readonly="ture" type="text" name="L_Name" value="<?=$data['Channel']['Channel_L_Name']?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="lit-signup-input" readonly="ture" type="email" name="Email" value="<?=$data['Channel']['Channel_Email']?>"></td>
			</tr>
			<tr>
				<td>Mobile number</td>
				<td><input type="number" readonly="ture" class="lit-signup-input" value="<?=$data['Channel']['Channel_Mobile_Number']?>"></td>
			</tr>
			<tr>
				<td>Date of birth</td>
				<td><input class="lit-signup-input" readonly="ture" type="date" name="DOB" value="<?=$data['Channel']['Channel_DOB']?>"></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><select class="lit-signup-input" name="Country" id="">
					<option><?=$data['Channel']['Channel_Country_Name']?></option>
				
							
						</select></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><select class="lit-signup-input" name="Gender" id="">
							<?php if ($data['Channel']['Channel_Gender'] == 'M') {
								?> <option value="M" selected>Male</option> <?php
							}elseif ($data['Channel']['Channel_Gender'] == 'M') {
								?>
								<option value="F" selected>Female</option> <?php
							}else{
								?>
								<option value="O" selected>Other</option> <?php
							}
							?>
						</select></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea class="lit-signup-input" readonly="ture" name="Description" rows="5"><?=$data['Channel']['Channel_Description']?></textarea></td>
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