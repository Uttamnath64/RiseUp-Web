<?php
class customisations extends Controller
{
	
	function __construct()
	{
		// code...
	}
	public function ChannelDataEdit()
	{
		
		$this->Customisation = $this->model('Customisation');
		$accountData = [
			'Url' => '',
			'F_Name' => '',
			'L_Name' => '',
			'Country' => '',
			'Email' => '',
			'Gender' => '',
			'DOB' => '',
			'Description' => '',
			'Channel_logo' => ''
		];

		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$accountData = [
			'Url' => trim($_SESSION['User_Id']),
			'F_Name' => trim($_POST['F_Name']),
			'L_Name' => trim($_POST['L_Name']),
			'Country' => trim($_POST['Country']),
			'Email' => trim($_POST['Email']),
			'Gender' => trim($_POST['Gender']),
			'DOB' => trim($_POST['DOB']),
			'Description' => trim($_POST['Description']),
			'Channel_logo' => ''
		];

		$numberValidation = "/^[0-9]*$/";

		if (empty($accountData['F_Name'])) {
			die('Please enter first name!');
		}

		if (empty($accountData['L_Name'])) {
			die('Please enter last name!');
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

		$main_data = $this->Customisation->getChannelAllData();
		$new_img_name = $main_data->Channel_Logo;

		$Url = $accountData['Url'];
		if ( !empty($_FILES['Image']['name'])) {
			$img_name = $_FILES['Image']['name'];
            $img_type = $_FILES['Image']['type'];
            $tmp_name = $_FILES['Image']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "jpg"];
            if (in_array($img_ext, $extensions) === true) {
				$types = ["image/jpeg", "image/jpg"];
			}else{
				die('Please upload an image file - jpeg, jpg');
			}

			if (in_array($img_type, $types) === true) {
			}else{
				die('Please upload an image file - jpeg, jpg');
			}

			$new_img_name = $Url.".".$img_ext;
			if (!$this->imageMoveDatabase($tmp_name,$new_img_name)) {
				die('Something went wrong. Please try again!');
			}
		}
		$accountData['Channel_logo'] = $new_img_name ;
		$accountData['Url'] = $Url;
		if ($this->Customisation->editChannelData($accountData)) {
			echo "success";
		}else{
			die('Something went wrong. Please try again!');
		}
	}

}
?>