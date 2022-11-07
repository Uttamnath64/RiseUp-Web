<?php
class Customisation
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getChannelData()
	{
		
			$this->db->query('SELECT * FROM user_account WHERE Url = :Url');
			$this->db->bind(':Url',$_SESSION['User_Id']);
			$Channel_Data = $this->db->single();
			
			$ChannelData = [
				'Url' => $Channel_Data->Url,
				'F_Name' => $Channel_Data->F_Name,
				'L_Name' => $Channel_Data->L_Name,
				'Country_Id' => $Channel_Data->Country_Id ,
				'Mobile_Number' => $Channel_Data->Mobile_Number,
				'Email' => $Channel_Data->Email,
				'Gender' => $Channel_Data->Gender,
				'DOB' => $Channel_Data->DOB,
				'Channel_Logo' => $Channel_Data->Channel_Logo,
				'Description' => $Channel_Data->Description
			];
			return $ChannelData;
	}
	public function getCountryList()
    {
    	$this->db->query('SELECT * FROM countries');
    	return $this->db->resultSet();
    }
    public function getChannelAllData()
	{
		$this->db->query('SELECT * FROM user_account WHERE Url = :Url');
		$this->db->bind(':Url',$_SESSION['User_Id']);
		return $this->db->single();

	}
	public function editChannelData($accountData)
	{
		$this->db->query("UPDATE user_account SET F_Name = :F_Name, L_Name = :L_Name, Country_Id = :Country, Email = :Email, Gender = :Gender, DOB = :DOB, Channel_logo = :Channel_logo, Description = :Description WHERE user_account.Url = :Url ");
        $this->db->bind(':Url', $accountData['Url']);
        $this->db->bind(':F_Name', $accountData['F_Name']);
        $this->db->bind(':L_Name', $accountData['L_Name']);
        $this->db->bind(':Country', $accountData['Country']);
        $this->db->bind(':Email', $accountData['Email']);
        $this->db->bind(':Gender', $accountData['Gender']);
        $this->db->bind(':DOB', $accountData['DOB']);
        $this->db->bind(':Description',$accountData['Description']);
        $this->db->bind(':Channel_logo', $accountData['Channel_logo']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
	}
}
?>