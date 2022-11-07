<?php
class Channel extends Controller
{
	
	function __construct()
	{
		// code...
	}
	public function deleteChannel($Url)
	{
		$this->Channels = $this->model("Channels");
		$this->Channels->deleteChannelDB($Url[0]);
	}
}
?>