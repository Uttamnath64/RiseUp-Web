<div class="lit-home-main">
	<div class="lit-home-postlist slit-home-postlist">
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Views analytics</p>
			</div>
			<div class="slit-dash-Current">
				<p class="slit-dash-channel-data-title">Current Views</p>
				<h3><?=$data['Home_Data']['Current_Views']?></h3>
			</div>
			<div class="slit-dash-channel-data">
				<p class="slit-dash-channel-data-title">Summary</p>
				<p class="slit-dash-text">Last 60 minutes</p>
				<div class="lit-channel-profile-more">
				<div><label>Views</label><?=$data['Home_Data']['60M_Views']?></div>
				</div>
				<p class="slit-dash-text">Last 48 hours</p>
				<div class="lit-channel-profile-more">
				<div><label>Views</label><?=$data['Home_Data']['48H_Views']?></div>
				</div>
				<p class="slit-dash-text">Last 28 days</p>
				<div class="lit-channel-profile-more">
				<div><label>Views</label><?=$data['Home_Data']['28D_Views']?></div>
			</div>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Analytics">Go to Views Analytics</a>
			</div>
		</div>
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Articles analytics</p>
			</div>
			<div class="slit-dash-Current">
				<p class="slit-dash-channel-data-title">Current Articles</p>
				<h3><?=$data['Home_Data']['Current_Articles']?></h3>
			</div>
			<div class="slit-dash-channel-data">
				<p class="slit-dash-channel-data-title">Summary</p>
				<p class="slit-dash-text">Last 60 minutes</p>
				<div class="lit-channel-profile-more">
				<div><label>Articles created</label><?=$data['Home_Data']['60M_Articles']?></div>
				</div>
				<p class="slit-dash-text">Last 48 hours</p>
				<div class="lit-channel-profile-more">
				<div><label>Articles created</label><?=$data['Home_Data']['48H_Articles']?></div>
				</div>
				<p class="slit-dash-text">Last 28 days</p>
				<div class="lit-channel-profile-more">
				<div><label>Articles created</label><?=$data['Home_Data']['28D_Articles']?></div>
			</div>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Analytics">Go to Articles Analytics</a>
			</div>
		</div>
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Channels analytics</p>
			</div>
			<div class="slit-dash-Current">
				<p class="slit-dash-channel-data-title">Current Channels</p>
				<h3><?=$data['Home_Data']['Current_Channels']?></h3>
			</div>
			<div class="slit-dash-channel-data">
				<p class="slit-dash-channel-data-title">Summary</p>
				<p class="slit-dash-text">Last 60 minutes</p>
				<div class="lit-channel-profile-more">
				<div><label>Channels created</label><?=$data['Home_Data']['60M_Chanels']?></div>
				</div>
				<p class="slit-dash-text">Last 48 hours</p>
				<div class="lit-channel-profile-more">
				<div><label>Channels created</label><?=$data['Home_Data']['48H_Channels']?></div>
				</div>
				<p class="slit-dash-text">Last 28 days</p>
				<div class="lit-channel-profile-more">
				<div><label>Channels created</label><?=$data['Home_Data']['28D_Channels']?></div>
			</div>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Analytics">Go to Channels Analytics</a>
			</div>
		</div>
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Channels</p>
			</div>
			<div>
				<?=$data['Home_Data']['Channels_List']?>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Articles">Go to Channels</a>
			</div>
		</div>

		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Articles</p>
			</div>
			<div>
				<?=$data['Home_Data']['Post_List']?>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Articles">Go to Articles</a>
			</div>
		</div>
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Comments</p>
			</div>
			<div>
				<?=$data['Home_Data']['Comments']?>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Comments">Go to Comments</a>
			</div>
		</div>
	</div>
</div>