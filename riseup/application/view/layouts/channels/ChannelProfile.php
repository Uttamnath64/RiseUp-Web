<div class="lit-channel-profile-main">
	<div class="lit-channel-profile-contant">
		<div class="lit-channel-profile-contant-data">
			<div class="lit-channel-profile-channel-logo">
				<img src="/images/<?=$data['ChannelData']['Channel_Logo']?>">
			</div>
			<div class="lit-channel-profile-channel-name">
				<label><?=$data['ChannelData']['Channel_Name']?></label>
			</div>
			<div class="lit-channel-profile-joiner-rank">
				<div class="lit-channel-profile-joiner-rank-div">
					<p id="P2-Joiner"><?=$data['ChannelData']['Channel_Joiner']?></p>
					<label>Joiner</label>
				</div>
				<div class="lit-channel-profile-joiner-rank-div">
					<p><?=$data['ChannelData']['Achievement_Rank']?></p>
					<label>Rank</label>
				</div>
			</div>
			<div class="lit-channel-profile-join-btn-div" >
				<div class="lit-post-content-channel-join-btn" style="width: 100%;">
						<button id="Channle-Join-Left2" class="<?=($data['ChannelData']['ChannelJoined'] == 'JOIN')? 'active': '' ?>" style="margin: auto; width: 90%"></button>
				</div>
			</div>
			<label class="lit-channel-profile-analytics-label">Analytics</label>
			<div class="lit-channel-profile-more">
				<div><label>Views</label><?=$data['ChannelData']['Channel_Views']?></div>
				<div><label>Articles</label><?=$data['ChannelData']['Channel_Posts']?></div>
				<div><label>Popularity</label><?=$data['ChannelData']['Channel_Popularity']?></div>
				<div><label>Achievement</label><?=$data['ChannelData']['Achievement_Point']?></div>
				<div><label>Joined</label><?=$data['ChannelData']['Channel_C_Date']?></div>
				<div><label>Country</label><?=$data['ChannelData']['Channel_Country_Name']?></div>
			</div>
		</div>
	</div>
</div>