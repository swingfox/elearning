<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Uploading extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		
		$this->load->view('upload-dev', array('error' => ' ' ));
	}

	function do_upload()
	{
		if($this->input->post()){
			extract($this->input->post());
			if($uploadType=='LO')
				$config['upload_path'] = './uploads/LO';
			else
				$config['upload_path'] = './uploads/LE';
		}		
		$config['allowed_types'] = 'zip';
		$config['max_size']	= '5000000'; //change this to expand or reduce maximum file size
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$filename = basename($_FILES['userfile']['name']);
 		$ext = substr($filename, strrpos($filename, '.') + 1);        
		$rd2 = mt_rand(10000,99999);
		$new_name = $rd2."_".$subject."_".$filenames;

		if($uploadType=='LO')
			$filepath = 'LO/'.$new_name.".".$ext;
		else
			$filepath = 'LE/'.$new_name.".".$ext;
		
		$config['file_name'] = $new_name;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{

			print_r($this->upload->data());
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload-dev', $error);
		}
		else{
			//echo $uploadType;
			$data = array('upload_data' => $this->upload->data());
			//print_r($data);
			if($uploadType=='LO'){
				require './application/models/LOExporter.php';
				$LO = new LOExporter;
				$upby = $this->session->userdata('username');
				$LO->insertLO($filenames,$subject,$desc,$filepath,$upby);
				
			}
			else{
				require './application/models/LEExporter.php';
				$LE = new LEExporter;
				$upby = $this->session->userdata('username');
				$LE->insertLE($filenames,$subject,$desc,$filepath,$upby);
			}

			$this->load->model('account_model', 'account');
			$this->account->update_lastactivity($upby,date('Y-m-d'));

			//$this->load->view('developer-update');
			if($uploadType=='LO'){
				redirect('/redirect/LO');
			}
			else{
				redirect('/redirect/LE');
			}
		}
	}
}
?>