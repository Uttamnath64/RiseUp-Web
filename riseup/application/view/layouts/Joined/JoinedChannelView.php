
<style type="text/css">
	.id<?=$data['Joined_Data']['Joined_Id']?>{
		    color: var(--lit-title-tcolor);
		    fill: var(--lit-title-tcolor);
		    border-left: 4px solid var(--lit-title-tcolor);
		    background-color: var(--lit-bgt-color);
	}
	.id<?=$data['Joined_Data']['Joined_Id']?> p{
			color: var(--lit-title-tcolor);
			font-weight: 650;
	}
</style>
<div class="lit-alv-main">
	<div class="lit-channel-home-channel-div">
        <div class="lit-channel-home-c-left">
            <div class="lit-channel-home-c-img">
                <img src="/images/<?=$data['Joined_Data']['Joined_Channel_Logo']?> ">
            </div>
        </div>
        <div class="lit-channel-home-c-right">
            <div class="lit-channel-home-c-r-l">
                <div class="lit-channel-home-c-r-name-title">
                    <p><?=$data['Joined_Data']['Joined_Channel_Name']?></p>
                </div>
                <div class="lit-channel-home-c-r-joiner">
                    <p><?=$data['Joined_Data']['Joined_Channel_Joiner']?> Joiner</p>
                </div>
            </div>
            <div class="lit-channel-home-c-r-r">
                <div class="lit-channel-home-c-r-r-join-div">
                    <a href="/feed/channel/<?=$data['Joined_Data']['Joined_Id']?>">
                        <div class="lit-channel-home-c-r-r-join">
                            <p>View</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
	
	<div class="lit-alv-data">
		<div class="lit-alv-discripsion-title">
			<p>Article</p>
		</div>
		<div class="lit-alv-data-item">
			<?=$data['Joined_Data']['Joined_Channel_Articles']?>
		</div>
	</div>
</div>