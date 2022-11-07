<?php

class joined
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function selectjoinedChannel($data)
	{
		//get channel data
		$this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Channel_Url');
		$this->db->bind(':Channel_Url', $data);
		$channel_data = $this->db->single();

		//get channel jonner count

		$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
		$this->db->bind(':Url', $channel_data->Url);
		$channel_joiner = count($this->db->resultSet());

		//get channel articles
		$this->db->query('SELECT Date_Time, Url, Title, Visibility, Image FROM post WHERE Visibility = "PU" AND Channel_Url  = :Url ORDER BY `Date_Time` DESC');
		$this->db->bind(':Url', trim($channel_data->Url));
		$Channel_Article = $this->db->resultSet();

		$Channel_Article_view = "";
		foreach ($Channel_Article as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$Channel_Article_view .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div >
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
						<img class="lit-lithome-contant-logo" src="/images/'.$channel_data->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($channel_data
								->F_Name, $channel_data->L_Name).'</p>
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
		if ($Channel_Article_view == "") {

			$Channel_Article_view ='<div style="text-align:center; width: 100%;"><p style="margin: 1rem 0; color: var(--lit-color-dec); "> Channel not have any articles! </p></div>';

		}

		$Joined_Data = [
			'Joined_Id' => $channel_data->Url,
			'Joined_Channel_Name' => $this->Controller->getChannelName($channel_data->F_Name,$channel_data->L_Name),
			'Joined_Channel_Logo' => $channel_data->Channel_Logo,
			'Joined_Channel_Joiner' => $this->Controller->number_format_short($channel_joiner),
			'Joined_Channel_Articles' => $Channel_Article_view,
			'File_Name' => 'JoinedChannelView.php'
		];
		return $Joined_Data;

	}

	public function getJoinedAllChannel()
	{
		$this->db->query('SELECT Channel_Url FROM joiner WHERE User_Url = :User_Url');
		$this->db->bind(':User_Url', $_SESSION['User_Id']);
		$joiner_data = $this->db->resultSet();

		$joined_channel_view = "";
		foreach ($joiner_data as $key => $value) {
			$this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Channel_Url');
			$this->db->bind(':Channel_Url', $value->Channel_Url);
			$channel_data = $this->db->single();

			$joined_channel_view .='
			<a href="'.URLROOT.'/feed/joined/'.$channel_data->Url.'" class="lit-library-opsion-bar-item lit-library-opsion-bar-item-list lit-joined-opsion-bar-item-list id'.$channel_data->Url.'">

				<img src="/images/'.$channel_data->Channel_Logo.'">
				<p>'.$this->Controller->getChannelName($channel_data->F_Name,$channel_data->L_Name).'</p>
			</a>';
		}
		$Joined_Data = [
			'Joined_Channel_item' => $joined_channel_view
		];
		return $Joined_Data;
	}
	public function selectChannelsDatas()
	{
		//get channel by articles

		$this->db->query('SELECT post.Date_Time, post.Url, post.Title, post.Image, post.Channel_Url FROM post INNER JOIN joiner ON joiner.Channel_Url = post.Channel_Url WHERE Visibility = "PU" AND post.Channel_Url  = :Url ORDER BY Date_Time DESC');
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$Joined_All_Article_main = $this->db->resultSet();

		$Joined_All_Article = "";
		foreach ($Joined_All_Article_main as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$this->db->query('SELECT Url,Channel_Logo
			,F_Name,L_Name FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url', $value->Channel_Url);
			$channel_data = $this->db->single();
			$Joined_All_Article .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div >
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
						<img class="lit-lithome-contant-logo" src="/images/'.$channel_data->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($channel_data
								->F_Name, $channel_data->L_Name).'</p>
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

		if ($Joined_All_Article == "") {

			$Joined_All_Article ='<div style="text-align:center; width: 100%;"><p style="margin: 1rem 0; color: var(--lit-color-dec); "> You not join any Channel! </p></div>';

		}
		$Joined_Data = [
			'Joined_All_Article' => $Joined_All_Article,
			'File_Name' => 'joined.php'
		];
		return $Joined_Data;
	}
	public function getJoinedAllDataView($data)
	{
		if (isset($data[0])) {
			$this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Channel_Url AND User_Url = :User_Url');
			$this->db->bind(':Channel_Url', $data[0]);
			$this->db->bind(':User_Url', $_SESSION['User_Id']);
			$check_channel = count($this->db->resultSet());
			if ($check_channel > 0) {
				return array_merge($this->selectjoinedChannel($data[0]),$this->getJoinedAllChannel());
			}
		}else{
			return array_merge($this->selectChannelsDatas(),$this->getJoinedAllChannel());
		}
	}
}
?>