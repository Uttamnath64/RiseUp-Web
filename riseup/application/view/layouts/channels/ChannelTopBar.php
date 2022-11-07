<div class="lit-channel-tb-main">

	<div class="lit-channel-tb-btn-div">
		<a <?php if($data['ChannelData']['File_Name'] == "ChannelHome.php"){ echo 'class="lit-channel-tb-btn lit-channel-tb-btb-click"'; }else{ echo 'class="lit-channel-tb-btn"'; } ?> href="<?=URLROOT?>/feed/channel/<?=$data['ChannelData']['Channel_Url']?>" >
			<p>Home</p>
		</a>
		<a <?php if($data['ChannelData']['File_Name'] == "ChannelArticle.php"){ echo 'class="lit-channel-tb-btn lit-channel-tb-btb-click"'; }else{ echo 'class="lit-channel-tb-btn"'; } ?> href="<?=URLROOT?>/feed/channel/<?=$data['ChannelData']['Channel_Url']?>/article" >
			<p>Article</p>
		</a>
		<a <?php if($data['ChannelData']['File_Name'] == "ChannelAchievement.php"){ echo 'class="lit-channel-tb-btn lit-channel-tb-btb-click"'; }else{ echo 'class="lit-channel-tb-btn"'; } ?> href="<?=URLROOT?>/feed/channel/<?=$data['ChannelData']['Channel_Url']?>/achievement" >
			<p>Achievement</p>
		</a>
		<a <?php if($data['ChannelData']['File_Name'] == "ChannelAbout.php"){ echo 'class="lit-channel-tb-btn lit-channel-tb-btb-click"'; }else{ echo 'class="lit-channel-tb-btn"'; } ?> href="<?=URLROOT?>/feed/channel/<?=$data['ChannelData']['Channel_Url']?>/about" >
			<p>About</p>
		</a>
	</div>
</div>