<?php
class SignInAndSignUp 
{
	
	function __construct()
	{
		$this->db = new Database;
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