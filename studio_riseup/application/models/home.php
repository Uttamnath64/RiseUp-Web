<?php
class home
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getChannelAnalytics()
	{
		//get number of joiner

		$this->db->query("SELECT count(Id) AS Joiner FROM joiner WHERE Channel_Url = :Url");
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$NumberOfJoiner = $this->db->single();

		//get number of joiner

		$this->db->query("SELECT count(Id) AS Joiner FROM joiner WHERE Channel_Url = :Url AND C_Date > now() - INTERVAL 28 day");
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$Joiner_28D = $this->db->single();

		//get 28 days views

		$this->db->query("SELECT count(Id) AS Views FROM views WHERE Channel_Url = :Url AND C_Date > now() - INTERVAL 28 day");
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$Views_28D = $this->db->single();

		//get number of articles

		$this->db->query("SELECT count(Url) AS Articles FROM post WHERE Channel_Url = :Url AND Date_Time > now() - INTERVAL 28 day");
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$Articles_28D = $this->db->single();

		// get number of popularity
			
			// channel all like
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Channel_Url = :Channel_Url AND C_Date > now() - INTERVAL 28 day');
			$this->db->bind(':Channel_Url', $_SESSION['User_Id']);
			$ChannelNumberOfLike = count($this->db->resultSet());

			// channel all dislike
			
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Channel_Url = :Channel_Url AND C_Date > now() - INTERVAL 28 day');
			$this->db->bind(':Channel_Url', $_SESSION['User_Id']);
			$ChannelNumberOfDislike = count($this->db->resultSet());

		// get Achievement points

		$this->db->query('SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url AND C_Date > now() - INTERVAL 28 day');
		$this->db->bind(':Channel_Url', $_SESSION['User_Id']);
		$NOA_point = $this->db->single();

		$Dashboard = [
			'channel_Joiner' => $NumberOfJoiner->Joiner,
			'channel_28_Joiner' => $Joiner_28D->Joiner,
			'channel_28_views' => $Views_28D->Views,
			'channel_28_articles' => $Articles_28D->Articles,
			'channel_28_popularity' => ($ChannelNumberOfLike - $ChannelNumberOfDislike) * 10,
			'channel_28_Achievement' => $NOA_point->Points_sum
		];
		$Dashboard = array_merge($Dashboard,$this->getLastArticleData());
		return $Dashboard;
	}
	public function getLastArticleData()
	{
		// get post data

		$this->db->query("SELECT Url,Title,Image FROM post WHERE Channel_Url = :Url ORDER BY `post`.`Date_Time` DESC");
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$GetPostData = $this->db->single();

		//get post 28 days views
		if($GetPostData != ''){

		$this->db->query("SELECT count(Id) AS Views FROM views WHERE Post_Url = :Url AND C_Date > now() - INTERVAL 28 day");
		$this->db->bind(':Url', $GetPostData->Url);
		$Views_28D = $this->db->single();

		// get post all like
		$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Post_Url = :Post_Url AND C_Date > now() - INTERVAL 28 day');
		$this->db->bind(':Post_Url', $GetPostData->Url);
		$PostLikeData = count($this->db->resultSet());

		// get post number of comments points

		$this->db->query('SELECT count(Id) as Comments FROM Comments WHERE Post_Url = :Post_Url');
		$this->db->bind(':Post_Url', $GetPostData->Url);
		$PostComment = $this->db->single();

		$Dashboard = [
			'Post_Title' => $GetPostData->Title,
			'Post_Image' => $GetPostData->Image,
			'Post_Views' => $Views_28D->Views,
			'Post_Like' => $PostLikeData,
			'Post_Comments' => $PostComment->Comments,
			'Post_Url' => $GetPostData->Url
		];
	}else{
		$Dashboard = [
			'Post_Title' => '',
			'Post_Image' => '',
			'Post_Views' => '',
			'Post_Like' => '',
			'Post_Comments' => '',
			'Post_Url' => ''
		];
	}
		$Dashboard = array_merge($Dashboard,$this->getArticleList());
		return $Dashboard;
	}
	public function getArticleList()
	{
		
		$this->db->query('SELECT Title, Image  FROM post WHERE Channel_Url = :Url ORDER BY `Date_Time` DESC LIMIT 6');
		$this->db->bind(':Url',$_SESSION['User_Id']);
		$home_data = $this->db->resultSet();

		$home_view = "";
		
		foreach ($home_data as $key => $value) {

			$home_view .='
			<div class="lit-lithome-contant-title slit-articl-title" style="display: flex;">
			<div class="lit-notifi-img" style="width:35%; height: 4rem; margin: 0.5rem 0;">
				<img src="'.RISEUP.'/images/'.$value->Image.'">
			</div>
				<p style="width: 90%; margin-left: 1rem;">'.$value->Title.'</p>
			</div>';
		}
		$Home_data = [
			'Post_List' => $home_view
		];
		$Home_data = array_merge($Home_data,$this->getComments());
		return $Home_data;
	}

	public function getComments()
	{

		$this->db->query('SELECT Comments, Channel_Url,Post_Url,User_Url,C_Date  FROM comments WHERE Channel_Url = :Url ORDER BY C_Date DESC LIMIT 3');
		$this->db->bind(':Url',$_SESSION['User_Id']);
		$home_data = $this->db->resultSet();

		$home_view = "";
		
		foreach ($home_data as $key => $value) {

			// user data
			$this->db->query('SELECT F_Name,L_Name,Channel_Logo  FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url',$value->Channel_Url);
			$user_data = $this->db->single();

			//post data
			$this->db->query('SELECT Title, Image FROM post WHERE Url = :Url');
			$this->db->bind(':Url',$value->Post_Url);
			$post_data = $this->db->single();

			$home_view .='
			<div class="lit-lithome-contant-title slit-articl-title" style="display: flex; ">
			<div class="lit-notifi-img" style="width:35%; height: 4rem; margin: 0.5rem 0;">
				<img src="'.RISEUP.'/images/'.$post_data->Image.'">
			</div>
				<p style="width: 90%; margin-left: 1rem;">'.$post_data->Title.'</p>
			</div>
			<div style="display: flex; margin-bottom: 1rem; padding-bottom: 0.5rem; ">
			<div style="width: 7%; margin-right: 1rem;">
				<img style="border-radius: 0.4rem; width: 2.5rem; height: 2.5rem;" src="'.RISEUP.'/images/'.$user_data->Channel_Logo.'">
			</div>
			<div>
				<p style="font-size: 1.4rem; font-weight: 650;">'.$this->Controller->getChannelName($user_data
								->F_Name, $user_data->L_Name).' • '.$this->Controller->time_elapsed_string($value->C_Date).'</p>
				<p style="font-size: 1.4rem;">'.$value->Comments.'</p>
			</div>
		</div>';
		}
		$Home_data = [
			'Comments' => $home_view
		];
		return $Home_data;
	}

	public function getHomeAllData()
	{
		return $this->getChannelAnalytics();
	}
}
?>