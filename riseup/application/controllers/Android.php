<?php
class Android extends Controller{
	protected $Tags = [];
	
	function __construct()
	{
		$this->adroidDBObject = $this->model('AndroidDB');
	}

	public function getTags($PostData){
	      	if(isset($PostData['Tags'])){
	        	$this->Tags = rtrim($PostData['Tags'], ',');
	        	$this->Tags = filter_var($this->Tags, FILTER_SANITIZE_URL);
	        	$this->Tags = explode(',', $this->Tags);
	      	}
	    }
	public function checkAndInsertUrl($Data)
	{
		$Url = $this->getRandUrl(13);
		if ($this->adroidDBObject->findUserByUrlAndInsert($Url,$Data)) {
			return $this->checkAndInsertUrl($Data);
		}else{
			return $Url;
		}
	}
	public function getCountryList(){
		echo json_encode($this->adroidDBObject->getCountryListDB());
	}
	public function SignUpActivity(){
		

		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$accountData = [
			'Url' => '',
			'F_Name' => $_POST['F_Name'],
			'L_Name' => $_POST['L_Name'],
			'Country' => $_POST['Country'],
			'Mobile_Number' => $_POST['Mobile_Number'],
			'Email' => $_POST['Email'],
			'Gender' => $_POST['Gender'],
			'DOB' => $_POST['DOB'],
			'Password' => md5($_POST['Password'])
		];

		if ($this->adroidDBObject->findUserByMNumber($accountData['Mobile_Number'])) {

			$accountData['Url'] = $this->checkAndInsertUrl($accountData);
			$new_img_name = $accountData['Url'].".jpg";

			if (file_put_contents("../public/images/".$new_img_name,base64_decode($_POST['Image']))) {

				$accountData['Image'] = $new_img_name;

				$accountData['Url'] = $this->checkAndInsertUrl($accountData);

				if ($this->adroidDBObject->register($accountData)) {
					$success_msg['success'] = 1;
					$success_msg['URL'] = $accountData['Url'];
					$success_msg['success_msg'] = "Successfully SignUp!";
				}else{
					$success_msg['success'] = 0;
					$success_msg['success_msg'] = "Something went wrong. Please try again!";
				}
			}else{
				$success_msg['success'] = 0;
				$success_msg['success_msg'] = "Something went wrong. Please try again!";
			}		
		}else{
			$success_msg['success'] = 0;
			$success_msg['success_msg'] = "Mobile Number Already exist!";
		}
		echo json_encode($success_msg);die;
	}

	public function SignInActivity()
	{
		$accountData = [
			'Mobile_Number' => '',
			'Password' => ''
		];

		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$accountData = [
			'Mobile_Number' => trim($_POST['Mobile_Number']),
			'Password' => trim($_POST['Password'])
		];

		$success_msg = $this->adroidDBObject->checkLogin($accountData);

		echo json_encode($success_msg);die;
	}

	public function getHomeArticleData()
	{
		$success_msg = $this->adroidDBObject->getHomeArticleDataDB();
		echo json_encode($success_msg);die;
	}
	public function getArticleViewData()
	{
		$success_msg = $this->adroidDBObject->getArticleViewDataDB([$_POST["Article_Url"],$_POST['User_Url']]);
		echo json_encode($success_msg);die;
	}

	public function likeAndDislike()
	{
		if (isset($_POST['Fun_Value'])) {
			$this->adroidDBObject->likeAndDislikeDB([$_POST['Fun_Value'],$_POST['Post_Url'],$_POST['User_Url']]);
		}
	}

	public function articlsBookmar()
	{
		if (isset($_POST['Post_Url'])) {
			$this->adroidDBObject->articlsBookmarDB([$_POST['Post_Url'],$_POST['User_Url']]);
		}
	}

	public function channelJoinAndLeft()
	{
		$this->adroidDBObject->channelJoinAndLeftDB([$_POST['Post_Url'],$_POST['User_Url']]);
	}

	public function ProfileData()
	{
		$success_msg = $this->adroidDBObject->ProfileDataDB($_POST['User_Url']);
		echo json_encode($success_msg);die;
	}

	public function getArticleContent($value)
	{
		$this->adroidDBObject->getArticleContentDB($value[0]);
	}

	public function getChannelData()
	{
		$success_msg = $this->adroidDBObject->getChannelDataDB([$_POST['Channel_Url'],$_POST['User_Url']]);
		echo json_encode($success_msg);die;
	}

	public function getAchievementData()
	{
		$success_msg = $this->adroidDBObject->getAchievementList($_POST['User_Url']);
		 echo json_encode($success_msg);die;
	}

	public function setAchievementData()
	{
		$success_msg = $this->adroidDBObject->setAchievementDataDB([$_POST['Id'],$_POST['User_Url']]);
		 echo json_encode($success_msg);die;
	}

	public function getLibraryHistory()
	{
		$success_msg = $this->adroidDBObject->getLibraryHistoryDB($_POST['User_Url']);
		 echo json_encode($success_msg);die;
	}

	public function getLibraryArticle()
	{
		$success_msg = $this->adroidDBObject->getLibraryArticleDB($_POST['User_Url']);
		 echo json_encode($success_msg);die;
	}

	public function getLibraryBookmark()
	{
		$success_msg = $this->adroidDBObject->getLibraryBookmarkDB($_POST['User_Url']);
		 echo json_encode($success_msg);die;
	}

	public function getLibraryLiked()
	{
		$success_msg = $this->adroidDBObject->getLibraryLikedDB($_POST['User_Url']);
		 echo json_encode($success_msg);die;
	}

	public function getJoinedChannel()
	{
		$success_msg = $this->adroidDBObject->getJoinedChannelDB($_POST['User_Url']);
		 echo json_encode($success_msg);die;
	}

	public function getSearchResult()
	{
		$success_msg = $this->adroidDBObject->getSearchResultDB($_POST['Query']);
		 echo json_encode($success_msg);die;
	}


	public function createArticle()
	{

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$PostData = [
				'Url' => '',
				'Title' => trim($_POST['Title']),
				'Blog' => trim($_POST['Article']),
				'Tags' => trim($_POST['Keyword']),
				'Category' => trim($_POST['Category']),
				'Image' => '',
				'Visibility' => trim($_POST['Visibility']),
				'Comments' => trim($_POST['Comments']),
				'Paid_Promotion' => trim($_POST['Paid'])
			];


			$Url = $this->checkAndInsertUrlArticle($PostData,$_POST['User_Url']);
			$new_img_name = $Url.".jpg";

			$this->getTags($PostData);
			$PostData["Tags"] = $this->Tags;

			if (file_put_contents("../public/images/".$new_img_name,base64_decode($_POST['Image']))) {

				$PostData['Image'] = $new_img_name;
				$PostData['Url'] = $Url;

				$success_msg = $this->adroidDBObject->createArticleDB($PostData,$_POST['User_Url']);

			}else{
				$success_msg['success'] = 0;
           		$success_msg['success_msg'] = "Something went wrong. Please try again!";
			}
		 echo json_encode($success_msg);die;
	}

	public function getCategoryList(){
		echo json_encode($this->adroidDBObject->getCategoryListDB());
	}

	public function checkAndInsertUrlArticle($PostData,$data)
	{
		$Url = $this->getRandUrl(15);
		if ($this->adroidDBObject->findUserByUrlAndInsertArticle($Url,$PostData,$data)) {
			return $this->checkAndInsertUrlArticle($PostData,$data);
		}else{
			return $Url;
		}
	}

	public function getAchievementView()
	{
		$success_msg = $this->adroidDBObject->getAchievementViewDB($_POST['User_Url'],$_POST['Id']);
		 echo json_encode($success_msg);die;
	}

	public function Report()
	{
		if (isset($_POST['Report'])) {
			echo $this->adroidDBObject->addReport([$_POST['Report'],$_POST['Post_Url'],$_POST['Channel_Url'],$_POST['User_Url']]);
		}
	}

	public function getComments()
	{
		$success_msg = $this->adroidDBObject->getCommentDB([$_POST['Post_Url'],$_POST['User_Url']]);
		 echo json_encode($success_msg);die;
	}

	public function addComment()
	{
		$success_msg = $this->adroidDBObject->AddCommentDB([$_POST['Post_Url'],$_POST['Comment'],$_POST['User_Url']]);
		 echo json_encode($success_msg);die;
	}
}
?>