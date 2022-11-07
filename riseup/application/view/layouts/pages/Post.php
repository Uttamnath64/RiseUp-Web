<div id="Main-Popup" class="lit-popup-main ">
						<div class="lit-popup-main-div" >
							<div class="lit-popup-main-header">
								<span>Share Article</span>
								<i id="Close-Popup" style="cursor:pointer;">		
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></i>
							</div>
							<div class="lit-popup-main-mid">
								<span>Share on social media</span>
								<div class="lit-popup-main-mid-icon-div">
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?=URLROOT?>/feed/article/<?=$data['postdata']['Post_Url'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
							        <a href="http://www.twitter.com/share?url=<?=URLROOT?>/feed/article/<?=$data['postdata']['Post_Url'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
							        <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
							        <a href="https://api.whatsapp.com/send?text=<?=URLROOT?>/feed/article/<?=$data['postdata']['Post_Url'] ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
							        <a href="https://telegram.me/share/url?url=<?=URLROOT?>/feed/article/<?=$data['postdata']['Post_Url'] ?>" target="_blank"><i class="fab fa-telegram-plane"></i></a>
								</div>
							</div>
							<div class="lit-popup-main-bottom">
								<p>Or copy link</p>
								<div class="field">
							        <i class="url-icon uil uil-link"></i>
							        <input type="text" id="like-input" readonly="" value="<?=URLROOT?>/feed/article/<?=$data['postdata']['Post_Url'] ?>">
							        <button id="copy-btn">Copy</button>
							    </div>
							</div>
						</div>
					</div>

									<div id="Main-Popup-Report" class="lit-popup-main">
						<div class="lit-popup-main-div" >
							<div class="lit-popup-main-header">
								<span>Report Article</span>
								<i id="Close-Popup-Report" style="cursor:pointer;">		
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></i>
							</div>
							<div class="lit-popup-main-mid">
								<span>Select any one</span>
								<div style="margin: 10px;">
									<input type="radio" name="article_report" value="R1">
									<label for="html">Sexual content</label><br>
									<input type="radio" name="article_report" value="R2">
									<label for="css">Violent or repulsive content</label><br>
									<input type="radio" name="article_report" value="R3">
									<label for="javascript">Hateful or abusive content</label><br>
									<input type="radio" name="article_report" value="R4">
									<label for="javascript">Harmful or dangerous acts</label><br>
									<input type="radio" name="article_report" value="R5">
									<label for="javascript">Spam or misleading</label><br>
								</div>
							</div>
							<input id="Report-btn" style="background: #ff9900; padding: 8px 20px 8px 20px; border: none; border-radius:4px; color: #fff;" type="submit" name="submit" value="Report">
					</div>
				</div>
<div class="lit-post-main">
	<div class="lit-post-main-left">
	<div class="lit-post-content">
		<div class="lit-post-content-header-div">
			<div class="lit-post-content-header-div-right">
				<div class="lit-post-content-header-title-div">
					<p><?=$data['postdata']['Post_Title'] ?></p>
				</div>
				<div class="lit-post-content-header-post-btn-div">
					<button id="Like-btn" class="lit-post-content-header-post-button <?=($data['postdata']['LikeAndDislike'] == 'LIKE')? 'active': '' ?>">
						<div class="lit-post-content-header-post-btn">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M9 21h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.58 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9V9zM1 9h4v12H1z"/></svg>
						<p id="p_like"><?=$data['postdata']['Post_Like'] ?> Like</p>
						</div>
					</a>
					<button id="Dislike-btn" class="lit-post-content-header-post-button <?=($data['postdata']['LikeAndDislike'] == 'DISLIKE')? 'active': '' ?>">
						<div class="lit-post-content-header-post-btn">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.59-6.59c.36-.36.58-.86.58-1.41V5c0-1.1-.9-2-2-2zm0 12l-4.34 4.34L12 14H3v-2l3-7h9v10zm4-12h4v12h-4z"/></svg>
						<p id="p_dislike"><?=$data['postdata']['Post_Dislike'] ?> Dislike</p>
						</div>
					</button>

					<button id="View-Popup" class="lit-post-content-header-post-button">
						<div class="lit-post-content-header-post-btn">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"/></svg>
						<p>Share</p>
						</div>
					</button>
					
					<button id="Bookmark-btn" class="lit-post-content-header-post-button <?=($data['postdata']['ArticleBookmark'] == 'BOOKMARK')? 'active': '' ?>">
						<div class="lit-post-content-header-post-btn">
							<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M17,11v6.97l-5-2.14l-5,2.14V5h6V3H7C5.9,3,5,3.9,5,5v16l7-3l7,3V11H17z M21,7h-2v2h-2V7h-2V5h2V3h2v2h2V7z"/></svg>
						<p>Bookmark</p>
						</div>
					</button>
					
				</div>
				<div class="lit-post-content-header-post-data">
					<p><?=$data['postdata']['Post_Views'] ?> Views • <?=$data['postdata']['Post_Date_Time'] ?></p>
				</div>
			</div>
			<div class="lit-post-content-header-div-left">
				<img src="<?=URLROOT?>/images/<?=$data['postdata']['Post_Image'] ?>">
			</div>
		</div>
	</div>
	<div class="lit-post-content-channel-div">
		<div style="display: flex;">
		<a href="<?=URLROOT?>/feed/channel/<?=$data['postdata']['Channel_Url'] ?>" class="lit-post-content-channel-btn">
			<div class="lit-post-content-channel-about-div">
				<div class="lit-post-content-channel-logo-div">
					<img src="<?=URLROOT?>/images/<?=$data['postdata']['Channel_Logo'] ?>">
				</div>
				<div class="lit-post-content-channel-data-div">
					<div class="lit-post-content-channel-data-top-div">
						<p class="lit-post-content-channel-data-name"><?=$data['postdata']['Channel_Name'] ?></p>
						<div class="lit-post-content-channel-data-title-div">
						</div>
					</div>
					<div class="lit-post-content-channel-data-bottom-div">
						<div class="lit-post-content-channel-data-bottom-joiner-div">
							<p id="P-Joiner" class="lit-post-content-channel-data-bottom-joiner"><?=$data['postdata']['Channel_Joiner'] ?> Joiner</p>
						</div>
					</div>
				</div>
							</div>
		</a>
				<div class="lit-post-content-channel-join-btn">
						<button id="Channle-Join-Left" class="<?=($data['postdata']['ChannelJoined'] == 'JOIN')? 'active': '' ?>"></button>
				</div>
				<div style="cursor:pointer;" class="lit-post-content-channel-open-data-div">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M24 24H0V0h24v24z" fill="none" opacity=".87"/><path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/></svg>
				</div>
			</div>
		<div class="lit-post-content-channelv-main">
			<div class="lit-post-content-channelv-contant">
				<div class="lit-post-content-channelv-row1">
					<div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M13,8c0-2.21-1.79-4-4-4S5,5.79,5,8s1.79,4,4,4S13,10.21,13,8z M15,10v2h3v3h2v-3h3v-2h-3V7h-2v3H15z M1,18v2h16v-2 c0-2.66-5.33-4-8-4S1,15.34,1,18z"/></g></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Channel_C_Date'] ?></p>
					</div>
					<div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Channel_Posts'] ?> Article</p>
					</div><div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M11.99 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm3.61 6.34c1.07 0 1.93.86 1.93 1.93 0 1.07-.86 1.93-1.93 1.93-1.07 0-1.93-.86-1.93-1.93-.01-1.07.86-1.93 1.93-1.93zm-6-1.58c1.3 0 2.36 1.06 2.36 2.36 0 1.3-1.06 2.36-2.36 2.36s-2.36-1.06-2.36-2.36c0-1.31 1.05-2.36 2.36-2.36zm0 9.13v3.75c-2.4-.75-4.3-2.6-5.14-4.96 1.05-1.12 3.67-1.69 5.14-1.69.53 0 1.2.08 1.9.22-1.64.87-1.9 2.02-1.9 2.68zM11.99 20c-.27 0-.53-.01-.79-.04v-4.07c0-1.42 2.94-2.13 4.4-2.13 1.07 0 2.92.39 3.84 1.15-1.17 2.97-4.06 5.09-7.45 5.09z"/></svg>
						</div>
						<p id="P2-Joiner" class="lit-post-content-clannelv-data"><?=$data['postdata']['Channel_Joiner'] ?> Joiner</p>
					</div><div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M14.4 6L14 4H5v17h2v-7h5.6l.4 2h7V6z"/></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Channel_Country_Name'] ?></p>
					</div>
				</div>
				<div class="lit-post-content-channelv-row1">
					<div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Channel_Views'] ?> Views</p>
					</div>
					<div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Channel_Popularity'] ?> Popularity</p>
					</div><div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">
							<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M17,10.43V2H7v8.43c0,0.35,0.18,0.68,0.49,0.86l4.18,2.51l-0.99,2.34l-3.41,0.29l2.59,2.24L9.07,22L12,20.23L14.93,22 l-0.78-3.33l2.59-2.24l-3.41-0.29l-0.99-2.34l4.18-2.51C16.82,11.11,17,10.79,17,10.43z M13,12.23l-1,0.6l-1-0.6V3h2V12.23z"/></g></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Achievement_Rank'] ?> Rank</p>
					</div><div class="lit-post-content-channelv-row1-data">
						<div class="lit-post-content-clannelv-icon">					
							<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M19,5h-2V3H7v2H5C3.9,5,3,5.9,3,7v1c0,2.55,1.92,4.63,4.39,4.94c0.63,1.5,1.98,2.63,3.61,2.96V19H7v2h10v-2h-4v-3.1 c1.63-0.33,2.98-1.46,3.61-2.96C19.08,12.63,21,10.55,21,8V7C21,5.9,20.1,5,19,5z M5,8V7h2v3.82C5.84,10.4,5,9.3,5,8z M12,14 c-1.65,0-3-1.35-3-3V5h6v6C15,12.65,13.65,14,12,14z M19,8c0,1.3-0.84,2.4-2,2.82V7h2V8z"/></svg>
						</div>
						<p class="lit-post-content-clannelv-data"><?=$data['postdata']['Achievement_Point'] ?> Achievement</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="lit-post-content-more-box">
		<div class="lit-post-content-more-tags-title-div">
				<p>Article</p>
			</div>
		<div style="white-space: pre-wrap;"><?=$data['postdata']['Post_Article'] ?></div>
	</div>
	<div class="lit-post-content-maindata">
		<div class="lit-post-content-more-box">
			<div class="lit-post-content-more-tags-title-div">
				<p>Keyword</p>
			</div>
			<div class="lit-post-content-more-tags-div">
				<?php
					foreach ($data['postdata']['Post_Tags'] as $key => $value) {
						echo '<a href="'.URLROOT.'/feed/search/'.$value->Tag.'">'.$value->Tag.'</a>' ;
					}
				?>
				
			</div>
		</div>
	</div>
</div>
	<div class="lit-post-main-right">
			<div class="lit-post-content-function">
		<div class="lit-post-content-function-box">
			<div class="lit-post-content-function-title-div">
				<p>More</p>
			</div>
			<div class="lit-post-content-function-div">
				<a>Category: <?=$data['postdata']['Post_Category_Name'] ?></a>

				<?php if($data['postdata']['Post_Paid_Promotion'] != ""){ ?>

				<a href="<?=$data['postdata']['Post_Paid_Promotion'] ?>&share=riseup.lit">Paid Promotion (Ads)</a>
				<?php 
					}
				?>
				<a id="View-Popup-Report" style="cursor:pointer;">Report Article</a>
				
			</div>
		</div>
	</div>

		<?php if($data['postdata']['Post_Comments'] == 1){ ?>

		<div class="lit-post-content-comments-box">
			<div class="lit-post-content-comments-title-div">
				<p>Comments</p>
			</div>
			<div class="lit-post-content-comments-div ">
				<div class="lit-commment-input">
					<input id="Comments-txt" type="text" placeholder="Add a comment...">
					<button id="Comments-btn">Send</button>
				</div>
				<div id="Comments-div" class="lit-comment-list">
					<?=$data['Comments_List']?>
				</div>
			</div>
		</div>
		<?php 
			}
		?>
	</div>
</div>

<script type="text/javascript">
	var Post_Url = "<?=$data['postdata']['Post_Url'] ?>";
	var Channel_Url = "<?=$data['postdata']['Channel_Url'] ?>";
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
<script type="text/javascript" src="/script/Post.js"></script>