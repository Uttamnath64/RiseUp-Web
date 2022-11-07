<?php
	class article extends Controller
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
		public function updateArticleData()
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
				'Url' => trim($_POST['Post_Url']),
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

			$main_data = $this->Post->getArticleAllData($PostData['Url']);
			$new_img_name = $main_data->Image;

			$Url = $PostData['Url'];
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
			
			$this->getTags($PostData);
			$PostData["Tags"] = $this->Tags;
			
			$PostData['Image'] = $new_img_name ;
			$PostData['Url'] = $Url;
			if ($this->Post->updateArticle($PostData,$main_data)) {
				echo "success";
			}else{
				die('Something went wrong. Please try again!');
			}
		}
	public function deleteArticle($Url)
	{
		$this->Post = $this->model("PostData");
		$this->Post->deleteArticleDB($Url[0]);
	}
}
?>