<?php
class home
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getArticlesAnalytics()
	{

		$Dashboard = [
			'Current_Articles' => $this->Controller->number_format_short($this->getNumOfArticles('')),
			'60M_Articles' => $this->Controller->number_format_short($this->getNumOfArticles('WHERE Date_Time > now() - INTERVAL 60 minute')),
			'48H_Articles' => $this->Controller->number_format_short($this->getNumOfArticles('WHERE Date_Time > now() - INTERVAL 2 day')),
			'28D_Articles' => $this->Controller->number_format_short($this->getNumOfArticles('WHERE Date_Time > now() - INTERVAL 28 day'))
		];
		$Dashboard = array_merge($Dashboard,$this->getChannelsList());
		return $Dashboard;
	}
	public function getViewsAnalytics()
	{

		$Dashboard = [
			'Current_Views' => $this->Controller->number_format_short($this->getViews('')),
			'60M_Views' => $this->Controller->number_format_short($this->getViews('WHERE C_Date > now() - INTERVAL 60 minute')),
			'48H_Views' => $this->Controller->number_format_short($this->getViews('WHERE C_Date > now() - INTERVAL 2 day')),
			'28D_Views' => $this->Controller->number_format_short($this->getViews('WHERE C_Date > now() - INTERVAL 28 day'))
		];
		$Dashboard = array_merge($Dashboard,$this->getChannelsAnalytics());
		return $Dashboard;
	}
	public function getChannelsAnalytics()
	{

		$Dashboard = [
			'Current_Channels' => $this->Controller->number_format_short($this->getNumOfChannels('')),
			'60M_Chanels' => $this->Controller->number_format_short($this->getNumOfChannels('WHERE C_Date > now() - INTERVAL 60 minute')),
			'48H_Channels' => $this->Controller->number_format_short($this->getNumOfChannels('WHERE C_Date > now() - INTERVAL 2 day')),
			'28D_Channels' => $this->Controller->number_format_short($this->getNumOfChannels('WHERE C_Date > now() - INTERVAL 28 day'))
		];
		$Dashboard = array_merge($Dashboard,$this->getArticlesAnalytics());
		return $Dashboard;
	}
	public function getArticlesList()
	{
		
		$this->db->query('SELECT Title, Image  FROM post ORDER BY `Date_Time` DESC LIMIT 6');
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

	public function getChannelsList()
	{
		
		$this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account ORDER BY `C_Date` DESC LIMIT 6');
		$home_data = $this->db->resultSet();
		$home_view = "";
		
		foreach ($home_data as $key => $value) {
			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url',$value->Url);
			$joiner = count($this->db->resultSet());

			$home_view .='
			<div class="lit-lithome-contant-title slit-articl-title" style="display: flex;">
			<div class="lit-notifi-img" style="width:4rem; height: 4rem; margin: 0.5rem 0;">
				<img src="'.RISEUP.'/images/'.$value->Channel_Logo.'">
			</div>
			<div style="width: 100%; margin-top:-0.5rem">
				<p style="width: 90%; margin-left: 1rem;">'.$this->Controller->getChannelName($value->F_Name,$value->L_Name).'</p>
				<p style="width: 90%; margin-left: 1rem; font-weight: 400;margin-bottom:-1rem;">'.$this->Controller->number_format_short($joiner).' '.'Joiner'.'</p></div>
			</div>';
		}
		$Home_data = [
			'Channels_List' => $home_view
		];
		$Home_data = array_merge($Home_data,$this->getArticlesList());
		return $Home_data;
	}

	public function getComments()
	{

		$this->db->query('SELECT Comments, Channel_Url,Post_Url,User_Url,C_Date  FROM comments ORDER BY C_Date DESC LIMIT 3');
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
		return $this->getViewsAnalytics();
	}

	// get number of channels
	public function getNumOfChannels($data)
	{
			$this->db->query('SELECT Url FROM user_account '.$data);
			return count($this->db->resultSet());
	}

	// get number of articles
	public function getNumOfArticles($data)
	{
			$this->db->query('SELECT Url FROM post '.$data);
			return count($this->db->resultSet());
	}

	// get Views
	public function getViews($data)
	{
			$this->db->query('SELECT Id FROM views '.$data);
			return count($this->db->resultSet());
	}

	// channel comments
	public function getChannelComments($data, $url)
	{
			$this->db->query('SELECT Id FROM comments WHERE Channel_Url = :Url AND Post_Url = :Post_Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			$this->db->bind(':Post_Url', $url);
			return count($this->db->resultSet());
	}
}
?>