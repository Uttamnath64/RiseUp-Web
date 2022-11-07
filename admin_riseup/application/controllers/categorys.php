<?php
/**
 * 
 */
class categorys extends Controller
{
	
	function __construct()
	{
		// code...
	}
	public function EditCategoryData()
	{
		if (!isset($_POST['Id'])) {
			header("location: /feed/Dashboard");
		}else{
			$Category = $this->model('Category');
			$Category->EditCategoryNow([$_POST['Id'],$_POST['Name']]);
		}
	}
	public function deleteCategory($data)
	{
		if (!isset($data[0])) {
			header("location: /feed/Dashboard");
		}else{
			$Category = $this->model('Category');
			$Category->deleteCategoryNow($data[0]);
		}
	}
	public function addCategory()
	{
		if (!isset($_POST['Name'])) {
			header("location: /feed/Dashboard");
		}else{
			$Category = $this->model('Category');
			$Category->addCategoryNow($_POST['Name']);
		}
	}
}
?>