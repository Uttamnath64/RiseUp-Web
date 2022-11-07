<div class="lit-home-main">
	<div class="lit-home-postlist slit-home-postlist">
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Channel analytics</p>
			</div>
			<div class="slit-dash-Current">
				<p class="slit-dash-channel-data-title">Current Joiner</p>
				<h3><?=$data['Home_Data']['channel_Joiner']?></h3>
			</div>
			<div class="slit-dash-channel-data">
				<p class="slit-dash-channel-data-title">Summary</p>
				<p class="slit-dash-text">Last 28 days</p>
				<div class="lit-channel-profile-more">
				<div><label>Joiner</label><?=$data['Home_Data']['channel_28_Joiner']?></div>
				<div><label>Views</label><?=$data['Home_Data']['channel_28_views']?></div>
				<div><label>Articles</label><?=$data['Home_Data']['channel_28_articles']?></div>
				<div><label>Popularity</label><?=$data['Home_Data']['channel_28_popularity']?></div>
				<div><label>Achievement</label><?=$data['Home_Data']['channel_28_Achievement']?></div>
			</div>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Analytics">Go to Channel Analytics</a>
			</div>
		</div>
		<div class="slit-dash-channel">
			<div class="slit-dash-title">
				<p>Latest article performance</p>
			</div>
			<div style="display: flex;">
			<div class="lit-lithome-contant-title slit-articl-title" style="display: flex;">
			<div class="lit-notifi-img" style="width:35%; margin: 0.5rem 0;">
				<img src="<?=RISEUP?>/images/<?=$data['Home_Data']['Post_Image']?>">
			</div>
				<p style="width: 90%; height: 4rem; margin-left: 1rem;"><?=$data['Home_Data']['Post_Title']?></p>
			</div>
			</div>
			<div class="slit-dash-channel-data">
				<p class="slit-dash-channel-data-title">Summary</p>
				<p class="slit-dash-text">Last 28 days</p>
				<div class="lit-channel-profile-more">
				<div><label>Views</label><?=$data['Home_Data']['Post_Views']?></div>
				<div><label>Likes</label><?=$data['Home_Data']['Post_Like']?></div>
				<div><label>Comments</label><?=$data['Home_Data']['Post_Comments']?></div>
			</div>
			</div>
			<div class="slit-dash-more-btn">
				<a href="/feed/Article/<?=$data['Home_Data']['Post_Url']?>/analytics">Go to Article Analytics</a>
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