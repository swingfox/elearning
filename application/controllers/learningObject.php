<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class LearningObject extends CI_Controller {
 public function __construct() {
        parent::__construct();
        
        $this->load->model('LO_model','LO');
    }
    public function index(){
        if($this->session->userdata('isLoggedIn')){
          
            if($this->session->userdata('userType') == 'developer')
                $this->load->view('developer-update');
            elseif ($this->session->userdata('userType') == 'reviewer') 
                $this->load->view('reviewer-update');
            else                
                // $this->load->view('download');
                // $this->load->view('review-rev');
                $this->load->view('admin-view5');
        }
        else
            $this->load->view('index');
    }
	
	public function uploadRevision(){
        
		$this->LO->uploadRevise($index);
	}

    public function deleteLO(){

    $this->LO->delete($index);
            
    }
    
}

?>