<div class="slit-analytics-main"><div class="slit-dash-channel" style="width: auto;margin-right: 2rem; width: 100%;">
			<div class="slit-dash-title">
				<p>Channel analytics</p>
			</div>
		<div class="slit-al-data" style="height: auto;">
			<table class="slit-article-list slit-analytics">
				<tr>
					<th class="slit-al-same">Estimated time</th>
					<th class="slit-al-same">Channels</th>
					<th class="slit-al-same">Articles</th>
					<th class="slit-al-same">Comments</th>
					<th class="slit-al-same">Views</th>
				</tr>
				<tr > 
					<th style="margin: 0; padding: 0.4rem;">Last 60 minutes</th>
					<td><?=$data['Analytics']['Channels_1H']?></td>
					<td><?=$data['Analytics']['Articles_1H']?></td>
					<td><?=$data['Analytics']['Comments_1H']?></td>
					<td><?=$data['Analytics']['Views_1H']?></td>
				</tr>
				<tr > 
					<th style="margin: 0; padding: 0.4rem;">Last 48 hours</th>
					<td><?=$data['Analytics']['Channels_48H']?></td>
					<td><?=$data['Analytics']['Articles_48H']?></td>
					<td><?=$data['Analytics']['Comments_48H']?></td>
					<td><?=$data['Analytics']['Views_48H']?></td>
				</tr>
				<tr>
					<th style="margin: 0; padding: 0.4rem;">Last 7 days</th>
					<td><?=$data['Analytics']['Channels_7D']?></td>
					<td><?=$data['Analytics']['Articles_7D']?></td>
					<td><?=$data['Analytics']['Comments_7D']?></td>
					<td><?=$data['Analytics']['Views_7D']?></td>
				</tr>
				<tr>
					<th style="margin: 0; padding: 0.4rem;">Last 28 days</th>
					<td><?=$data['Analytics']['Channels_28D']?></td>
					<td><?=$data['Analytics']['Articles_28D']?></td>
					<td><?=$data['Analytics']['Comments_28D']?></td>
					<td><?=$data['Analytics']['Views_28D']?></td>
				</tr>
				<tr style="border-bottom: none;">
					<th style=" border-bottom: none; margin: 0; padding: 0.4rem;">Lifetime</th>
					<td style="border-bottom: none;"><?=$data['Analytics']['Channels_LFT']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Articles_LFT']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Comments_LFT']?></td>
					<td style="border-bottom: none;"><?=$data['Analytics']['Views_LFT']?></td>
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