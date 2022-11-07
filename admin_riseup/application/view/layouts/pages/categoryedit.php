<form action="/Categorys/EditCategoryData" method="POST">
<div class="slit-dash-channel" style="margin: 10rem auto;">
			<div class="slit-dash-title">
				<p>Edit Category</p>
			</div>
			<div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Id</p>
					<input class="lit-signin-input" readonly="ture" type="text" name="Id" value="<?=$data['CategoryEdit']['Id']?>">
				</div>
				<div class="lit-signin-input-div">
					<p class="lit-signin-input-text">Name</p>
					<input class="lit-signin-input" type="text" name="Name" value="<?=$data['CategoryEdit']['Name']?>">
				</div>
			</div>
			<div class="slit-dash-more-btn">
				<input type="submit" name="submit" value=" Save Now"> 
			</div>
		</div>
		</form>