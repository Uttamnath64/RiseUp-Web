<?php
	class Post extends Controller
	{
		protected $Tags = [];
		function __construct()
		{
			
		}
		public function getTags($PostData){
	      	if(isset($PostData['Tags'])){
	        	$this->Tags = rtrim($PostData['Tags'], ',');
	        	$this->Tags = filter_var($this->Tags, FILTER_SANITIZE_URL);
	        	$this->Tags = explode(',', $this->Tags);
	      	}
	    }
		public function checkAndInsertUrl($PostData)
		{
			$Url = $this->getRandUrl(15);
			if ($this->Post->findUserByUrlAndInsert($Url,$PostData)) {
				return $this->checkAndInsertUrl();
			}else{
				return $Url;
			}
		}
		public function Report()
		{
			if (isset($_POST['Report'])) {
				$PostData = $this->model('PostData');
				$PostData->addReport([$_POST['Report'],$_POST['Post_Url'],$_POST['Channel_Url']]);
			}
		}
		public function postAdd()
		{
			$this->Post = $this->model("PostData");
			$PostData = [
				'Url' => '',
				'Title' => '',
				'Blog' => '',
				'Tags' => [],
				'Category' => '',
				'Image' => '',
				'Visibility' => '',
				'Comments' => '',
				'Paid_Promotion' => ''
			];

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$PostData = [
				'Url' => '',
				'Title' => trim($_POST['Post_Title']),
				'Blog' => trim($_POST['Post_Blog']),
				'Tags' => trim($_POST['Post_Tags']),
				'Category' => trim($_POST['Post_Category']),
				'Image' => '',
				'Visibility' => trim($_POST['Post_Visibility']),
				'Comments' => trim($_POST['Post_Comments']),
				'Paid_Promotion' => trim($_POST['Post_Paid'])
			];
			if (empty($PostData['Title'])) {
				die("Please enter title!");
			}

			if (empty($PostData['Blog'])) {
				die("Please enter blog!");
			}

			if ($PostData['Category']=="none") {
				die("Please select category!");
			}

			if (empty($_FILES['Image'])) {
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
				die('Please upload an image file - jpeg, jpg');
			}

			if (in_array($img_type, $types) === true) {
			}else{
				die('Please upload an image file - jpeg, jpg');
			}

			$Url = $this->checkAndInsertUrl($PostData);
			$new_img_name = $Url.".".$img_ext;
			
			$this->getTags($PostData);
			$PostData["Tags"] = $this->Tags;
			
			if ($this->imageMoveDatabase($tmp_name,$new_img_name)) {
				$PostData['Image'] = $new_img_name;
				$PostData['Url'] = $Url;
				if ($this->Post->postAddInDatabase($PostData)) {
					echo "success";
				}else{
					die('Something went wrong. Please try again!');
				}
			}else{
				die('Something went wrong. Please try again!');
			}

		}
	public function likeAndDislike()
	{
		if (isset($_POST['Fun_Value'])) {
			$PostData = $this->model('PostData');
			$PostData->likeDislikeNow([$_POST['Fun_Value'],$_POST['Post_Url'],$_POST['Channel_Url']]);
		}
	}

	public function channelJoinAndLeft()
	{
		if (isset($_POST['Channel_Url'])) {
			$PostData = $this->model('PostData');
			$PostData->channelJoinAndLeft($_POST['Channel_Url']);
		}
	}

	public function articlsBookmar()
	{
		if (isset($_POST['Post_Url'])) {
			$PostData = $this->model('PostData');
			$PostData->articlsBookmar($_POST['Post_Url']);
		}
	}
	public function Addcomments()
	{
		if (isset($_POST['Comments'])) {
			$PostData = $this->model('PostData');
			$PostData->addComments([$_POST['Comments'],$_POST['Post_Url'],$_POST['Channel_Url']]);
		}
	}
}
?>