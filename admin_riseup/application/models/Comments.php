<?php
	class Comments
	{
		
		function __construct()
		{
			$this->Controller = new Controller;
			$this->db = new Database;
		}

		public function getAllComments()
		{
			$this->db->query('SELECT Comments, Channel_Url,Post_Url,User_Url,C_Date  FROM comments ORDER BY C_Date DESC');
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
				<div style="display: flex; width: 90%; margin: 1rem auto; padding: 1rem; border: 1px solid var(--lit-bgt-color); border-radius: 0.4rem">
				<div style="display: flex; margin-bottom: 1rem; padding-bottom: 0.5rem; width: 60%; ">
				<div style="width: 7%; margin-right: 1rem;">
					<img style="border-radius: 0.4rem; width: 3rem; height: 3rem;" src="'.RISEUP.'/images/'.$user_data->Channel_Logo.'">
				</div>
				<div>
					<p style="font-size: 1.4rem; margin: 0.2rem 0; font-weight: 650;">'.$this->Controller->getChannelName($user_data
									->F_Name, $user_data->L_Name).' • '.$this->Controller->time_elapsed_string($value->C_Date).'</p>
					<p style="font-size: 1.4rem;">'.$value->Comments.'</p>
				</div>
			</div>
			<a style="display: flex; width: 40%;" href="/feed/Article/Comments/'.$value->Post_Url.'">
			<div class="lit-lithome-contant-title" style="display: flex; ">
				<div class="lit-notifi-img" style="width:35%; height: 5rem; margin: 0.5rem 0;">
					<img src="'.RISEUP.'/images/'.$post_data->Image.'">
				</div>
					<p style="width: 90%; margin-left: 1rem; height: 4rem;">'.$post_data->Title.'</p>
				</div></a>
			</div>';
			}
			$Home_data = [
				'Comments_List' => $home_view
			];
			return $Home_data;
		}
	}
?>