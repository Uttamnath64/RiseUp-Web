<?php
class Channels 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getChannelsList()
	{
		return $this->getChannels();	
	}
	public function getChannels()
	{
		$this->db->query("SELECT Url,F_Name,L_Name,Channel_Logo,C_Date,Country_Id FROM user_account ORDER BY `C_Date` DESC");
		$post_data = $this->db->resultSet();
		$Post_List = '';
		foreach ($post_data as $key => $value) {

			// count number of views
			$this->db->query('SELECT Id FROM views WHERE  Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Url);
			$NumOfViews = count($this->db->resultSet());

			//count number of achievements points
			$this->db->query('SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Url);
			$NumOfAchievements = $this->db->single();

		//popularity count ->

			// count all like and dislike channel
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Url);
			$NumOfLikes = count($this->db->resultSet());

			// count all dislike channel
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Url);
			$NumOfDislikes = count($this->db->resultSet());


			//count of article on channel
			$this->db->query('SELECT Url FROM post WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Url);
			$NumOfArticles = count($this->db->resultSet());

			//count number of joiner
			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Url);
			$NumOfJoiner = count($this->db->resultSet());

			//get channel country by country id 
			$this->db->query('SELECT country_name FROM countries WHERE Id = :Id');
			$this->db->bind(':Id', $value->Country_Id);
			$Country_Name = $this->db->single();




			$Post_List .='
					<tr>
						<td><div class="lit-notifi-img" style="width: 100%; margin: 0.5rem 0; text-align:center; display:flex; flex-direction: column; justify-content: center;">
					<img src="http://riseup.lit:81/images/'.$value->Channel_Logo.'" style="width: 4rem; height: 4rem;">
				</div></td>
						<td><div class="lit-lithome-contant-title" style="padding-top: -2rem"><p style="-webkit-line-clamp:1 !important;" >'.$this->Controller->getChannelName($value->F_Name,$value->L_Name).'</p></div></td>
						<td><p>'.$this->Controller->number_format_short($NumOfJoiner).'</p></td>
						<td>'.$this->Controller->number_format_short($NumOfArticles).'</td>
						<td>'.$this->Controller->number_format_short($NumOfViews).'</td>
						<td>'.$this->Controller->getDateF($value->C_Date).'</td>
						<td>'.$this->Controller->number_format_short(($NumOfLikes - $NumOfDislikes)*10).'</td>
						<td>'.$this->Controller->number_format_short($NumOfAchievements->Points_sum).'</td>
						<td>'.$Country_Name->country_name.'</td>
						<td>
							<div class="slit-at-btn-div">
								<a href="/feed/Channel/'.$value->Url.'/analytics"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></svg></a>
								<a href="'.RISEUP.'/feed/Channel/'.$value->Url.'">
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg></a>
								<a href="/Channel/deleteChannel/'.$value->Url.'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg></a>
							</div>
						</td>
					</tr>';
		}
		if ($Post_List == '') {
			$Post_List = '<div style="text-align: center; width:100%; margin-top: 2rem;">Channel not have any articles!</div>';
		}
		$Articles = [
			'Channel_List' => $Post_List
		];
		return $Articles;
	}

	public function selectChannelFile($data)
	{
		if (isset($data[0])) {
			if (!isset($data[1])) {
				$data = array_merge($this->getChannelReadData($data[0]),$this->getSidebarData($data[0]));
				return $data;
			}elseif($data[1] == 'read'){
				$data = array_merge($this->getChannelReadData($data[0]),$this->getSidebarData($data[0]));
				return $data;
			}elseif($data[1] == 'analytics'){
				$data = array_merge($this->getChannelAnaliticsData($data[0]),$this->getSidebarData($data[0]));
				return $data;
			}else{
				$data = array_merge($this->getChannelReadData($data[0]),$this->getSidebarData($data[0]));
				return $data;
			}
		}else{
			header("location: /feed/Dashboard");
		}
	}

	public function getChannelReadData($data)
	{
		$this->db->query('SELECT * FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url',$data);
		$Channel_Data = $this->db->single();

		//country name
		$this->db->query('SELECT country_name FROM countries WHERE Id = :Id');
		$this->db->bind(':Id',$Channel_Data->Country_Id);
		$Country_Name = $this->db->single();

		$Channel_Data = [
			'Channel_Url' => $Channel_Data->Url,
			'Channel_F_Name' => $Channel_Data->F_Name,
			'Channel_L_Name' => $Channel_Data->L_Name,
			'Channel_Email' => $Channel_Data->Email,
			'Channel_Mobile_Number' => $Channel_Data->Mobile_Number,
			'Channel_DOB' => $Channel_Data->DOB,
			'Channel_Channel_Logo' => $Channel_Data->Channel_Logo,
			'Channel_Country_Name' => $Country_Name->country_name,
			'Channel_Gender' => $Channel_Data->Gender,
			'Channel_Description' => $Channel_Data->Description,
			'File_Name' => 'read.php'
		];
		return $Channel_Data;
	}

	// channel views
	public function getChannelViews($data)
	{
			$this->db->query('SELECT Id FROM views WHERE Channel_Url = :Url '.$data[0]);
			$this->db->bind(':Url', $data[1]);
			return count($this->db->resultSet());
	}

	// channel comments
	public function getChannelComments($data)
	{
			$this->db->query('SELECT Id FROM comments WHERE Channel_Url = :Url '.$data[0]);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			return count($this->db->resultSet());
	}

	// channel joiner
	public function getChannelJoiner($data)
	{
			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url '.$data[0]);
			$this->db->bind(':Url', $data[1]);
			return count($this->db->resultSet());
	}

	// channel Articles
	public function getChannelArticles($data)
	{
			$this->db->query('SELECT Url FROM post WHERE Channel_Url = :Url '.$data[0]);
			$this->db->bind(':Url', $data[1]);
			return count($this->db->resultSet());
	}

	// channel Achievement
	public function getChannelAchievement($data)
	{
			$this->db->query('SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Url '.$data[0]);
			$this->db->bind(':Url', $data[1]);
			return count($this->db->resultSet());
	}

	// channel Likes
	public function getChannelLikes($data)
	{
			$this->db->query('SELECT Id FROM like_dislike WHERE Channel_Url = :Url AND Like_Dislike = 1 '.$data[0]);
			$this->db->bind(':Url', $data[1]);
			return count($this->db->resultSet());
	}

	// channel Dislikes
	public function getChannelDislikes($data)
	{
			$this->db->query('SELECT Id FROM like_dislike WHERE Channel_Url = :Url AND Like_Dislike = 0 '.$data[0]);
			$this->db->bind(':Url', $data[1]);
			return count($this->db->resultSet());
	}
	public function getChannelAnaliticsData($data)
	{
		$Analytics_Data = [

			// 48H
			'Views_48H' => $this->Controller->number_format_short($this->getChannelViews([' AND C_Date > now() - INTERVAL 48 hour',$data])),
			'Comments_48H' => $this->Controller->number_format_short($this->getChannelComments([' AND C_Date > now() - INTERVAL 48 hour',$data])),
			'Joiner_48H' => $this->Controller->number_format_short($this->getChannelJoiner([' AND C_Date > now() - INTERVAL 48 hour',$data])),
			'Articles_48H' => $this->Controller->number_format_short($this->getChannelArticles([' AND Date_Time > now() - INTERVAL 48 hour',$data])),
			'Popularity_48H' => $this->Controller->number_format_short(($this->getChannelLikes([' AND C_Date > now() - INTERVAL 48 hour',$data]) - $this->getChannelDislikes([' AND C_Date > now() - INTERVAL 48 hour',$data])) * 10),
			'Achievement_48H' => $this->Controller->number_format_short($this->getChannelAchievement([' AND C_Date > now() - INTERVAL 48 hour',$data])),
			'Likes_48H' => $this->Controller->number_format_short($this->getChannelLikes([' AND C_Date > now() - INTERVAL 48 hour',$data])),
			'Dislikes_48H' => $this->Controller->number_format_short($this->getChannelDislikes([' AND C_Date > now() - INTERVAL 48 hour',$data])),

			// 7D
			'Views_7D' => $this->Controller->number_format_short($this->getChannelViews([' AND C_Date > now() - INTERVAL 7 day',$data])),
			'Comments_7D' => $this->Controller->number_format_short($this->getChannelComments([' AND C_Date > now() - INTERVAL 7 day',$data])),
			'Joiner_7D' => $this->Controller->number_format_short($this->getChannelJoiner([' AND C_Date > now() - INTERVAL 7 day',$data])),
			'Articles_7D' => $this->Controller->number_format_short($this->getChannelArticles([' AND Date_Time > now() - INTERVAL 7 day',$data])),
			'Popularity_7D' => $this->Controller->number_format_short(($this->getChannelLikes([' AND C_Date > now() - INTERVAL 7 day',$data]) - $this->getChannelDislikes([' AND C_Date > now() - INTERVAL 7 day',$data])) * 10),
			'Achievement_7D' => $this->Controller->number_format_short(intval($this->getChannelAchievement([' AND C_Date > now() - INTERVAL 7 day',$data]))),
			'Likes_7D' => $this->Controller->number_format_short($this->getChannelLikes([' AND C_Date > now() - INTERVAL 7 day',$data])),
			'Dislikes_7D' => $this->Controller->number_format_short($this->getChannelDislikes([' AND C_Date > now() - INTERVAL 7 day',$data])),

			// 28D
			'Views_28D' => $this->Controller->number_format_short($this->getChannelViews([' AND C_Date > now() - INTERVAL 28 day',$data])),
			'Comments_28D' => $this->Controller->number_format_short($this->getChannelComments([' AND C_Date > now() - INTERVAL 28 day',$data])),
			'Joiner_28D' => $this->Controller->number_format_short($this->getChannelJoiner([' AND C_Date > now() - INTERVAL 28 day',$data])),
			'Articles_28D' => $this->Controller->number_format_short($this->getChannelArticles([' AND Date_Time > now() - INTERVAL 28 day',$data])),
			'Popularity_28D' => $this->Controller->number_format_short(($this->getChannelLikes([' AND C_Date > now() - INTERVAL 28 day',$data]) - $this->getChannelDislikes([' AND C_Date > now() - INTERVAL 28 day',$data]))* 10),
			'Achievement_28D' => $this->Controller->number_format_short($this->getChannelAchievement([' AND C_Date > now() - INTERVAL 28 day',$data])),
			'Likes_28D' => $this->Controller->number_format_short($this->getChannelLikes([' AND C_Date > now() - INTERVAL 28 day',$data])),
			'Dislikes_28D' => $this->Controller->number_format_short($this->getChannelDislikes([' AND C_Date > now() - INTERVAL 28 day',$data])),

			// LF
			'Views_LF' => $this->Controller->number_format_short($this->getChannelViews(['',$data])),
			'Comments_LF' => $this->Controller->number_format_short($this->getChannelComments(['',$data])),
			'Joiner_LF' => $this->Controller->number_format_short($this->getChannelJoiner(['',$data])),
			'Articles_LF' => $this->Controller->number_format_short($this->getChannelArticles(['',$data])),
			'Popularity_LF' => $this->Controller->number_format_short(($this->getChannelLikes(['',$data]) - $this->getChannelDislikes(['',$data])) * 10),
			'Achievement_LF' => $this->Controller->number_format_short($this->getChannelAchievement(['',$data])),
			'Likes_LF' => $this->Controller->number_format_short($this->getChannelLikes(['',$data])),
			'Dislikes_LF' => $this->Controller->number_format_short($this->getChannelDislikes(['',$data])),
			'Top_Articles' => $this->getTopArticles($data),
			'Top_Traffic' => $this->getTraffic($data),
			'File_Name' => 'analytics.php'
		];

		return $Analytics_Data;
	}
	public function getSidebarData($data)
		{
			$this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url',$data);
			$Channel_Data = $this->db->single();

			$Channel_Data = [
				'SB_Url' => $Channel_Data->Url,
				'SB_Name' => $this->Controller->getChannelName($Channel_Data->F_Name,$Channel_Data->L_Name),
				'SB_Channel_Logo' => $Channel_Data->Channel_Logo
			];
			return $Channel_Data;
		}

	public function getTopArticles($data)
	{
		$this->db->query('SELECT post.Title,post.Url,post.Image, COUNT(views.Id) AS Views From views RIGHT JOIN post ON post.Url = views.Post_Url WHERE views.Channel_Url = :Url GROUP by Post_Url ORDER BY Views DESC LIMIT 4');
		$this->db->bind(':Url', $data);
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

	public function getTraffic($data)
	{
		$this->db->query('SELECT Source_Type, COUNT(views.Id) AS Views From views WHERE Channel_Url = :Url GROUP by Source_Type ORDER BY Views DESC LIMIT 6');
		$this->db->bind(':Url', $data);
		$top_articles = $this->db->resultSet();

		$TopArticles = '';
		foreach ($top_articles as $key => $value) {
			$TopArticles .= '<div><label>'.$value->Source_Type.'</label>'.$value->Views.'</div>
';
		}
		return $TopArticles;
	}
		public function deleteChannelDB($Url)
		{
			$this->db->query('DELETE FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url', $Url);
			$this->db->execute();
			header("location: ".URLROOT."/feed/Channels");
		}
}
?>