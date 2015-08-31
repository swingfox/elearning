<?php
date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Download extends CI_Controller {
	
  function __construct()
  {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
  
  //index, just load the main page
	public function index() {


		//load the view/download.php
		$this->load->view('download');
		
	}
		//IF download/plaintext,
		//IF download/upload,
	public function upload() {
		//load the download helper
		$this->load->helper('download');
		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$data = file_get_contents("Library/WebServer/Documents/loop-sp-ci17/uploads/image_upload.jpg");
		//Read the file's contents
		$name = 'niceupload.jpg';

		//use this function to force the session/browser to download the file uploaded by the user 
		force_download($name, $data);
	}

}
