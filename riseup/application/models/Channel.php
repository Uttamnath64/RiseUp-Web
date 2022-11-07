<?php
class Channel 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function selectChannelFile($Url,$data, $types="New")
	{
		if ($data == "article") {
			return $this->getChannelArticle($Url,$types);
		}elseif ($data == "articlelist") {
			return $this->getChannelArticleList($Url);
		}elseif ($data == "achievement") {
			return $this->getChannelAchievement($Url);
		}elseif ($data == "about") {
			return $this->getChannelAdout($Url);
		}else{
			return $this->getChannelHome($Url);
		}
	}
	public function getChannelHome($Url)
	{
		$this->db->query('SELECT Url, F_Name, L_Name, Channel_Logo, Description FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url', trim($Url));
		$Channel_Home = $this->db->single();

		//achievement_data

		$this->db->query('SELECT achievement.Achievement_Icon,achievement.Achievement_Name,achievement.Description FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url ORDER BY `achievement_data`.`C_Date` DESC LIMIT 3');
		$this->db->bind(':Channel_Url', $Channel_Home->Url);
		$Achievement = $this->db->resultSet();

		$Achievement_data = "";
		foreach ($Achievement as $key => $value) {
			$Achievement_data .='
          <div class="lit-channel-home-Achievement-item" style="flex-direction: column; ">
            <div class="lit-channel-home-Achievemnt-main-data">
              <div class="lit-channel-home-Achievement-item-icon">
                  '.$value->Achievement_Icon.'
              </div>
              <div class="lit-channel-home-Achievement-item-title">
                  <p>'.$value->Achievement_Name.'</p>
              </div>
          </div>
              <div class="lit-channel-home-Achievement-item-discripsion">
                  <p>'.$value->Description.'</p>
              </div>
          </div>';
		}

		$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
		$this->db->bind(':Url', $Channel_Home->Url);
		$joiner_sql_data = count($this->db->resultSet());


		$ChannelData = [
			'Channel_Url' => $Channel_Home->Url,
			'Channel_Name' => ($Channel_Home->L_Name != ".") ? $Channel_Home->F_Name." ".$Channel_Home->L_Name : $Channel_Home->F_Name,
			'Channel_Logo' => $Channel_Home->Channel_Logo,
			'Channel_Description' => $Channel_Home->Description,
			'Channel_Joiner' => $this->Controller->number_format_short($joiner_sql_data),
			'Achievement' => $Achievement_data,
			'File_Name' => 'ChannelHome.php'
		];

		$ChannelData = array_merge($ChannelData,$this->getChannelprofile($Url),$this->getChannelHomeArticle($Url));
		return $ChannelData;
	}
	public function getChannelArticle($Url)
	{ 
			$this->db->query('SELECT post.Url, post.Title, post.Article, post.Image, post.Date_Time FROM post WHERE post.Channel_Url = :Url ORDER BY post.Date_Time DESC');
			$this->db->bind(':Url', trim($Url));
			$Channel_Article = $this->db->resultSet();

			//channel

			$this->db->query('SELECT F_Name,L_Name,Channel_Logo FROM user_account  WHERE Url = :Url');
			$this->db->bind(':Url', trim($Url));
			$channel_sql_data = $this->db->single();

			$article_data = "";
			foreach ($Channel_Article as $key => $value) {

				$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
				$this->db->bind(':Url', $value->Url);
				$views_data = count($this->db->resultSet());

				$article_data .=  '
				<a href="'.URLROOT.'/feed/article/'.$value->Url.'/channel">
					<div class="lit-channel-postlist-item-main">
						<div class="lit-channel-pli-img">
							<img src="/images/'.$value->Image.'">
						</div>
						<div class="lit-channel-pli-data-div">
							<div class="lit-channel-pli-data">
								<div class="lit-channel-pli-data-title">
									<p>'.$value->Title.'</p>
								</div>
								<div class="lit-channel-pli-data-discripsion">
									<p>'.$this->Controller->convart_ListOutput($value->Article).'</p>
								</div>
								<div class="lit-channel-pli-data-channel">
									<img src="/images/'.$channel_sql_data->Channel_Logo.'">
									<div class="lit-channel-pli-data-channel-text">
										<p class="lit-channel-pli-data-channel-name">'.$this->Controller->getChannelName($channel_sql_data->F_Name, $channel_sql_data->L_Name).'</p>
										<p class="lit-channel-pli-data-post-data">'.$this->Controller->number_format_short($views_data).' Views • '.$this->Controller->time_elapsed_string($value->Date_Time).' [ '.$this->Controller->getDateF($value->Date_Time).' ]</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>';
			}
			$ChannelData = [
				'Channel_Url' => $Url,
				'Channel_AllPost' => $article_data,
				'File_Name' => 'ChannelArticle.php'
			];
			$ChannelData = array_merge($ChannelData,$this->getChannelprofile($Url));
		return $ChannelData;		
	}

	public function getChannelHomeArticle($Url)
	{ 
			$this->db->query('SELECT post.Url, post.Title, post.Image, post.Date_Time FROM post WHERE post.Channel_Url = :Url ORDER BY post.Date_Time DESC');
			$this->db->bind(':Url', trim($Url));
			$Channel_Article = $this->db->resultSet();

			//channel

			$this->db->query('SELECT F_Name,L_Name,Channel_Logo FROM user_account  WHERE Url = :Url');
			$this->db->bind(':Url', trim($Url));
			$channel_sql_data = $this->db->single();

			$article_data = "";
			foreach ($Channel_Article as $key => $value) {

				$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
				$this->db->bind(':Url', $value->Url);
				$views_data = count($this->db->resultSet());

				$article_data .=  '
				<a href="'.URLROOT.'/feed/article/'.$value->Url.'/channel">
					<div class="lit-lithome-main">
					<div class="lit-lithome-contant">
						<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
						<div class="lit-lithome-contant-logo-div">
							<img class="lit-lithome-contant-logo" src="/images/'.$channel_sql_data->Channel_Logo.'">
						</div>
						<div class="lit-lithome-contant-main">
							<div class="lit-lithome-contant-channel">
								<p>'.$this->Controller->getChannelName($channel_sql_data->F_Name, $channel_sql_data->L_Name).'</p>
							</div>
							<div class="lit-lithome-contant-title">
								<p>'.$value->Title.'</p>
							</div>
							<div class="lit-lithome-contant-view-date">
								<p>'.$this->Controller->number_format_short($views_data).' Views • '.$this->Controller->time_elapsed_string($value->Date_Time).'</p>
							</div>
						</div>
					</div>
				</div>
					</a>';
			}
			$ChannelData = [
				'Channel_HomeAllPost' => $article_data
			];
		return $ChannelData;		
	}


	public function getChannelAdout($Url)
	{
		$this->db->query('SELECT Description FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url', trim($Url));
		$Channel_Home = $this->db->single();
		$ChannelData = [
			'Description' => $Channel_Home->Description,
			'Channel_Url' => $Url,
			'File_Name' => 'ChannelAbout.php'
		];
		$ChannelData = array_merge($ChannelData,$this->getChannelprofile($Url));
		return $ChannelData;		
	}
	public function getChannelprofile($Url)
	{
		$this->db->query('SELECT Url, F_Name, L_Name, Channel_Logo,C_Date,Country_Id FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url', trim($Url));
		$Channel_Home = $this->db->single();

		// country data

		$this->db->query('SELECT country_name FROM countries WHERE Id = :Id');
		$this->db->bind(':Id', $Channel_Home->Country_Id );
		$countries_sql_data = $this->db->single();


			//joiner data get

			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
			$this->db->bind(':Url', $Channel_Home->Url);
			$joiner_sql_data = count($this->db->resultSet());

			//channel views data get

			$this->db->query('SELECT Id FROM views WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_Home->Url);
			$C_views_sql_data = count($this->db->resultSet());

			//rank data get

			$this->db->query('SELECT SUM(Points) as Points_sum FROM achievement');
			$Point_Rank_sql_data = $this->db->single();


			// points data get

			$this->db->query('SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_Home->Url);
			$Points_sql_data = $this->db->single();

			// count all like and dislike channel
			
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_Home->Url);
			$C_Count_Like = count($this->db->resultSet());

			// count all dislike channel
			
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_Home->Url);
			$C_Count_Dislike = count($this->db->resultSet());

			//post data get

			$this->db->query('SELECT Url FROM Post WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_Home->Url);
			$Channel_post_sql_data = count($this->db->resultSet());
			
			// for chack channel joined
			$ChannelJoined = '';
			if (isset($_SESSION['User_Id'])) {

			$this->db->query('SELECT Id FROM joiner WHERE User_Url = :User_Url AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url',$Channel_Home->Url);
			$this->db->bind(':User_Url',$_SESSION['User_Id']);

			$ChannelJoined = count($this->db->resultSet());

			if ($ChannelJoined != 0) {
				$ChannelJoined = 'JOIN';
			}else{
				$ChannelJoined = '';
			}
			}
		$ChannelData = [
			'Channel_Url' => $Channel_Home->Url,
			'Channel_Name' => ($Channel_Home->L_Name != ".") ? $Channel_Home->F_Name." ".$Channel_Home->L_Name : $Channel_Home->F_Name,
			'Channel_Logo' => $Channel_Home->Channel_Logo,
			'Channel_Joiner' => $this->Controller->number_format_short($joiner_sql_data),
			'Channel_C_Date' => $this->Controller->getDateF($Channel_Home->C_Date),
			'Channel_Posts' => $Channel_post_sql_data,
			'Channel_Popularity' => ($C_Count_Like - $C_Count_Dislike)*10,
			'Channel_Views' => $C_views_sql_data,
			'Achievement_Point' => $Points_sql_data->Points_sum,
			'Achievement_Rank' =>  intval(($Points_sql_data->Points_sum / $Point_Rank_sql_data->Points_sum)  * 100),
			'Channel_Country_Name' => $countries_sql_data->country_name,
			'ChannelJoined' => $ChannelJoined,

		];
		return $ChannelData;		
	}
	public function getChannelAchievement($Url)
	{
		$ChannelData = [
			'Channel_Url' => $Url,
			'File_Name' => 'ChannelAchievement.php'
		];
		$ChannelData = array_merge($ChannelData,$this->getAchievementList($Url));
		$ChannelData = array_merge($ChannelData,$this->getChannelprofile($Url));

		return $ChannelData;
	}
		public function getChannelArticleList($Url)
	{
		$ChannelData = [
			'Channel_Url' => $Url,
			'File_Name' => 'ChannelArticleList.php'
		];
		$ChannelData = array_merge($ChannelData,$this->getChannelprofile($Url));
		return $ChannelData;
	}
	public function getChannelAllDataView($data)
	{
		if (!isset($data[0])) {
			die("data not found!");
		}

		$this->db->query('SELECT Url FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url', trim($data[0]));

		if (count($this->db->resultSet()) <= 0) {
			die("data not found");
		}

		if (!isset($data[1])) {
			return $this->selectChannelFile($data[0],"home");
		}elseif(!isset($data[2])){
			return $this->selectChannelFile($data[0],$data[1]);
		}else{
			return $this->selectChannelFile($data[0],$data[1],$data[2]);
		}

	}

	public function getAchievementList($data)
	{
		//achievement_data

		$this->db->query('SELECT Achievement_Id,C_Date FROM achievement_data WHERE Channel_Url = :Url');
		$this->db->bind(':Url',$data);
		$All_Achievement = $this->db->resultSet();

		$Achievement_data = "";
		foreach ($All_Achievement as $key => $value) {

			$this->db->query('SELECT * FROM achievement WHERE Id = :Achievement_Id');
			$this->db->bind(':Achievement_Id', $value->Achievement_Id);
			$Achi_Data = $this->db->single();
			
				$Achievement_data .='
          <div class="lit-channel-home-Achievement-item a_item">
          <div class="list-div">
            <div class="lit-channel-home-Achievemnt-main-data">
              <div class="lit-channel-home-Achievement-item-icon">
                  '.$Achi_Data->Achievement_Icon.'
              </div>
              <div class="lit-channel-home-Achievement-item-title">
                  <p>'.$Achi_Data->Achievement_Name.'</p>
              </div>
          </div>
              <div class="lit-channel-home-Achievement-item-discripsion">
                  <p>'.$Achi_Data->Description.'</p>
              </div>
              </div>
              <div class="lit-channel-ach-btn">
              	<p class="list-item-c">Collected</p>
              </div>
          </div>';
			
		}

		$data_a = [
			'Achievement_List' => $Achievement_data
		];
		return $data_a;
	}
}
?>