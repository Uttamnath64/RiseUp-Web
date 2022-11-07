<div class="lit-channel-home-main">
    <div class="lit-channel-home-channel-div">
        <div class="lit-channel-home-c-left">
            <div class="lit-channel-home-c-img">
                <img src="/images/<?=$data['ChannelData']['Channel_Logo']?>">
            </div>
        </div>
        <div class="lit-channel-home-c-right">
            <div class="lit-channel-home-c-r-l">
                <div class="lit-channel-home-c-r-name-title">
                    <p><?=$data['ChannelData']['Channel_Name']?></p>
                </div>
                <div class="lit-channel-home-c-r-joiner">
                    <p id="P-Joiner"><?=$data['ChannelData']['Channel_Joiner']?> Joiner</p>
                </div>
            </div>
            <div class="lit-channel-home-c-r-r">
                <div class="lit-channel-home-c-r-r-join-div">
                   <div class="lit-post-content-channel-join-btn">
                        <button id="Channle-Join-Left" class="<?=($data['ChannelData']['ChannelJoined'] == 'JOIN')? 'active': '' ?>"></button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lit-channel-home-about-div">
        <div class="lit-channel-home-about-title">
            <p>About</p>
        </div>
        <div class="lit-channel-home-about-data">
            <p><?=$data['ChannelData']['Channel_Description']?></p>
        </div>
        <div class="lit-channel-home-about-btn">
            <a href="<?=URLROOT?>/feed/channel/<?=$data['ChannelData']['Channel_Url']?>/about">View More</a>
        </div>
    </div>
    <div class="lit-channel-home-Achievement-div">
        <div class="lit-channel-home-Achievement-title">
            <p>Achievement</p>
        </div>
        <div class="lit-channel-home-Achievement-data">
        <?=$data['ChannelData']['Achievement']?> 
        </div>
        <div class="lit-channel-home-about-btn">
            <a href="<?=URLROOT?>/feed/channel/<?=$data['ChannelData']['Channel_Url']?>/achievement">View More</a>
        </div>
    </div>
    <div class="lit-channel-home-Article-div">
        <div class="lit-channel-home-Achievement-title">
            <p>Popular article</p>
        </div>
        <div class="lit-channel-home-Article-data">
            <?=$data['ChannelData']['Channel_HomeAllPost']?>
        </div>
    </div>
</div>