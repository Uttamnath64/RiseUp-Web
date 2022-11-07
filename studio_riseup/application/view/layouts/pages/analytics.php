<div class="slit-analytics-main"><div class="slit-dash-channel" style="width: auto;margin-right: 2rem; width: 100%;">
			<div class="slit-dash-title">
				<p>Channel analytics</p>
			</div>
		<div class="slit-al-data" style="height: auto;">
			<table class="slit-article-list slit-analytics">
				<tr>
					<th class="slit-al-same">Estimated time</th>
					<th class="slit-al-same">Views</th>
					<th class="slit-al-same">Comments</th>
					<th class="slit-al-same">Joiner</th>
					<th class="slit-al-same">Articles</th>
					<th class="slit-al-same">Popularity</th>
					<th class="slit-al-same">Achievement</th>
					<th class="slit-al-same">Likes (vs Dis.)</th>
				</tr>
				<tr >
					<th style="margin: 0; padding: 0.4rem;">Last 48 hours</th>
					<td><?=$data['Analytics']['Views_48H']?></td>
					<td><?=$data['Analytics']['Comments_48H']?></td>
					<td><?=$data['Analytics']['Joiner_48H']?></td>
					<td><?=$data['Analytics']['Articles_48H']?></td>
					<td><?=$data['Analytics']['Popularity_48H']?></td>
					<td><?=$data['Analytics']['Achievement_48H']?></td>
					<td><?=$data['Analytics']['Likes_48H']?> Likes (vs <?=$data['Analytics']['Dislikes_48H']?>)</td>
				</tr>
				<tr>
					<th style="margin: 0; padding: 0.4rem;">Last 7 days</th>
					<td><?=$data['Analytics']['Views_7D']?></td>
					<td><?=$data['Analytics']['Comments_7D']?></td>
					<td><?=$data['Analytics']['Joiner_7D']?></td>
					<td><?=$data['Analytics']['Articles_7D']?></td>
					<td><?=$data['Analytics']['Popularity_7D']?></td>
					<td><?=$data['Analytics']['Achievement_7D']?></td>
					<td><?=$data['Analytics']['Likes_7D']?> Likes (vs <?=$data['Analytics']['Dislikes_7D']?>)</td>
				</tr>
				<tr>
					<th style="margin: 0; padding: 0.4rem;">Last 28 days</th>
					<td><?=$data['Analytics']['Views_28D']?></td>
					<td><?=$data['Analytics']['Comments_28D']?></td>
					<td><?=$data['Analytics']['Joiner_28D']?></td>
					<td><?=$data['Analytics']['Articles_28D']?></td>
					<td><?=$data['Analytics']['Popularity_28D']?></td>
					<td><?=$data['Analytics']['Achievement_28D']?></td>
					<td><?=$data['Analytics']['Likes_28D']?> Likes (vs <?=$data['Analytics']['Dislikes_28D']?>)</td>
				</tr>
				<tr style="border-bottom: none;">
					<th style=" border-bottom: none; margin: 0; padding: 0.4rem;">Lifetime</th>
					<td style="border-bottom: none;"><?=$data['Analytics']['Views_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Comments_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Joiner_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Articles_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Popularity_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Achievement_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Likes_LF']?> Likes (vs <?=$data['Analytics']['Dislikes_LF']?>)</td>
				</tr>
			</table>

		</div>

</div>
<div class="slit-dash-channel">
	<div class="slit-dash-title">
		<p>Top articles</p>
	</div>
	<div>
		<?=$data['Analytics']['Top_Articles']?>
	</div>
</div>
<div class="slit-dash-channel">
	<div class="slit-dash-title">
		<p>Traffic source types</p>
	</div>
	<div>
		<div class="lit-channel-profile-more" style="margin: 1rem 1rem">
			<?=$data['Analytics']['Top_Traffic']?>
		</div>
	</div>
</div>
</div>