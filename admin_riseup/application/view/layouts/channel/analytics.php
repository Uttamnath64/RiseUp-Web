<div class="slit-analytics-main" style="display: block;"><div class="slit-dash-channel" style="width: auto;margin-right: 2rem; width: 100%;">
			<div class="slit-dash-title">
				<p>Channel analytics</p>
			</div>
		<div class="slit-al-data" style="height: auto;">
			<table class="slit-article-list slit-analytics">
				<tr>
					<th class="slit-al-same">Estimated time</th>
					<th class="slit-al-same">Views</th>
					<th class="slit-al-same">Comments</th>
					<th class="slit-al-same">Likes (vs Dis.)</th>
				</tr>
				<tr >
					<th style="margin: 0; padding: 0.4rem;">Last 48 hours</th>
					<td><?=$data['Channel']['Views_48H']?></td>
					<td><?=$data['Channel']['Comments_48H']?></td>
					<td><?=$data['Channel']['Likes_48H']?> Likes (vs <?=$data['Channel']['Dislikes_48H']?>)</td>
				</tr>
				<tr>
					<th style="margin: 0; padding: 0.4rem;">Last 7 days</th>
					<td><?=$data['Channel']['Views_7D']?></td>
					<td><?=$data['Channel']['Comments_7D']?></td>
					<td><?=$data['Channel']['Likes_7D']?> Likes (vs <?=$data['Channel']['Dislikes_7D']?>)</td>
				</tr>
				<tr>
					<th style="margin: 0; padding: 0.4rem;">Last 28 days</th>
					<td><?=$data['Channel']['Views_28D']?></td>
					<td><?=$data['Channel']['Comments_28D']?></td>
					<td><?=$data['Channel']['Likes_28D']?> Likes (vs <?=$data['Channel']['Dislikes_28D']?>)</td>
				</tr>
				<tr style="border-bottom: none;">
					<th style=" border-bottom: none; margin: 0; padding: 0.4rem;">Lifetime</th>
					<td style="border-bottom: none;"><?=$data['Channel']['Views_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Channel']['Comments_LF']?></td>
					<td style="border-bottom: none;"><?=$data['Channel']['Likes_LF']?> Likes (vs <?=$data['Channel']['Dislikes_LF']?>)</td>
				</tr>
			</table>

		</div>

</div>
<div class="slit-dash-channel" >
	<div class="slit-dash-title">
		<p>Traffic source types</p>
	</div>
	<div>
		<div class="lit-channel-profile-more" style="margin: 1rem 1rem">
			<?=$data['Channel']['Top_Traffic']?>
		</div>
	</div>
</div>
</div>