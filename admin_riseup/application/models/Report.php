<?php
class Report 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getReports()
	{
		$this->db->query("SELECT * FROM report ORDER BY `C_Date` DESC");
		$report_data = $this->db->resultSet();
		$report_list = '';
		foreach ($report_data as $key => $value) {

			//user name

			$this->db->query('SELECT Image,Title FROM post WHERE Url = :Url');
			$this->db->bind(':Url', $value->Post_Url);
			$Post_data = $this->db->single();

			//user name

			$this->db->query('SELECT F_Name,L_Name FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url', $value->User_Url);
			$User_Name = $this->db->single();

			//channel name

			$this->db->query('SELECT F_Name,L_Name FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url', $value->Channel_Url);
			$Channel_Name = $this->db->single();

			$Report_Name = "";
			switch ($value->Report) {
				case 'R1':
					$Report_Name = "Sexual content";
					break;
				case 'R2':
					$Report_Name = "Violent or repulsive content";
					break;
				case 'R3':
					$Report_Name = "Hateful or abusive content";
					break;
				case 'R4':
					$Report_Name = "Harmful or dangerous acts";
					break;
				case 'R5':
					$Report_Name = "Spam or misleading";
					break;
				
				default:
					$Report_Name = "";
					break;
			}

			$report_list .='
					<tr>
						<td><div class="lit-notifi-img" style="width: 100%; margin: 0.5rem 0;">
					<img src="http://riseup.lit/images/'.$Post_data->Image.'">
				</div></td>
						<td><div class="lit-lithome-contant-title"><p style="-webkit-line-clamp:1 !important;" >'.$Post_data->Title.'</p>
						<p style="-webkit-line-clamp:1 !important; font-weight: 500; margin-top: -0.7rem">By '.$this->Controller->getChannelName($Channel_Name->F_Name,$Channel_Name->L_Name).'</p></div></td>
						<td><p>'.$this->Controller->getDateF($value->C_Date).'</p></td>
						<td>'.$this->Controller->getChannelName($User_Name->F_Name,$User_Name->L_Name).'</td>
						<td>'.$Report_Name.'</td>';
		}
		if ($report_list == '') {
			$report_list = '<div style="text-align: center; width:100%; margin-top: 2rem;">Report not found!</div>';
		}
		$Report = [
			'Report_List' => $report_list
		];
		return $Report;
	}

}
?>