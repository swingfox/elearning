<?php
	require_once './application/controllers/LOController.php';
	require_once './application/controllers/LEController.php';

class CommonController{
	private $LOContrl;
	private $LEContrl;


	public function __construct(){
		$this->LOContrl = new LOController;
		$this->LEContrl = new LEController;
	}

	//public function getHistory()	

}
	
?>