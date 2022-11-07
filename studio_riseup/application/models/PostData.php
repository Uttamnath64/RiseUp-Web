<?php
	class PostData 
	{
		function __construct()
		{
			$this->Controller = new Controller;
			$this->db = new Database;
		}
		public function getArticleAllData($Url)
		{
			$this->db->query('SELECT * FROM post WHERE Channel_Url = :Channel_Url AND Url = :Post_Url');
			$this->db->bind(':Channel_Url',$_SESSION['User_Id']);
			$this->db->bind(':Post_Url',$Url);
			return $this->db->single();

		}
		public function updateArticle($PostData,$main_data)
		{
			$this->db->query('DELETE FROM tags WHERE Post_Url = :Post_Url');
			$this->db->bind(':Post_Url',$PostData['Url']);
			if (!$this->db->execute()) {
				die("Something went wrong!");
			}
			if (!empty($PostData["Tags"])) {
				foreach ($PostData["Tags"] as $key => $value) {
					$this->insertTags($PostData['Url'],$value);
				}
			}

			if($PostData['Visibility'] =='PU'){
				if ($main_data->Date_Time !='0000-00-00 00:00:00') {
					$this->db->query("UPDATE post SET Title = :Title, Article = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category, Date_Time = :Date_Time  WHERE post.Url = :Url ");

			        $this->db->bind(':Url', $PostData['Url']);
			        $this->db->bind(':Title', $PostData['Title']);
			        $this->db->bind(':Blog', $PostData['Blog']);
			        $this->db->bind(':Visibility', $PostData['Visibility']);
			        $this->db->bind(':Image', $PostData['Image']);
			        $this->db->bind(':Comments', $PostData['Comments']);
			        $this->db->bind(':Date_Time', date('Y-m-d H:i:s'));
			        $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
			        $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
			        $this->db->bind(':Category', $PostData['Category']);
				}else{
					$this->db->query("UPDATE post SET Title = :Title, Blog = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category WHERE post.Url = :Url ");
				$this->db->bind(':Url', $PostData['Url']);
		        $this->db->bind(':Title', $PostData['Title']);
		        $this->db->bind(':Blog', $PostData['Blog']);
		        $this->db->bind(':Visibility', $PostData['Visibility']);
		        $this->db->bind(':Image', $PostData['Image']);
		        $this->db->bind(':Comments', $PostData['Comments']);
		        $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
		        $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
		        $this->db->bind(':Category', $PostData['Category']);
			    }	

		        if (!$this->db->execute()) {
		        	die("Something went wrong!");
			    }

			}else{

				$this->db->query("UPDATE post SET Title = :Title, Blog = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category WHERE post.Url = :Url ");
				$this->db->bind(':Url', $PostData['Url']);
		        $this->db->bind(':Title', $PostData['Title']);
		        $this->db->bind(':Blog', $PostData['Blog']);
		        $this->db->bind(':Visibility', $PostData['Visibility']);
		        $this->db->bind(':Image', $PostData['Image']);
		        $this->db->bind(':Comments', $PostData['Comments']);
		        $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
		        $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
		        $this->db->bind(':Category', $PostData['Category']);		

		        if (!$this->db->execute()) {
		        	die("Something went wrong!");
			    }
			}
		    return true;
	    }

		public function insertTags($Post_Url,$Tag)
		{
			$this->db->query('INSERT INTO tags (Post_Url,Tag)VALUES (:Post_Url,:Tag)');
            $this->db->bind(':Post_Url', $Post_Url);
            $this->db->bind(':Tag', $Tag);

            if (!$this->db->execute()) {
	        	die("Something went wrong!");
		    }
		}

		public function findUserByUrlAndInsert($Url,$PostData)
		{
			$this->db->query('SELECT * FROM user_account WHERE Url = :Url');
	        $this->db->bind(':Url', $Url);
	        if(count($this->db->resultSet()) > 0) {
	            return true;
	        } else {
	            $this->db->query('INSERT INTO post (Url, Channel_Url, Category_Id)VALUES ( :Url, :Channel_Url, :Category_Id )');

	            $this->db->bind(':Url', $Url);
	            $this->db->bind(':Channel_Url', $_SESSION['User_Id']);
	            $this->db->bind(':Category_Id', $PostData['Category']);
	            if ($this->db->execute()) {
	            	return false;
		        } else {
		            die("Something went wrong!");
		        }
	        }
		}

		public function getCategory()
		{
			$this->db->query('SELECT * FROM category');
    		return $this->db->resultSet();
		}
		public function deleteArticleDB($Url)
		{
			$this->db->query('DELETE FROM post WHERE Channel_Url = :Channel_Url AND Url = :Url');
			$this->db->bind(':Channel_Url', $_SESSION['User_Id']);
			$this->db->bind(':Url', $Url);
			$this->db->execute();
			header("location: ".URLROOT."/feed/Articles");
		}
	}
?>