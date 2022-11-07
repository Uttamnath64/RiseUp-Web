<?php

class notification
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function selectnotificationChannel($data)
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
		$this->db->query('SELECT Post_Url, Date_Time, Channel_Url FROM notification WHERE  Channel_Url  = :Url ORDER BY `Date_Time` DESC');
		$this->db->bind(':Url', trim($channel_data->Url));
		$notification_channel_data = $this->db->resultSet();

		$Channel_notifi_view = "";
		foreach ($notification_channel_data as $key => $value) {

			$this->db->query('SELECT Url,Title,Image FROM post WHERE Url = :Url');
			$this->db->bind(':Url', $value->Post_Url);
			$post_data = $this->db->single();

			$Channel_notifi_view .='
			<a href="/feed/article/'.$post_data->Url.'" class="lit-notifi-main">
				<div class="lit-notifi-main-div">
					<div class="lit-notifi-img">
						<img src="/images/'.$post_data->Image.'">
					</div>
					<div class="lit-notifi-data">
						<div class="lit-notifi-top">
							<div class="lit-notifi-channel-name">
								<p>'.$this->Controller->getChannelName($channel_data->F_Name,$channel_data->L_Name).'</p>
							</div>
							<div class="lit-notifi-post-time">
								<p>'.$this->Controller->time_elapsed_string($value->Date_Time).'</p>	
							</div>
						</div>
						<div class="lit-notifi-post-title">
							<p>'.$post_data->Title.'</p>
						</div>
					</div>
				</div>
			</a>';
		}
		if ($Channel_notifi_view == "") {

			$Channel_notifi_view ='<div style="text-align:center; width: 100%;"><p style="margin: 1rem 0; color: var(--lit-color-dec); "> Channel not have any notification! </p></div>';

		}

		$Joined_Data = [
			'Joined_Id' => $channel_data->Url,
			'Joined_Channel_Name' => $this->Controller->getChannelName($channel_data->F_Name,$channel_data->L_Name),
			'Joined_Channel_Logo' => $channel_data->Channel_Logo,
			'Joined_Channel_Joiner' => $this->Controller->number_format_short($channel_joiner),
			'Joined_Channel_Articles' => $Channel_notifi_view,
			'File_Name' => 'notification_channel.php'
		];
		return $Joined_Data;

	}

	public function getnotificationAllChannel()
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
			<a href="'.URLROOT.'/feed/notification/'.$channel_data->Url.'" class="lit-library-opsion-bar-item lit-library-opsion-bar-item-list lit-joined-opsion-bar-item-list id'.$channel_data->Url.'">

				<img src="/images/'.$channel_data->Channel_Logo.'">
				<p>'.$this->Controller->getChannelName($channel_data->F_Name,$channel_data->L_Name).'</p>
			</a>';
		}
		$Joined_Data = [
			'Joined_Channel_item' => $joined_channel_view
		];
		return $Joined_Data;
	}
	public function selectChannelsnotification()
	{
		//get channel by articles

		$this->db->query('SELECT notification.Post_Url , notification.Channel_Url , notification.Date_Time FROM notification INNER JOIN joiner ON joiner.Channel_Url = notification.Channel_Url WHERE notification.Channel_Url  = :Url ORDER BY notification.Date_Time DESC');
		$this->db->bind(':Url', $_SESSION['User_Id']);
		$Joined_All_Article_main = $this->db->resultSet();

		$Joined_All_Article = "";
		foreach ($Joined_All_Article_main as $key => $value) {

			$this->db->query('SELECT Url,Title,Image FROM post WHERE Url = :Url');
			$this->db->bind(':Url', $value->Post_Url);
			$post_data = $this->db->single();

			$this->db->query('SELECT F_Name,L_Name FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url', $value->Channel_Url);
			$channel_data = $this->db->single();
			$Joined_All_Article .='
			<a href="/feed/article/'.$post_data->Url.'" class="lit-notifi-main">
				<div class="lit-notifi-main-div">
					<div class="lit-notifi-img">
						<img src="/images/'.$post_data->Image.'">
					</div>
					<div class="lit-notifi-data">
						<div class="lit-notifi-top">
							<div class="lit-notifi-channel-name">
								<p>'.$this->Controller->getChannelName($channel_data->F_Name,$channel_data->L_Name).'</p>
							</div>
							<div class="lit-notifi-post-time">
								<p>'.$this->Controller->time_elapsed_string($value->Date_Time).'</p>	
							</div>
						</div>
						<div class="lit-notifi-post-title">
							<p>'.$post_data->Title.'</p>
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
			'File_Name' => 'notification.php'
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
				return array_merge($this->selectnotificationChannel($data[0]),$this->getnotificationAllChannel());
			}
		}else{
			return array_merge($this->selectChannelsnotification(),$this->getnotificationAllChannel());
		}
	}
}
?>