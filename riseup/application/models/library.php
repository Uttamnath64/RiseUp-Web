<?php
class library 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function selectLibraryFile($data)
	{
		if ($data[0] == "history") {
			return $this->getLibraryHistory();
		}elseif ($data[0] == "your_article") {
			return $this->getLibraryArticle();
		}elseif ($data[0] == "bookmark") {
			return $this->getLibraryBookmark();
		}elseif ($data[0] == "liked_article") {
			return $this->getLibraryLiked();
		}elseif ($data[0] == "articleList"){
			return $this->getLibraryArticleList($data[1]);
		}else{
			return $this->getLibraryHistory();
		}
	}

	public function getLibraryHistory()
	{
		// history data
		$this->db->query('SELECT views.C_Date, user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image FROM (( user_account INNER JOIN views ON user_account.Url = views.Channel_Url ) INNER JOIN post ON post.Url = views.Post_Url) WHERE (post.Visibility = "PU" OR post.Visibility = "PR") AND views.User_Url  = :Url  ORDER BY views.C_Date DESC');
		$this->db->bind(':Url', trim($_SESSION['User_Id']));
		$history_data = $this->db->resultSet();
//echo "<pre>";
//print_r($history_data);
		$history_view = "";
		
		foreach ($history_data as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$history_view .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div>
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
							<img class="lit-lithome-contant-logo" src="/images/'.$value->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($value
								->F_Name, $value->L_Name).'</p>
						</div>
						<div class="lit-lithome-contant-title">
							<p>'.$value->Title.'</p>
						</div>
						<div class="lit-lithome-contant-view-date">
							<p>'.$this->Controller->number_format_short($views_data).' Views • Read on '.$this->Controller->time_elapsed_string($value->C_Date).'</p>
						</div>
					</div>
				</div>
			</div>
			</a>';
		}
		$library_data = [
			'history_data' => $history_view,
			'File_Name' => 'history.php'
		];
		return $library_data;
	}

	public function getLibraryArticle()
	{
		// channel article data
		$this->db->query('SELECT post.Url, post.Title, post.Image, post.Date_Time FROM post WHERE post.Channel_Url = :Url ORDER BY post.Date_Time DESC');
		$this->db->bind(':Url', trim($_SESSION['User_Id']));
		$article_data = $this->db->resultSet();


		// channel data
		$this->db->query('SELECT F_Name,L_Name,Channel_Logo FROM user_account  WHERE Url = :Url');
		$this->db->bind(':Url', trim($_SESSION['User_Id']));
		$channel_sql_data = $this->db->single();
		
		$article_view = "";
		foreach ($article_data as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$article_view .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div >
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
						<img class="lit-lithome-contant-logo" src="/images/'.$channel_sql_data->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($channel_sql_data
								->F_Name, $channel_sql_data->L_Name).'</p>
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
		$library_data = [
			'article_data' => $article_view,
			'File_Name' => 'Article.php'
		];
		return $library_data;
	}
	public function getLibraryBookmark()
	{
		// history data
		$this->db->query('SELECT bookmark.C_Date, user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image FROM (( bookmark INNER JOIN user_account ON user_account.Url = bookmark.User_Url ) INNER JOIN post ON post.Url = bookmark.Post_Url) WHERE (post.Visibility = "PU" OR post.Visibility = "PR") AND bookmark.User_Url  = :Url');
		$this->db->bind(':Url', trim($_SESSION['User_Id']));
		$bookmark_data = $this->db->resultSet();
//echo "<pre>";
//print_r($history_data);
		$bookmark_view = "";
		foreach ($bookmark_data as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$bookmark_view .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div >
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
						<img class="lit-lithome-contant-logo" src="/images/'.$value->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($value
								->F_Name, $value->L_Name).'</p>
						</div>
						<div class="lit-lithome-contant-title">
							<p>'.$value->Title.'</p>
						</div>
						<div class="lit-lithome-contant-view-date">
							<p>'.$this->Controller->number_format_short($views_data).' Views • Bookmark on '.$this->Controller->time_elapsed_string($value->C_Date).'</p>
						</div>
					</div>
				</div>
			</div>
			</a>';
		}
		$library_data = [
			'bookmark_data' => $bookmark_view,
			'File_Name' => 'Bookmark.php'
		];
		return $library_data;
	}
	public function getLibraryLiked()
	{
		// history data
		$this->db->query('SELECT like_dislike.C_Date, user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image FROM (( like_dislike INNER JOIN user_account ON user_account.Url = like_dislike.Channel_Url ) INNER JOIN post ON post.Url = like_dislike.Post_Url) WHERE (post.Visibility = "PU" OR post.Visibility = "PR") AND like_dislike.Like_Dislike = 1 AND like_dislike.User_Url  = :Url');
		$this->db->bind(':Url', trim($_SESSION['User_Id']));
		$liked_data = $this->db->resultSet();
//echo "<pre>";
//print_r($history_data);
		$liked_view = "";
		foreach ($liked_data as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$liked_view .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div >
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
						<img class="lit-lithome-contant-logo" src="/images/'.$value->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($value
								->F_Name, $value->L_Name).'</p>
						</div>
						<div class="lit-lithome-contant-title">
							<p>'.$value->Title.'</p>
						</div>
						<div class="lit-lithome-contant-view-date">
							<p>'.$this->Controller->number_format_short($views_data).' Views • Liked on '.$this->Controller->time_elapsed_string($value->C_Date).'</p>
						</div>
					</div>
				</div>
			</div>
			</a>';
		}
		$library_data = [
			'liked_data' => $liked_view,
			'File_Name' => 'Article_Like.php'
		];
		return $library_data;
	}
	public function getLibraryAllDataView($data)
	{
		if (!isset($data[0])) {
			return $this->selectLibraryFile("history");
		}else{
			return $this->selectLibraryFile($data);
		}
	}
}
?>