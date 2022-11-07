<?php
class Analytics
{
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}

	// channel views
	public function getChannelViews($data)
	{
			$this->db->query('SELECT Id FROM views WHERE Channel_Url = :Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel comments
	public function getChannelComments($data)
	{
			$this->db->query('SELECT Id FROM comments WHERE Channel_Url = :Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel joiner
	public function getChannelJoiner($data)
	{
			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel Articles
	public function getChannelArticles($data)
	{
			$this->db->query('SELECT Url FROM post WHERE Channel_Url = :Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel Achievement
	public function getChannelAchievement($data)
	{
			$this->db->query('SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel Likes
	public function getChannelLikes($data)
	{
			$this->db->query('SELECT Id FROM like_dislike WHERE Channel_Url = :Url AND Like_Dislike = 1 '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel Dislikes
	public function getChannelDislikes($data)
	{
			$this->db->query('SELECT Id FROM like_dislike WHERE Channel_Url = :Url AND Like_Dislike = 0 '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}
	public function getAllAnalytics()
	{
		$Analytics_Data = [

			// 48H
			'Views_48H' => $this->Controller->number_format_short($this->getChannelViews(' AND C_Date > now() - INTERVAL 48 hour')),
			'Comments_48H' => $this->Controller->number_format_short($this->getChannelComments(' AND C_Date > now() - INTERVAL 48 hour')),
			'Joiner_48H' => $this->Controller->number_format_short($this->getChannelJoiner(' AND C_Date > now() - INTERVAL 48 hour')),
			'Articles_48H' => $this->Controller->number_format_short($this->getChannelArticles(' AND Date_Time > now() - INTERVAL 48 hour')),
			'Popularity_48H' => $this->Controller->number_format_short(($this->getChannelLikes(' AND C_Date > now() - INTERVAL 48 hour') - $this->getChannelDislikes(' AND C_Date > now() - INTERVAL 48 hour')) * 10),
			'Achievement_48H' => $this->Controller->number_format_short($this->getChannelAchievement(' AND C_Date > now() - INTERVAL 48 hour')),
			'Likes_48H' => $this->Controller->number_format_short($this->getChannelLikes(' AND C_Date > now() - INTERVAL 48 hour')),
			'Dislikes_48H' => $this->Controller->number_format_short($this->getChannelDislikes(' AND C_Date > now() - INTERVAL 48 hour')),

			// 7D
			'Views_7D' => $this->Controller->number_format_short($this->getChannelViews(' AND C_Date > now() - INTERVAL 7 day')),
			'Comments_7D' => $this->Controller->number_format_short($this->getChannelComments(' AND C_Date > now() - INTERVAL 7 day')),
			'Joiner_7D' => $this->Controller->number_format_short($this->getChannelJoiner(' AND C_Date > now() - INTERVAL 7 day')),
			'Articles_7D' => $this->Controller->number_format_short($this->getChannelArticles(' AND Date_Time > now() - INTERVAL 7 day')),
			'Popularity_7D' => $this->Controller->number_format_short(($this->getChannelLikes(' AND C_Date > now() - INTERVAL 7 day') - $this->getChannelDislikes(' AND C_Date > now() - INTERVAL 7 day')) * 10),
			'Achievement_7D' => $this->Controller->number_format_short(intval($this->getChannelAchievement(' AND C_Date > now() - INTERVAL 7 day'))),
			'Likes_7D' => $this->Controller->number_format_short($this->getChannelLikes(' AND C_Date > now() - INTERVAL 7 day')),
			'Dislikes_7D' => $this->Controller->number_format_short($this->getChannelDislikes(' AND C_Date > now() - INTERVAL 7 day')),

			// 28D
			'Views_28D' => $this->Controller->number_format_short($this->getChannelViews(' AND C_Date > now() - INTERVAL 28 day')),
			'Comments_28D' => $this->Controller->number_format_short($this->getChannelComments(' AND C_Date > now() - INTERVAL 28 day')),
			'Joiner_28D' => $this->Controller->number_format_short($this->getChannelJoiner(' AND C_Date > now() - INTERVAL 28 day')),
			'Articles_28D' => $this->Controller->number_format_short($this->getChannelArticles(' AND Date_Time > now() - INTERVAL 28 day')),
			'Popularity_28D' => $this->Controller->number_format_short(($this->getChannelLikes(' AND C_Date > now() - INTERVAL 28 day') - $this->getChannelDislikes(' AND C_Date > now() - INTERVAL 28 day'))* 10),
			'Achievement_28D' => $this->Controller->number_format_short($this->getChannelAchievement(' AND C_Date > now() - INTERVAL 28 day')),
			'Likes_28D' => $this->Controller->number_format_short($this->getChannelLikes(' AND C_Date > now() - INTERVAL 28 day')),
			'Dislikes_28D' => $this->Controller->number_format_short($this->getChannelDislikes(' AND C_Date > now() - INTERVAL 28 day')),

			// LF
			'Views_LF' => $this->Controller->number_format_short($this->getChannelViews('')),
			'Comments_LF' => $this->Controller->number_format_short($this->getChannelComments('')),
			'Joiner_LF' => $this->Controller->number_format_short($this->getChannelJoiner('')),
			'Articles_LF' => $this->Controller->number_format_short($this->getChannelArticles('')),
			'Popularity_LF' => $this->Controller->number_format_short(($this->getChannelLikes('') - $this->getChannelDislikes('')) * 10),
			'Achievement_LF' => $this->Controller->number_format_short($this->getChannelAchievement('')),
			'Likes_LF' => $this->Controller->number_format_short($this->getChannelLikes('')),
			'Dislikes_LF' => $this->Controller->number_format_short($this->getChannelDislikes('')),
			'Top_Articles' => $this->getTopArticles(),
			'Top_Traffic' => $this->getTraffic()
		];

		return $Analytics_Data;
	}
	public function getTopArticles()
	{
		$this->db->query('SELECT post.Title,post.Url,post.Image, COUNT(views.Id) AS Views From views RIGHT JOIN post ON post.Url = views.Post_Url WHERE views.Channel_Url = :Url GROUP by Post_Url ORDER BY Views DESC LIMIT 4');
		$this->db->bind(':Url', $_SESSION['User_Id']);
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
		$this->db->query('SELECT Source_Type, COUNT(views.Id) AS Views From views WHERE Channel_Url = :Url GROUP by Source_Type ORDER BY Views DESC LIMIT 6');
		$this->db->bind(':Url', $_SESSION['User_Id']);
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