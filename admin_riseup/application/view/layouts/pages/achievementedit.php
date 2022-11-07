<form action="/Achievements/editAchievement" method="POST">
<div class="slit-dash-channel" style="margin: 10rem auto;">
			<div class="slit-dash-title">
				<p>Edit Achievement</p>
			</div>
			<div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Id</p>
					<input class="lit-signin-input" readonly="ture" type="text" name="Id" value="<?=$data['Achievement']['Id']?>" >
				</div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Name</p>
					<input class="lit-signin-input" type="text" name="Name" value="<?=$data['Achievement']['Name']?>" >
				</div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Points</p>
					<input class="lit-signin-input" type="text" name="Points" value="<?=$data['Achievement']['Points']?>" >
				</div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Description</p>
					<textarea class="lit-signin-input" name="Description"><?=$data['Achievement']['Description']?></textarea>
				</div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Icon</p>
					<textarea class="lit-signin-input" name="Icon"><?=$data['Achievement']['Icon']?></textarea>
				</div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Logical</p>
					<textarea class="lit-signin-input" name="Logical"><?=$data['Achievement']['Logical']?></textarea>
				</div>
			</div>
			<div class="slit-dash-more-btn">
				<input type="submit" name="submit" value=" Save Now"> 
			</div>
		</div>
		</form>