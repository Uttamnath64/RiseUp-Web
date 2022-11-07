<?php
class SignInAndUp extends Controller{
	function __construct()
	{
		
	}
	public function checkAndInsertUrl($Data)
	{
		$Url = $this->getRandUrl(13);
		if ($this->SignInAndSignUp->findUserByUrlAndInsert($Url,$Data)) {
			return $this->checkAndInsertUrl($Data);
		}else{
			return $Url;
		}
	}
	
	public function signinActiv()
	{
		$this->SignInAndSignUp = $this->model('SignInAndSignUp');
		$accountData = [
			'Admin_Id' => '',
			'Password' => ''
		];

		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$accountData = [
			'Admin_Id' => trim($_POST['Admin_Id']),
			'Password' => trim($_POST['Password'])
		];

		$numberValidation = "/^[0-9]*$/";


		if (empty($accountData['Admin_Id'])) {
			die("Please enter Admin Id!");
		}

		if (empty($accountData['Password'])) {
			die("Please enter password!");
		}elseif(strlen($accountData['Password'])<6){
			die('Password must be at least 6 characters!');
		}

		$Url = $this->SignInAndSignUp->checkLogin($accountData);
		$_SESSION['User_Id'] = $Url;
		echo "success"; 

	}
	public function logoutActiv()
	{
		unset($_SESSION['User_Id']);
		header("location: ".URLROOT."/feed/home");
	}

}
?>