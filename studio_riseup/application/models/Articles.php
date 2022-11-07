<?php
class Articles 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getArticles()
	{
		$this->db->query("SELECT Url ,Title,Visibility,Image,Date_Time FROM post WHERE Channel_Url = :Url ORDER BY `Date_Time` DESC");
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$post_data = $this->db->resultSet();
		$Post_List = '';
		foreach ($post_data as $key => $value) {

			// count like of post
			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $value->Url);
			$Post_Like = count($this->db->resultSet());

			//count dislike of post

			$this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $value->Url);
			$Post_Dislike = count($this->db->resultSet());

			//count comments of post

			$this->db->query('SELECT Id FROM comments WHERE Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $value->Url);
			$Post_Comments = count($this->db->resultSet());

			//count views of post

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Post_Url');
			$this->db->bind(':Post_Url', $value->Url);
			$Post_Views = count($this->db->resultSet());

			if ($value->Visibility == "PU") {
				$Visibility = 'Published';
			}elseif ($value->Visibility == 'PR') {
				$Visibility = 'Private';
			}else{
				$Visibility = 'Unlisted';
			}

			$Post_List .='
					<tr>
						<td><div class="lit-notifi-img" style="width: 100%; margin: 0.5rem 0;">
					<img src="http://riseup.lit/images/'.$value->Image.'">
				</div></td>
						<td><div class="lit-lithome-contant-title"><p >'.$value->Title.'</p></div></td>
						<td><p>'.$this->Controller->getDateF($value->Date_Time).'</p><p>'.$Visibility.'</p></td>
						<td>'.$this->Controller->number_format_short($Post_Views).'</td>
						<td>'.$this->Controller->number_format_short($Post_Comments).'</td>
						<td>'.$this->Controller->number_format_short($Post_Like).' Likes (vs '.$this->Controller->number_format_short($Post_Dislike).')</td>
						<td>
							<div class="slit-at-btn-div">
								<a href="/feed/Article/'.$value->Url.'/edit"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg></a>
								<a href="/feed/Article/'.$value->Url.'/analytics"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></svg></a>
								<a href="/feed/Article/'.$value->Url.'/comments"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM20 4v13.17L18.83 16H4V4h16zM6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"/></svg></a>
								<a href="'.RISEUP.'/feed/Article/'.$value->Url.'"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><g><path d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z"/></g><path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z"/></g></svg></a>
								<a href="/article/deleteArticle/'.$value->Url.'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg></a>
							</div>
						</td>
					</tr>';
		}
		if ($Post_List == '') {
			$Post_List = '<div style="text-align: center; width:100%; margin-top: 2rem;">Channel not have any articles!</div>';
		}
		$Articles = [
			'Article_List' => $Post_List
		];
		return $Articles;
	}

	public function getArticlesList()
	{
		return $this->getArticles();
	}

}
?>