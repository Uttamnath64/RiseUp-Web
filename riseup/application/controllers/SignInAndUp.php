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
	public function signupActiv()
	{
		$this->SignInAndSignUp = $this->model('SignInAndSignUp');
		$accountData = [
			'Url' => '',
			'F_Name' => '',
			'L_Name' => '',
			'Country' => '',
			'Mobile_Number' => '',
			'Email' => '',
			'Gender' => '',
			'DOB' => '',
			'Password' => '',
			'Channel_logo' => ''
		];

		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$accountData = [
			'Url' => '',
			'F_Name' => trim($_POST['F_Name']),
			'L_Name' => trim($_POST['L_Name']),
			'Country' => trim($_POST['Country']),
			'Mobile_Number' => trim($_POST['Mobile_Number']),
			'Email' => trim($_POST['Email']),
			'Gender' => trim($_POST['Gender']),
			'DOB' => trim($_POST['DOB']),
			'Password' => trim($_POST['Password']),
			'Channel_logo' => ''
		];

		$numberValidation = "/^[0-9]*$/";

		if (empty($accountData['F_Name'])) {
			die('Please enter first name!');
		}

		if (empty($accountData['L_Name'])) {
			die('Please enter last name!');
		}

		if (empty($accountData['Mobile_Number'])) {
			die("Please enter mobile number!");
		}elseif (!preg_match($numberValidation,$accountData['Mobile_Number'])){
			die('Mobile number invalid!');
		}elseif(strlen($accountData['Mobile_Number'])!=10){
			die('Mobile Number must be 10 digit!');
		}else{
			if ($this->SignInAndSignUp->findUserByMNumber($accountData['Mobile_Number'])) {
				die("Mobile number already exist!");
			}
		}

		if (empty($accountData['Email'])) {
			die('Please enter email!');
		}elseif (!filter_var($accountData['Email'], FILTER_VALIDATE_EMAIL)) {
			die('Email invalid!');
		}

		if ($accountData['Gender']=="none") {
			die('Please select gender!');
		}

		if ($accountData['DOB']=="") {
			die('Please select Date of birth!');
		}

		if ($accountData['Country'] == "none") {
			die("Please select country!");
		}

		if (empty($accountData['Password'])) {
			die('Please enter password!');
		}elseif (strlen($accountData['Password'])<6){
			die('Password must be at least 6 characters!');
		}else{
			$accountData['Password'] = md5($accountData['Password']);
		}

		if (!isset($_FILES['Image'])) {
			die('Please select image!');
		}else{
			$img_name = $_FILES['Image']['name'];
            $img_type = $_FILES['Image']['type'];
            $tmp_name = $_FILES['Image']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "jpg"];
		}

		if (in_array($img_ext, $extensions) === true) {
			$types = ["image/jpeg", "image/jpg"];
		}else{
			die('Please upload an image file - jpeg, jpg1');
		}

		if (in_array($img_type, $types) === true) {
		}else{
			die('Please upload an image file - jpeg, jpg');
		}

		$Url = $this->checkAndInsertUrl($accountData);
		$new_img_name = $Url.".".$img_ext;

		if ($this->imageMoveDatabase($tmp_name,$new_img_name)) {
			$accountData['Channel_logo'] = $new_img_name;
			$accountData['Url'] = $Url;
			if ($this->SignInAndSignUp->register($accountData)) {
				$_SESSION['User_Id'] = $Url;
				echo "success";
			}else{
				die('Something went wrong. Please try again!');
			}
		}else{
			die('Something went wrong. Please try again!');
		}
	}
	public function signinActiv()
	{
		$this->SignInAndSignUp = $this->model('SignInAndSignUp');
		$accountData = [
			'Mobile_Number' => '',
			'Password' => ''
		];

		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$accountData = [
			'Mobile_Number' => trim($_POST['Mobile_Number']),
			'Password' => trim($_POST['Password'])
		];

		$numberValidation = "/^[0-9]*$/";


		if (empty($accountData['Mobile_Number'])) {
			die("Please enter mobile number!");
		}elseif (!preg_match($numberValidation,$accountData['Mobile_Number'])){
			die('Mobile number invalid!');
		}elseif(strlen($accountData['Mobile_Number'])!=10){
			die('Mobile Number must be 10 digit!');
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
	public function getUserData()
	{
		$this->SignInAndSignUp = $this->model('SignInAndSignUp');
		if (isset($_SESSION['User_Id'])) {
			$check_data = $this->SignInAndSignUp->findUserData($_SESSION['User_Id']);
			if ($check_data) {
				return $check_data;
			}else{
				$this->logoutActiv();
			}
		}
	}

}
?>