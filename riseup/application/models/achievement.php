<?php 
class achievement
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getAchievementList()
	{
		//achievement_data

		$this->db->query('SELECT * FROM achievement ');
		$All_Achievement = $this->db->resultSet();

		$Achievement_data = "";
		foreach ($All_Achievement as $key => $value) {
			$A_Comuplite = 0;
			$this->db->query('SELECT Achievement_Id FROM achievement_data WHERE Channel_Url = :Url AND Achievement_Id = :Id');
			$this->db->bind(':Url', $_SESSION['User_Id']);
			$this->db->bind(':Id', $value->Id);
			$A_C_Data = count($this->db->resultSet());
			if ($A_C_Data != 0) {
					$A_Comuplite = 1;
			}
			if($A_Comuplite == 0){
				$Enable = 0;
					eval($value->Logical_Part);
					$data_list = ($Enable == 1) ? '<a class="btn-list" href="/achievements/getAchievementByUser/'.$value->Id.'">Collect</a>' : '<p class="list-item-r">Remaining</p>' ;
					$Achievement_data .='
          <div class="lit-channel-home-Achievement-item a_item">
          <div class="list-div">
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
              </div>
              <div class="lit-channel-ach-btn">
              	'.$data_list.'
              </div>
          </div>';
			}else{
				$Achievement_data .='
          <div class="lit-channel-home-Achievement-item a_item">
          <div class="list-div">
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
              </div>
              <div class="lit-channel-ach-btn">
              	<p class="list-item-c">Collected</p>
              </div>
          </div>';
			}
			
		}

		$data_a = [
			'Achievement_List' => $Achievement_data
		];
		return $data_a;
	}
	public function insertAchievementByUser($data)
	{
		$this->db->query('SELECT Id FROM achievement WHERE Id = :Id');
		$this->db->bind(':Id', trim($data));
		if (count($this->db->resultSet()) > 0) {
			$this->db->query('SELECT Id FROM achievement_data WHERE Achievement_Id  = :Id');
			$this->db->bind(':Id', $data);
			if (count($this->db->resultSet()) <= 1) {
				$this->db->query('INSERT INTO achievement_data (Channel_Url,Achievement_Id) VALUES (:Url,:Id)');
			$this->db->bind(':Id', $data);
			$this->db->bind(':Url', $_SESSION['User_Id']);
			if ($this->db->execute()) {
				header("location: /feed/achievement");
			}
			}else{
				header("location: /feed/home");
			}
		}else{
			header("location: /feed/home");
		}
	}
	public function getAchievementAllData()
	{
		return $this->getAchievementList();
	}
}
 ?>