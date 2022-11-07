<?php
class Search
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function mainSearchBar()
	{
		$data = $_POST['search_query'];
		$this->db->query('SELECT * FROM post WHERE Title LIKE :Search OR Article LIKE :Search OR Url LIKE :Search OR Image LIKE :Search OR Channel_Url LIKE :Search ');
		$this->db->bind(':Search',"%".$data."%");
		$Sql_Data = $this->db->resultSet();

		$Search_data = '';
		foreach ($Sql_Data as $key => $value) {
			$this->db->query('SELECT F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Url ');
			$this->db->bind(':Url',$value->Channel_Url);
			$user_data = $this->db->single();

			$this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
			$this->db->bind(':Url',$value->Url);
			$Views = count($this->db->resultSet());

			$Search_data .='
			<a class="lit-lithome-main" href="'.URLROOT.'/feed/article/'.$value->Url.'">
			<div>
				<div class="lit-lithome-contant">
					<img class="lit-lithome-contant-img" src="/images/'.$value->Image.'">
					<div class="lit-lithome-contant-logo-div">
							<img class="lit-lithome-contant-logo" src="/images/'.$user_data->Channel_Logo.'">
					</div>
					<div class="lit-lithome-contant-main">
						<div class="lit-lithome-contant-channel">
							<p>'.$this->Controller->getChannelName($user_data
								->F_Name, $user_data->L_Name).'</p>
						</div>
						<div class="lit-lithome-contant-title">
							<p>'.$value->Title.'</p>
						</div>
						<div class="lit-lithome-contant-view-date">
							<p>'.$this->Controller->number_format_short($Views).' Views • Read on '.$this->Controller->time_elapsed_string($value->Date_Time).'</p>
						</div>
					</div>
				</div>
			</div>
			</a>';
		}
		if ($Search_data == '') {
			$Search_data = '<p style="margin: 2rem auto;">Data Not Found!</>';
		}
		$Search_data = [
			'Home_Data' => $Search_data,
			'search_query' => $data
		];
		return $Search_data;
	}


	
}
?>