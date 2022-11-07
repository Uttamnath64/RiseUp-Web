<?php
/**
 * 
 */
class Achievement 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function editAchievementData($data)
	{
		if (!isset($data[0])) {
			header("location: /feed/Dashboard");
		}else{
			$this->db->query('SELECT * FROM achievement WHERE Id = :Id');
			$this->db->bind(':Id',$data[0]);
			$achievement_data = $this->db->single();

			$achievement_data = [
				'Id' => $achievement_data->Id,
				'Name' => $achievement_data->Achievement_Name,
				'Points' => $achievement_data->Points,
				'Description' => $achievement_data->Description,
				'Icon' => $achievement_data->Achievement_Icon,
				'Logical' => $achievement_data->Logical_Part
			];
			return $achievement_data;
		}
	}
	public function EditAchievementNow($data)
	{
		$this->db->query('UPDATE achievement SET Achievement_Name = :Name, Description = :Description, Logical_Part = :Logical, Points = :Points, Achievement_Icon = :Icon WHERE Id = :Id');
		$this->db->bind(':Id',$data[0]);
		$this->db->bind(':Name',$data[1]);
		$this->db->bind(':Points',$data[2]);
		$this->db->bind(':Description',$data[3]);
		$this->db->bind(':Icon',$data[4]);
		$this->db->bind(':Logical',$data[5]);
		if ($this->db->execute()) {
			header('location: /feed/Achievement');
		}else{
			header('location: /feed/Dashboard');
		}
	}

	public function deleteAchievementNow($data)
	{
		$this->db->query('DELETE FROM achievement WHERE Id = :Id');
		$this->db->bind(':Id', $data);
		if ($this->db->execute()) {
			header('location: /feed/Achievement');
		}else{
			header('location: /feed/Dashboard');
		}
	}

	public function addAchievementNow($data)
	{
		$this->db->query('INSERT INTO achievement(Achievement_Name,Description,Logical_Part,Points,Achievement_Icon) VALUES(:Name,:Description,:Logical,:Points,:Icon)');
		$this->db->bind(':Name',$data[0]);
		$this->db->bind(':Points',$data[1]);
		$this->db->bind(':Description',$data[2]);
		$this->db->bind(':Icon',$data[3]);
		$this->db->bind(':Logical',$data[4]);
		if ($this->db->execute()) {
			header('location: /feed/Achievement');
		}else{
			header('location: /feed/Dashboard');
		}
	}

	public function getAchievementListData()
	{
		$this->db->query('SELECT * FROM achievement');
		$Achievement_Data = $this->db->resultSet();

		$Data ='';
		foreach ($Achievement_Data as $key => $value) {

			$Data .='
					<tr>
						<td>'.$value->Id.'</td>
						<td><div class="lit-channel-home-Achievement-item-icon">'.$value->Achievement_Icon.'</div></td>
						<td><div class="lit-lithome-contant-title"><p>'.$value->Achievement_Name.'</p></div></td>
						<td><div class="lit-lithome-contant-title"><p>'.$value->Description.'</p></div></td>
						<td><div class="lit-lithome-contant-title"><p>'.$value->Logical_Part.'</p></div></td>
						<td>'.$value->Points.'</td>
						<td>
							<div class="slit-at-btn-div">
								<a href="/feed/AchievementEdit/'.$value->Id.'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path></svg></a>
								<a href="/Achievements/deleteAchievement/'.$value->Id.'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg></a>
							</div>
						</td>
					</tr>';
		}
		$Category = [
			'Achievement_List' => $Data
		];
		return $Category;
	}
}
?>