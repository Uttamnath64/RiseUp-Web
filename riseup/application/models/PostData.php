<?php
	class PostData 
	{
		function __construct()
		{
			$this->Controller = new Controller;
			$this->db = new Database;
		}
		public function postAddInDatabase($PostData)
		{
			if (!empty($PostData["Tags"])) {
				foreach ($PostData["Tags"] as $key => $value) {
					$this->insertTags($PostData['Url'],$value);
				}
			}
			if($PostData['Visibility'] =='PU'){
				$this->db->query("UPDATE post SET Title = :Title, Article = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category, Date_Time = :Date_Time  WHERE post.Url = :Url ");

		        $this->db->bind(':Url', $PostData['Url']);
		        $this->db->bind(':Title', $PostData['Title']);
		        $this->db->bind(':Blog', $PostData['Blog']);
		        $this->db->bind(':Visibility', $PostData['Visibility']);
		        $this->db->bind(':Image', $PostData['Image']);
		        $this->db->bind(':Comments', $PostData['Comments']);
		        $this->db->bind(':Date_Time', date('Y-m-d H:i:s'));
		        $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
		        $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
		        $this->db->bind(':Category', $PostData['Category']);		

		        if (!$this->db->execute()) {
		        	die("Something went wrong!");
			    }

	            $this->db->query('INSERT INTO notification (Post_Url,Channel_Url)VALUES (:Post_Url,:Channel_Url)');
	            $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
	            $this->db->bind(':Post_Url', $PostData['Url']);

	            if (!$this->db->execute()) {
		        	die("Something went wrong!");
			    }

			}else{

				$this->db->query("UPDATE post SET Title = :Title, Blog = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category WHERE post.Url = :Url ");
				$this->db->bind(':Url', $PostData['Url']);
		        $this->db->bind(':Title', $PostData['Title']);
		        $this->db->bind(':Blog', $PostData['Blog']);
		        $this->db->bind(':Visibility', $PostData['Visibility']);
		        $this->db->bind(':Image', $PostData['Image']);
		        $this->db->bind(':Comments', $PostData['Comments']);
		        $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
		        $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
		        $this->db->bind(':Category', $PostData['Category']);		

		        if (!$this->db->execute()) {
		        	die("Something went wrong!");
			    }
			}
		    return true;
	    }

		public function insertTags($Post_Url,$Tag)
		{
			$this->db->query('INSERT INTO tags (Post_Url,Tag)VALUES (:Post_Url,:Tag)');
            $this->db->bind(':Post_Url', $Post_Url);
            $this->db->bind(':Tag', $Tag);

            if (!$this->db->execute()) {
	        	die("Something went wrong!");
		    }
		}

		public function findUserByUrlAndInsert($Url,$PostData)
		{
			$this->db->query('SELECT * FROM user_account WHERE Url = :Url');
	        $this->db->bind(':Url', $Url);
	        if(count($this->db->resultSet()) > 0) {
	            return true;
	        } else {
	            $this->db->query('INSERT INTO post (Url, Channel_Url, Category_Id)VALUES ( :Url, :Channel_Url, :Category_Id )');

	            $this->db->bind(':Url', $Url);
	            $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
	            $this->db->bind(':Category_Id', $PostData['Category']);
	            if ($this->db->execute()) {
	            	return false;
		        } else {
		            die("Something went wrong!");
		        }
	        }
		}

		public function getCategory()
		{
			$this->db->query('SELECT * FROM category');
    		return $this->db->resultSet();
		}

		public function getPostAllData($value)
		{
			$this->db->query('SELECT * FROM post WHERE Url = :Url');
			$this->db->bind(':Url', trim($value[0]));

			if (count($this->db->resultSet()) <= 0) {
				die("data not found");
			}

			$Post_sql_data = $this->db->single();

			if ($Post_sql_data->Visibility == "PR") {
				die("Post is Private");
			}

			// for views
			if (isset($_SESSION['User_Id'])) {
			
				$this->db->query('INSERT INTO views (User_Url, Post_Url, IP_Address,Channel_Url,Source_Type) VALUES(:User_Url, :Post_Url, :IP, :Channel_Url, :Source_Type)');
				$this->db->bind(':User_Url', trim($_SESSION['User_Id']));
				$this->db->bind(':Post_Url', trim($Post_sql_data->Url));
				$this->db->bind(':Channel_Url', trim($Post_sql_data->Channel_Url));
				$this->db->bind(':Source_Type', trim((isset($value[1])) ? $value[1] : "UNKNOWN"));
				$this->db->bind(':IP', $this->Controller->getUserIP());
				$this->db->execute();
			}else{
				$this->db->query('INSERT INTO views (Post_Url, IP_Address, Channel_Url,Source_Type) VALUES(:Post_Url, :IP, :Channel_Url, :Source_Type)');
				$this->db->bind(':Post_Url', trim($Post_sql_data->Url));
				$this->db->bind(':Channel_Url', trim($Post_sql_data->Channel_Url));
				$this->db->bind(':Source_Type', trim((isset($value[1])) ? $value[1] : "UNKNOWN" ));
				$this->db->bind(':IP', $this->Controller->getUserIP());
				$this->db->execute();
			}

			// channel data get
			
			$this->db->query('SELECT Url,F_Name,L_Name,Country_Id,C_Date,Channel_Logo FROM user_account WHERE Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Post_sql_data->Channel_Url);
			$Channel_sql_data = $this->db->single();

			//category  data get

			$this->db->query('SELECT Category_Name FROM category WHERE Id = :Id');
			$this->db->bind(':Id', $Post_sql_data->Category_Id);
			$Category_sql_data = $this->db->single();

			//countries data get

			$this->db->query('SELECT country_name FROM countries WHERE Id = :Id');
			$this->db->bind(':Id', $Channel_sql_data->Country_Id );
			$countries_sql_data = $this->db->single();

			//joiner data get

			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
			$this->db->bind(':Url', $Channel_sql_data->Url);
			$joiner_sql_data = count($this->db->resultSet());

			//channel views data get

			$this->db->query('SELECT Id FROM views WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_sql_data->Url);
			$C_views_sql_data = count($this->db->resultSet());

			//post views data get

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $Post_sql_data->Url);
			$P_views_sql_data = count($this->db->resultSet());

			//rank data get

			$this->db->query('SELECT SUM(Points) as Points_sum FROM achievement');
			$Point_Rank_sql_data = $this->db->single();

			//post data get

			$this->db->query('SELECT Url FROM Post WHERE Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_sql_data->Url);
			$Channel_post_sql_data = count($this->db->resultSet());

			// points data get

			$this->db->query('SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_sql_data->Url);
			$Points_sql_data = $this->db->single();

			// count all like and dislike channel
			
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_sql_data->Url);
			$C_Count_Like = count($this->db->resultSet());

			// count all dislike channel
			
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $Channel_sql_data->Url);
			$C_Count_Dislike = count($this->db->resultSet());

			//count like of post

			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $Post_sql_data->Url);
			$P_Count_Like = count($this->db->resultSet());

			//count dislike of post

			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $Post_sql_data->Url);
			$P_Count_Dislike = count($this->db->resultSet());

			//get post tags

			$this->db->query('SELECT Tag FROM Tags WHERE Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $Post_sql_data->Url);
			$Post_tags = $this->db->resultSet();

			// check like and dislike
			$LikeAndDislike = '';
			$ArticleBookmark = '';
			$ChannelJoined = '';
			if(isset($_SESSION['User_Id'])){
			$this->db->query('SELECT Like_Dislike FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
			$this->db->bind(':Post_Url',$Post_sql_data->Url);
			$this->db->bind(':User_Url',$_SESSION['User_Id']);

			$LikeAndDislike = count($this->db->resultSet());

			if ($LikeAndDislike != 0) {
				$LikeAndDislike = $this->db->single();
				if($LikeAndDislike->Like_Dislike == 1){
					$LikeAndDislike = 'LIKE';
				}else{
					$LikeAndDislike = 'DISLIKE';
				}
			}else{
				$LikeAndDislike = 'UNSET';
			}
			// for chack bookmark
			$this->db->query('SELECT Id FROM bookmark WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
			$this->db->bind(':Post_Url',$Post_sql_data->Url);
			$this->db->bind(':User_Url',$_SESSION['User_Id']);

			$ArticleBookmark = count($this->db->resultSet());

			if ($ArticleBookmark != 0) {
				$ArticleBookmark = 'BOOKMARK';
			}else{
				$ArticleBookmark = '';
			}

			// for chack channel joined
			$this->db->query('SELECT Id FROM joiner WHERE User_Url = :User_Url AND Channel_Url = :Channel_Url');
			$this->db->bind(':Channel_Url',$Channel_sql_data->Url);
			$this->db->bind(':User_Url',$_SESSION['User_Id']);

			$ChannelJoined = count($this->db->resultSet());

			if ($ChannelJoined != 0) {
				$ChannelJoined = 'JOIN';
			}else{
				$ChannelJoined = '';
			}
			}
			$PostData = [

					//Post data 

					'Post_Url' => $Post_sql_data->Url,
					'Post_Title' => $Post_sql_data->Title,
					'Post_Article' =>$this->Controller->convart_Output($Post_sql_data->Article),
					'Post_Visibility' => $Post_sql_data->Visibility,
					'Post_Image' => $Post_sql_data->Image,
					'Post_Comments' => $Post_sql_data->Comments,
					'Post_Paid_Promotion' => trim($Post_sql_data->Paid_Promotion),
					'Post_Date_Time' => $this->Controller->getDateF($Post_sql_data->Date_Time)." (".$this->Controller->time_elapsed_string($Post_sql_data->Date_Time).")",
					'LikeAndDislike' => $LikeAndDislike,
					'ArticleBookmark' => $ArticleBookmark,
					'ChannelJoined' => $ChannelJoined,

					//category data

					'Post_Category_Name' => $Category_sql_data->Category_Name,
					'Post_Category_Id' => $Post_sql_data->Category_Id,

					//channel data

					'Channel_Url' => $Channel_sql_data->Url,
					'Channel_C_Date' => $this->Controller->getDateF($Channel_sql_data->C_Date),
					'Channel_Name' => ($Channel_sql_data->L_Name == ".") ? $Channel_sql_data->F_Name : $Channel_sql_data->F_Name." ".$Channel_sql_data->L_Name,
					'Channel_Logo' => $Channel_sql_data->Channel_Logo,

					//country data

					'Channel_Country_Name' => $countries_sql_data->country_name,
					
					//joiner data

					'Channel_Joiner' => $this->Controller->number_format_short($joiner_sql_data),

					//post data

					'Channel_Posts' => $Channel_post_sql_data,

					//views data

					'Channel_Views' => $C_views_sql_data,
					'Post_Views' => $P_views_sql_data,


					// like_dislike data

					'Post_Like' => $P_Count_Like,
					'Post_Dislike' => $P_Count_Dislike,
					'Channel_Popularity' => ($C_Count_Like - $C_Count_Dislike)*10,

					//achievement data

					'Achievement_Point' => $Points_sql_data->Points_sum,
					'Achievement_Rank' =>  intval(($Points_sql_data->Points_sum / $Point_Rank_sql_data->Points_sum)  * 100),

					//tages data

					'Post_Tags' => $Post_tags
				];
			return $PostData;
		}

		public function likeDislikeNow($data)
		{
			if(!isset($_SESSION['User_Id'])){
				$return_data['Like'] = 0;
				$return_data['Dislike'] = 0;
				$return_data['msg'] = '';
				$return_data = json_encode($return_data);
				die($return_data);
			}elseif ($data[0] == 1) {
				$this->db->query('SELECT Like_Dislike FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
				$this->db->bind(':Post_Url',$data[1]);
				$this->db->bind(':User_Url',$_SESSION['User_Id']);

				$Sql_Data_size = count($this->db->resultSet());
				if ($Sql_Data_size == 0) {
					$this->db->query('INSERT INTO `like_dislike`(`Post_Url`, `Channel_Url`, `Like_Dislike`, `User_Url`) VALUES (:Post_Url,:Channel_Url,:Like_Dislike,:User_Url)');
					$this->db->bind(':Like_Dislike', 1);
					$this->db->bind(':Post_Url', $data[1]);
					$this->db->bind(':Channel_Url', $data[2]);
					$this->db->bind(':User_Url', $_SESSION['User_Id']);
					if ($this->db->execute()) {
						//get like
						$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
						$this->db->bind(':Post_Url',$data[1]);
						$return_data['Like'] = count($this->db->resultSet());
						//get dislike
						$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
						$this->db->bind(':Post_Url',$data[1]);
						$return_data['Dislike'] = count($this->db->resultSet());

						$return_data['msg'] = 'LIKE';
						$return_data = json_encode($return_data);
						die($return_data);
					}
				}else{
					$Sql_Data = $this->db->single();
					if ($Sql_Data->Like_Dislike == 0) {
						$this->db->query('UPDATE like_dislike SET Like_Dislike = :Like_Dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
						$this->db->bind(':Post_Url',$data[1]);
						$this->db->bind(':Like_Dislike',1);
						$this->db->bind(':User_Url',$_SESSION['User_Id']);
						if ($this->db->execute()) {
							//get like
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);

							$return_data['Like'] = count($this->db->resultSet());
							//get dislike
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Dislike'] = count($this->db->resultSet());

							$return_data['msg'] = 'LIKENOW';
							$return_data = json_encode($return_data);
							die($return_data);
						}
					}else{
						$this->db->query('DELETE FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
						$this->db->bind(':Post_Url',$data[1]);
						$this->db->bind(':User_Url',$_SESSION['User_Id']);
						if ($this->db->execute()) {
							//get like
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Like'] = count($this->db->resultSet());
							//get dislike
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Dislike'] = count($this->db->resultSet());

							$return_data['msg'] = 'UNSET';
							$return_data = json_encode($return_data);
							die($return_data);
						}
					}
				}
			}else{
				$this->db->query('SELECT Like_Dislike FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
				$this->db->bind(':Post_Url',$data[1]);
				$this->db->bind(':User_Url',$_SESSION['User_Id']);

				$Sql_Data_size = count($this->db->resultSet());
				if ($Sql_Data_size == 0) {
					$this->db->query('INSERT INTO like_dislike(Post_Url, Channel_Url, Like_Dislike, User_Url) VALUES(:Post_Url, :Channel_Url, :Like_Dislike, :User_Url)');
					$this->db->bind(':Like_Dislike', 0);
					$this->db->bind(':Post_Url', $data[1]);
					$this->db->bind(':Channel_Url', $data[2]);
					$this->db->bind(':User_Url', $_SESSION['User_Id']);
					if ($this->db->execute()) {
						//get like
						$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
						$this->db->bind(':Post_Url',$data[1]);
						$return_data['Like'] = count($this->db->resultSet());
						//get dislike
						$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
						$this->db->bind(':Post_Url',$data[1]);
						$return_data['Dislike'] = count($this->db->resultSet());

						$return_data['msg'] = 'DISLIKE';
						$return_data = json_encode($return_data);
						die($return_data);
					}
				}else{
					$Sql_Data = $this->db->single();
					if ($Sql_Data->Like_Dislike == 1) {
						$this->db->query('UPDATE like_dislike SET Like_Dislike = :Like_Dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
						$this->db->bind(':Post_Url',$data[1]);
						$this->db->bind(':Like_Dislike',0);
						$this->db->bind(':User_Url',$_SESSION['User_Id']);
						if ($this->db->execute()) {
							//get like
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Like'] = count($this->db->resultSet());
							//get dislike
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Dislike'] = count($this->db->resultSet());

							$return_data['msg'] = 'DISLIKENOW';
							$return_data = json_encode($return_data);
							die($return_data);
						}
					}else{
						$this->db->query('DELETE FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
						$this->db->bind(':Post_Url',$data[1]);
						$this->db->bind(':User_Url',$_SESSION['User_Id']);
						if ($this->db->execute()) {
							//get like
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Like'] = count($this->db->resultSet());
							//get dislike
							$this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
							$this->db->bind(':Post_Url',$data[1]);
							$return_data['Dislike'] = count($this->db->resultSet());

							$return_data['msg'] = 'UNSET';
							$return_data = json_encode($return_data);
							die($return_data);
						}
					}
				}
			}
		}

		public function channelJoinAndLeft($data)
		{
			if(!isset($_SESSION['User_Id'])){
				$return_data['msg'] = '';
				$return_data = json_encode($return_data);
				die($return_data);
			}else{
				$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Channel_Url AND User_Url = :User_Url');
				$this->db->bind(':Channel_Url',$data);
				$this->db->bind(':User_Url',$_SESSION['User_Id']);
				$NumOfRow = count($this->db->resultSet());

				if ($NumOfRow == 0) {
					$this->db->query('INSERT INTO joiner (Channel_Url, User_Url) VALUES (:Channel_Url, :User_Url)');
					$this->db->bind(':Channel_Url',$data);
					$this->db->bind(':User_Url',$_SESSION['User_Id']);
					if ($this->db->execute()) {
						//get channel joiner
						$this->db->query('SELECT Id FROM joiner  WHERE  Channel_Url = :Channel_Url');
						$this->db->bind(':Channel_Url',$data);
						$return_data['Joiner'] = count($this->db->resultSet());

						$return_data['msg'] = 'JOIN';
						//retourn data
						$return_data = json_encode($return_data);
						die($return_data);
					}
				}else {
					$this->db->query('DELETE FROM joiner WHERE Channel_Url = :Channel_Url AND User_Url = :User_Url');
					$this->db->bind(':Channel_Url',$data);
					$this->db->bind(':User_Url',$_SESSION['User_Id']);
					if ($this->db->execute()) {
						//get channel joiner
						$this->db->query('SELECT Id FROM joiner  WHERE  Channel_Url = :Channel_Url');
						$this->db->bind(':Channel_Url',$data);
						$return_data['Joiner'] = count($this->db->resultSet());

						$return_data['msg'] = 'LEFT';
						//retourn data
						$return_data = json_encode($return_data);
						die($return_data);
					}
				}
			}
		}
		public function articlsBookmar($data)
		{
			if(!isset($_SESSION['User_Id'])){
				$return_data['msg'] = '';
				$return_data = json_encode($return_data);
				die($return_data);
			}else{
				$this->db->query('SELECT Id FROM bookmark WHERE Post_Url = :Post_Url AND User_Url = :User_Url');
				$this->db->bind(':Post_Url',$data);
				$this->db->bind(':User_Url',$_SESSION['User_Id']);
				$NumOfRow = count($this->db->resultSet());

				if ($NumOfRow == 0) {
					$this->db->query('INSERT INTO bookmark (Post_Url, User_Url) VALUES (:Post_Url, :User_Url)');
					$this->db->bind(':Post_Url',$data);
					$this->db->bind(':User_Url',$_SESSION['User_Id']);
					if ($this->db->execute()) {

						$return_data['msg'] = 'BOOKMARK';
						//retourn data
						$return_data = json_encode($return_data);
						die($return_data);
					}
				}else {
					$this->db->query('DELETE FROM bookmark WHERE Post_Url = :Post_Url AND User_Url = :User_Url');
					$this->db->bind(':Post_Url',$data);
					$this->db->bind(':User_Url',$_SESSION['User_Id']);
					if ($this->db->execute()) {

						$return_data['msg'] = 'REMOVE';
						//retourn data
						$return_data = json_encode($return_data);
						die($return_data);
					}
				}
			}
		}
	public function addComments($data)
		{
			if(!isset($_SESSION['User_Id'])){
				$return_data['msg'] = '';
				$return_data = json_encode($return_data);
				die($return_data);
			}else{
				$this->db->query('INSERT INTO comments (Channel_Url, Post_Url, User_Url, Comments) VALUES (:Channel_Url, :Post_Url, :User_Url, :Comments)');
				$this->db->bind(':Comments',$data[0]);
				$this->db->bind(':Post_Url',$data[1]);
				$this->db->bind(':Channel_Url',$data[2]);
				$this->db->bind(':User_Url',$_SESSION['User_Id']);
				if ($this->db->execute()) {
					$return_data['Comments_List'] = $this->getAllCommentsByPost([$data[1],$data[0]]);
					$return_data['msg'] = 'COMMENTS';
					$return_data = json_encode($return_data);
					die($return_data);
				}
			}
		}

	public function addReport($data)
	{
		if(!isset($_SESSION['User_Id'])){
			$return_data['msg'] = '';
			$return_data = json_encode($return_data);
			die($return_data);
		}else{
			$this->db->query('INSERT INTO report (Channel_Url, Post_Url, User_Url, Report) VALUES (:Channel_Url, :Post_Url, :User_Url, :Report)');
			$this->db->bind(':Report',$data[0]);
			$this->db->bind(':Post_Url',$data[1]);
			$this->db->bind(':Channel_Url',$data[2]);
			$this->db->bind(':User_Url',$_SESSION['User_Id']);
			if ($this->db->execute()) {
				$return_data['msg'] = 'REPORTED';
				$return_data = json_encode($return_data);
				die($return_data);
			}
		}
	}
	public function getAllCommentsByPost($data)
	{
		if (!isset($data[0])) {
			return '';
		}elseif (empty($data[0])){
			return '';
		}else{
			$this->db->query('SELECT Url FROM post WHERE Url = :Url');
			$this->db->bind(':Url', $data[0]);
			$check_data = count($this->db->resultSet());
			if ($check_data == 0) {
				return '';
			}
		$this->db->query('SELECT Comments FROM post WHERE Url = :Url');
		$this->db->bind(':Url', $data[0]);
		$Cdata = $this->db->single();
		if ($Cdata->Comments == 1) {
			$this->db->query('SELECT User_Url, C_Date, Comments FROM comments WHERE Post_Url = :Post_Url ORDER BY C_Date DESC');
			$this->db->bind(':Post_Url', $data[0]);
			$Comments = $this->db->resultSet();

			$Comment_Data = '';
			foreach ($Comments as $key => $value) {

				$this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Url');
				$this->db->bind(':Url', $value->User_Url);
				$user_data = $this->db->single();
				$Comment_Data .='
					<div style="display: flex; margin: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--lit-bgt-color); ">
						<div style="width: 7%; margin-right: 1rem;">
							<img style="border-radius: 0.4rem; width: 2.5rem; height: 2.5rem;" src="/images/'.$user_data->Channel_Logo.'">
						</div>
						<div>
							<p style="font-size: 1.4rem; font-weight: 650;"> '.$this->Controller->getChannelName($user_data->F_Name,$user_data->L_Name).' • '.$this->Controller->time_elapsed_string($value->C_Date).' </p>
							<p style="font-size: 1.4rem;">'.$value->Comments.'</p>
						</div>
					</div>';
			}
			return $Comment_Data;
		}else{
			return '';
		}
	}
	}
}
?>