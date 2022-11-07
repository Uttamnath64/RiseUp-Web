<?php
class home
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getMainData()
	{
		$this->db->query('SELECT user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image, post.Date_Time FROM post INNER JOIN user_account ON user_account.Url = post.Channel_Url WHERE post.Visibility = "PU"');
		$home_data = $this->db->resultSet();

		$home_view = "";
		$home_data = $this->Controller->getRandData($home_data,count($home_data));
		
		foreach ($home_data as $key => $value) {

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url', $value->Url);
			$views_data = count($this->db->resultSet());

			$home_view .='
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
							<p>'.$this->Controller->number_format_short($views_data).' Views • upload on '.$this->Controller->time_elapsed_string($value->Date_Time).'</p>
						</div>
					</div>
				</div>
			</div>
			</a>';
		}
		$Home_data = [
			'Home_Data' => $home_view,
		];
		return $Home_data;
	}
	public function getHomeAllData($value='')
	{
		return $this->getMainData();
	}
}
?>