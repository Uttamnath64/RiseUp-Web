<?php
class Analytics
{
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}

	// number of views
	public function getNumOfViews($data)
	{
			$this->db->query('SELECT Id FROM views '.$data);
			return count($this->db->resultSet());
	}

	// number of comments
	public function getNumOfComments($data)
	{
			$this->db->query('SELECT Id FROM comments '.$data);
			return count($this->db->resultSet());
	}

	// number of channels
	public function getNumOfChannels($data)
	{
			$this->db->query('SELECT Url FROM user_account '.$data);
			return count($this->db->resultSet());
	}

	// number of articles
	public function getNumOfArticles($data)
	{
			$this->db->query('SELECT Url FROM post '.$data);
			return count($this->db->resultSet());
	}

	public function getAllAnalytics()
	{
		$Analytics_Data = [

			// 48H
			'Channels_1H' => $this->Controller->number_format_short($this->getNumOfChannels(' WHERE C_Date > now() - INTERVAL 1 hour')),
			'Articles_1H' => $this->Controller->number_format_short($this->getNumOfArticles(' WHERE Date_Time > now() - INTERVAL 1 hour')),
			'Comments_1H' => $this->Controller->number_format_short($this->getNumOfComments(' WHERE C_Date > now() - INTERVAL 1 hour')),
			'Views_1H' => $this->Controller->number_format_short($this->getNumOfViews(' WHERE C_Date > now() - INTERVAL 1 hour')),

			// 48H
			'Channels_48H' => $this->Controller->number_format_short($this->getNumOfChannels(' WHERE C_Date > now() - INTERVAL 48 hour')),
			'Articles_48H' => $this->Controller->number_format_short($this->getNumOfArticles(' WHERE Date_Time > now() - INTERVAL 48 hour')),
			'Comments_48H' => $this->Controller->number_format_short($this->getNumOfComments(' WHERE C_Date > now() - INTERVAL 48 hour')),
			'Views_48H' => $this->Controller->number_format_short($this->getNumOfViews(' WHERE C_Date > now() - INTERVAL 48 hour')),

			// 7D
			'Channels_7D' => $this->Controller->number_format_short($this->getNumOfChannels(' WHERE C_Date > now() - INTERVAL 7 day')),
			'Articles_7D' => $this->Controller->number_format_short($this->getNumOfArticles(' WHERE Date_Time > now() - INTERVAL 7 day')),
			'Comments_7D' => $this->Controller->number_format_short($this->getNumOfComments(' WHERE C_Date > now() - INTERVAL 7 day')),
			'Views_7D' => $this->Controller->number_format_short($this->getNumOfViews(' WHERE C_Date > now() - INTERVAL 7 day')),

			// 28D
			'Channels_28D' => $this->Controller->number_format_short($this->getNumOfChannels(' WHERE C_Date > now() - INTERVAL 28 day')),
			'Articles_28D' => $this->Controller->number_format_short($this->getNumOfArticles(' WHERE Date_Time > now() - INTERVAL 28 day')),
			'Comments_28D' => $this->Controller->number_format_short($this->getNumOfComments(' WHERE C_Date > now() - INTERVAL 28 day')),
			'Views_28D' => $this->Controller->number_format_short($this->getNumOfViews(' WHERE C_Date > now() - INTERVAL 28 day')),

			// LFT
			'Channels_LFT' => $this->Controller->number_format_short($this->getNumOfChannels('')),
			'Articles_LFT' => $this->Controller->number_format_short($this->getNumOfArticles('')),
			'Comments_LFT' => $this->Controller->number_format_short($this->getNumOfComments('')),
			'Views_LFT' => $this->Controller->number_format_short($this->getNumOfViews('')),

			'Top_Articles' => $this->getTopArticles(),
			'Top_Traffic' => $this->getTraffic()
		];

		return $Analytics_Data;
	}
	public function getTopArticles()
	{
		$this->db->query('SELECT post.Title,post.Url,post.Image, COUNT(views.Id) AS Views From views RIGHT JOIN post ON post.Url = views.Post_Url GROUP by Post_Url ORDER BY Views DESC LIMIT 4');
		$top_articles = $this->db->resultSet();

		$TopArticles = '';
		foreach ($top_articles as $key => $value) {
			$TopArticles .= '<a href="/feed/Article/Analytics/'.$value->Url.'"><div class="lit-lithome-contant-title slit-articl-title" style="display: flex;">
			<div class="lit-notifi-img" style="width:35%; height: 4rem; margin: 0.5rem 0;">
				<img src="'.RISEUP.'/images/'.$value->Image.'">
			</div>
				<p style="width: 90%; margin-left: 1rem;">'.$value->Title.'</p>
			</div></a>';
		}
		return $TopArticles;
	}

	public function getTraffic()
	{
		$this->db->query('SELECT Source_Type, COUNT(views.Id) AS Views From views GROUP by Source_Type ORDER BY Views DESC LIMIT 6');
		$top_articles = $this->db->resultSet();

		$TopArticles = '';
		foreach ($top_articles as $key => $value) {
			$TopArticles .= '<div><label>'.$value->Source_Type.'</label>'.$value->Views.'</div>
';
		}
		return $TopArticles;
	}
}
?>