<?php
class SignInAndSignUp 
{
	
	function __construct()
	{
		$this->db = new Database;
	}

    public function register($accountData) {
        $this->db->query("UPDATE user_account SET F_Name = :F_Name, L_Name = :L_Name, Country_Id = :Country, Mobile_Number = :Mobile_Number, Email = :Email, Gender = :Gender, DOB = :DOB, Password = :Password, Channel_logo = :Channel_logo WHERE user_account.Url = :Url ");
        $this->db->bind(':Url', $accountData['Url']);
        $this->db->bind(':F_Name', $accountData['F_Name']);
        $this->db->bind(':L_Name', $accountData['L_Name']);
        $this->db->bind(':Country', $accountData['Country']);
        $this->db->bind(':Mobile_Number', $accountData['Mobile_Number']);
        $this->db->bind(':Email', $accountData['Email']);
        $this->db->bind(':Gender', $accountData['Gender']);
        $this->db->bind(':DOB', $accountData['DOB']);
        $this->db->bind(':Password', $accountData['Password']);
        $this->db->bind(':Channel_logo', $accountData['Channel_logo']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByMNumber($mobile) {

        $this->db->query('SELECT * FROM user_account WHERE Mobile_Number = :Mobile_Number');
        $this->db->bind(':Mobile_Number', $mobile);
        if(count($this->db->resultSet()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCountryList()
    {
    	$this->db->query('SELECT * FROM countries');
    	return $this->db->resultSet();
    }
	public function findUserByUrlAndInsert($Url,$Country) {

        $this->db->query('SELECT * FROM user_account WHERE Url = :Url');
        $this->db->bind(':Url', $Url);
        if(count($this->db->resultSet()) > 0) {
            return true;
        } else {
            $this->db->query('INSERT INTO user_account (Url,Country_Id)VALUES (:Url, :Country)');
            $this->db->bind(':Url', $Url);
            $this->db->bind(':Country', $Country['Country']);
            if ($this->db->execute()) {
            	return false;
	        } else {
	            echo "Something went wrong!";
	        }
        }
    }

    public function checkLogin($data) {

        $this->db->query('SELECT * FROM user_account WHERE Mobile_Number = :Mobile_Number');

        $this->db->bind(':Mobile_Number', $data['Mobile_Number']);
        $getdata = $this->db->resultSet();
        if(count($getdata) > 0) {
            $getdata = $this->db->single();
            $Password = $getdata->Password;
            if (md5($data['Password'])===$Password) {
                return $getdata->Url;
            }else{
                die("Password invalid!");
            }
        } else {
            die("Mobile number not exist!");
        }
    }
    public function findUserData($Url)
    {
        $this->db->query('SELECT * FROM user_account WHERE Url = :Url');
        $this->db->bind(':Url', $Url);
        $getdata = $this->db->resultSet();
        if(count($getdata) > 0) {
            $getdata = $this->db->single();
            return $getdata;
        }else{
            return false;
        }
    }
}
?>