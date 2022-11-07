<?php
class AndroidTest extends Controller{
	function __construct()
	{
		$this->SignInAndSignUp = $this->model('AndroidDB');
	}

	public function test()
	{
		$this->SignInAndSignUp->demo($_POST);
	}
}
?>