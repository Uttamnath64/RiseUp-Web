<?php
	class achievements extends Controller
	{
		
		function __construct()
		{
			$this->Controller = new Controller;
			$this->Controller->isLoggedIn(2);
			$this->achievement = $this->model('achievement');
		}
		public function getAchievementByUser($data)
		{
			if (isset($data[0])) {
				$this->achievement->insertAchievementByUser($data[0]);
			}else{
				header("location: /feed/achievement");
			}
		}
	}
?>