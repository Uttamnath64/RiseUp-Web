<?php
class SignInAndSignUp 
{
	
	function __construct()
	{
		$this->db = new Database;
	}

    public function findUserByMNumber($aid) {

        $this->db->query('SELECT * FROM admin_account WHERE Admin_Id = :Admin_Id');
        $this->db->bind(':Admin_Id', $aid);
        if(count($this->db->resultSet()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkLogin($data) {

        $this->db->query('SELECT * FROM admin_account WHERE Admin_Id = :Admin_Id');

        $this->db->bind(':Admin_Id', $data['Admin_Id']);
        $getdata = $this->db->resultSet();
        if(count($getdata) > 0) {
            $getdata = $this->db->single();
            $Password = $getdata->Password;
            if ($data['Password']===$Password) {
                return $getdata->Admin_Id;
            }else{
                die("Password invalid!");
            }
        } else {
            die("Admin Id not exist!");
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