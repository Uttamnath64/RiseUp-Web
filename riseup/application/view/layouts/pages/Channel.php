<script type="text/javascript">
    var Channel_Url = "<?=$data['ChannelData']['Channel_Url']?>"; </script>
<script type="text/javascript" src="/script/Channel.js"></script>
 <div class="lit-channel-main">
    <div class="lit-channel-left">
        <div class="lit-channel-topbar">
            <?php
                include "../application/view/layouts/channels/ChannelTopBar.php";
            ?>
        </div>
        <div class="lit-channel-contant">
            <?php
                include "../application/view/layouts/channels/".$data['ChannelData']['File_Name'];
            ?>
        </div>
    </div>
    <div class="lit-channel-right">
        <?php
            include "../application/view/layouts/channels/ChannelProfile.php";
        ?>
    </div>
 </div>