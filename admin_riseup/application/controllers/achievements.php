<?php
	class achievements extends Controller
	{
		
		
		public function editAchievement()
		{
			if (!isset($_POST['Id'])) {
				header("location: /feed/Dashboard");
			}else{
				$Achievement = $this->model('Achievement');
				$Achievement->EditAchievementNow([$_POST['Id'],$_POST['Name'],$_POST['Points'],$_POST['Description'],$_POST['Icon'],$_POST['Logical']]);
			}
		}
		public function deleteAchievement($data)
		{
			if (!isset($data[0])) {
				header("location: /feed/Dashboard");
			}else{
				$Achievement = $this->model('Achievement');
				$Achievement->deleteAchievementNow($data[0]);
			}
		}
		public function addAchievement()
		{
			if (!isset($_POST['Name'])) {
				header("location: /feed/Dashboard");
			}else{
				$Achievement = $this->model('Achievement');
				$Achievement->addAchievementNow([$_POST['Name'],$_POST['Points'],$_POST['Description'],$_POST['Icon'],$_POST['Logical']]);
			}
		}
	}
?>