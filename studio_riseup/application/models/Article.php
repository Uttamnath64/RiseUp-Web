<?php
	class Article
	{
		
		function __construct()
		{
			$this->Controller = new Controller;
			$this->db = new Database;
		}
		public function getArticleData($data)
		{
			if (!isset($data[0])) {
				header("location: /feed/Dashboard");
			}
			if (!isset($data[1])) {
				$data[1] = 'Edit';
			}
			$article = array_merge($this->getSidebarData($data),$this->seletFile($data));
			return $article;
		}
		public function seletFile($data)
		{
			if ($data[1] == 'edit') {
				return $this->getEditData($data[0]);
			}elseif ($data[1] == 'analytics') {
				return $this->getAnalyticsData($data[0]);
			}elseif ($data[1] == 'comments') {
				return $this->getCommentsData($data[0]);			
			}else{
				return $this->getEditData($data[0]);
			}
		}
		public function getEditData($data)
		{
			$this->db->query('SELECT * FROM post WHERE Url = :Url AND Channel_Url = :Channel_Url');
			$this->db->bind(':Url',$data);
			$this->db->bind(':Channel_Url',$_SESSION['User_Id']);
			$post_data = $this->db->single();

			$this->db->query('SELECT Tag FROM tags WHERE Post_Url = :Post_Url');
			$this->db->bind(':Post_Url',$post_data->Url);
			$tags = $this->db->resultSet();
			$tag = '';
			foreach ($tags as $key => $value) {
				if ($tag == '') {
					$tag = $value->Tag;
				}else{
					$tag .= ",".$value->Tag;
				}
			}
			$Post_data = [
				'Edit_Url' => $post_data->Url,
				'Edit_Title' => $post_data->Title,
				'Edit_Article' => $post_data->Article,
				'Edit_Visibility' => $post_data->Visibility,
				'Edit_Image' => $post_data->Image,
				'Edit_Comments' => $post_data->Comments,
				'Edit_Paid_Promotion' => $post_data->Paid_Promotion,
				'Edit_Category_Id' => $post_data->Category_Id,
				'Edit_Date_Time' => $post_data->Date_Time,
				'Edit_Tags' => $tag,
				'File_Name' => 'Edit.php'
			];
			return $Post_data;
		}
		public function getCategory()
		{
			$this->db->query('SELECT * FROM category');
    		return $this->db->resultSet();
		}
		public function getAnalyticsData($data)
		{
			$Analytics_Data = [

			// 48H
			'Views_48H' => $this->Controller->number_format_short($this->getChannelViews(' AND C_Date > now() - INTERVAL 48 hour',$data)),
			'Comments_48H' => $this->Controller->number_format_short($this->getChannelComments(' AND C_Date > now() - INTERVAL 48 hour',$data)),
			'Likes_48H' => $this->Controller->number_format_short($this->getChannelLikes(' AND C_Date > now() - INTERVAL 48 hour',$data)),
			'Dislikes_48H' => $this->Controller->number_format_short($this->getChannelDislikes(' AND C_Date > now() - INTERVAL 48 hour',$data)),

			// 7D
			'Views_7D' => $this->Controller->number_format_short($this->getChannelViews(' AND C_Date > now() - INTERVAL 7 day',$data)),
			'Comments_7D' => $this->Controller->number_format_short($this->getChannelComments(' AND C_Date > now() - INTERVAL 7 day',$data)),
			'Likes_7D' => $this->Controller->number_format_short($this->getChannelLikes(' AND C_Date > now() - INTERVAL 7 day',$data)),
			'Dislikes_7D' => $this->Controller->number_format_short($this->getChannelDislikes(' AND C_Date > now() - INTERVAL 7 day',$data)),

			// 28D
			'Views_28D' => $this->Controller->number_format_short($this->getChannelViews(' AND C_Date > now() - INTERVAL 28 day',$data)),
			'Comments_28D' => $this->Controller->number_format_short($this->getChannelComments(' AND C_Date > now() - INTERVAL 28 day',$data)),
			'Likes_28D' => $this->Controller->number_format_short($this->getChannelLikes(' AND C_Date > now() - INTERVAL 28 day',$data)),
			'Dislikes_28D' => $this->Controller->number_format_short($this->getChannelDislikes(' AND C_Date > now() - INTERVAL 28 day',$data)),

			// LF
			'Views_LF' => $this->Controller->number_format_short($this->getChannelViews('',$data)),
			'Comments_LF' => $this->Controller->number_format_short($this->getChannelComments('',$data)),
			'Likes_LF' => $this->Controller->number_format_short($this->getChannelLikes('',$data)),
			'Dislikes_LF' => $this->Controller->number_format_short($this->getChannelDislikes('',$data)),
			'Top_Traffic' => $this->getTraffic($data),
			'File_Name' => 'analytics.php'
		];

		return $Analytics_Data;
		}
		public function getCommentsData($data)
		{
			return $this->getAllComments($data);
		}
		public function getSidebarData($data)
		{
			$this->db->query('SELECT Url,Title,Image FROM post WHERE Url = :Url AND Channel_Url = :Channel_Url');
			$this->db->bind(':Url',$data[0]);
			$this->db->bind(':Channel_Url',$_SESSION['User_Id']);
			$post_data = $this->db->single();

			$Post_data = [
				'SB_Url' => $post_data->Url,
				'SB_Title' => $post_data->Title,
				'SB_Image' => $post_data->Image
			];
			return $Post_data;
		}





	// channel views
	public function getChannelViews($data,$url)
	{
			$this->db->query('SELECT Id FROM views WHERE Channel_Url = :Url AND Post_Url = :Post_Url '.$data);
			$this->db->bind(':Post_Url', $url);
			$this->db->bind(':Url', $_SESSION['User_Id']);
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


	// channel Likes
	public function getChannelLikes($data,$url)
	{
			$this->db->query('SELECT Id FROM like_dislike WHERE Channel_Url = :Url AND Like_Dislike = 1 AND Post_Url = :Post_Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			$this->db->bind(':Post_Url', $url);
			return count($this->db->resultSet());
	}

	// channel Dislikes
	public function getChannelDislikes($data,$url)
	{
			$this->db->query('SELECT Id FROM like_dislike WHERE Channel_Url = :Url AND Like_Dislike = 0 AND Post_Url = :Post_Url '.$data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			$this->db->bind(':Post_Url', $url);
			return count($this->db->resultSet());
	}
		public function getTraffic($data)
	{
		$this->db->query('SELECT Source_Type, COUNT(views.Id) AS Views From views WHERE Channel_Url = :Url AND Post_Url = :Post_Url GROUP by Source_Type ORDER BY Views DESC LIMIT 6');
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$this->db->bind(':Post_Url', $data);
		$top_articles = $this->db->resultSet();

		$TopArticles = '';
		foreach ($top_articles as $key => $value) {
			$TopArticles .= '<div><label>'.$value->Source_Type.'</label>'.$value->Views.'</div>
';
		}
		return $TopArticles;
	}


		public function getAllComments($data)
		{
			$this->db->query('SELECT Comments, Channel_Url,Post_Url,User_Url,C_Date  FROM comments WHERE Channel_Url = :Url AND Post_Url = :Post_Url ORDER BY C_Date DESC');
			$this->db->bind(':Url',$_SESSION['User_Id']);
			$this->db->bind(':Post_Url',$data);
			$home_data = $this->db->resultSet();

			$home_view = "";
			
			foreach ($home_data as $key => $value) {

				// user data
				$this->db->query('SELECT F_Name,L_Name,Channel_Logo  FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url',$value->Channel_Url);
				$user_data = $this->db->single();

				$home_view .='
				<div style="display: flex; width: 90%; margin: 1rem auto; padding: 1rem; border: 1px solid var(--lit-bgt-color); border-radius: 0.4rem">
				<div style="display: flex; margin-bottom: 1rem; padding-bottom: 0.5rem; ">
				<div style="width: 7%; margin-right: 3rem;">
					<img style="border-radius: 0.4rem; width: 3rem; height: 3rem;" src="'.RISEUP.'/images/'.$user_data->Channel_Logo.'">
				</div>
				<div>
					<p style="font-size: 1.4rem; margin: 0.2rem 0; font-weight: 650;">'.$this->Controller->getChannelName($user_data
									->F_Name, $user_data->L_Name).' • '.$this->Controller->time_elapsed_string($value->C_Date).'</p>
					<p style="font-size: 1.4rem;">'.$value->Comments.'</p>
				</div>
			</div>
			</div>';
			}
			$Home_data = [
				'Comments_List' => $home_view,
				'File_Name' => 'comments.php'
			];
			return $Home_data;
		}


	}
?>