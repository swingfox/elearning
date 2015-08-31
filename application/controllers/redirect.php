<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Redirect extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller i
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->search();

	}

	public function search(){

		$this->load->view('advanced-search-dev');
	}

	public function LO(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('developer-update',$details);
	}

	public function LE(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('developer-le',$details);
	}

	public function uploadLO(){
		if(isset($_SESSION['histlos'])){
            $los = unserialize($_SESSION['histlos']);
            $lo = current($los);
            $details['lobject'] = $lo->getName();
			$details['lsubj'] = $lo->getSubject();
        }
		$details['username'] = $this->session->userdata('username');
		
		$this->load->model('LO_model','lo');
		$this->lo->update_dev($this->session->userdata('username'));
		$this->load->view('upload-dev',$details);
	}

	public function uploadLE(){
		if(isset($_SESSION['histles'])){
            $les = unserialize($_SESSION['histles']);
            $le = current($les);
            $details['lelement'] = $le->getName();
			$details['lsubj'] = $le->getSubject();
        }
		$details['username'] = $this->session->userdata('username');
		
		$this->load->model('LE_model','le');
		$this->le->update_dev($this->session->userdata('username'));
		$this->load->view('uploadLe-dev',$details);

	}

	public function upload_reviseLO(){
		require './application/controllers/LOController.php';
		session_start();
		if(isset($_SESSION['los']) && isset($_POST['ctr'])){
			$los = unserialize($_SESSION['los']);
			//print_r($los);
			$index = $_POST['ctr'];
			$lo = $los[$index];
			//print_r($lo);
			$controller = new LOController;
			$ok = $controller->uploadRevision($lo);	
			/*$ok = $controller->deleteLO($lo);
			unlink('./uploads/'.$lo->getFilePath());*/
			$this->uploadLO();
		}		
	}

	public function upload_reviseLE(){
		require './application/controllers/LEController.php';
		session_start();
		if(isset($_SESSION['les']) && isset($_POST['ctr'])){
			$les = unserialize($_SESSION['les']);
			//print_r($les);
			$index = $_POST['ctr'];
			$le = $les[$index];
			//print_r($le);
			$controller = new LEController;
			$ok = $controller->uploadRevision($le);	
			/*$ok = $controller->deleteLO($lo);
			unlink('./uploads/'.$lo->getFilePath());*/
			$this->uploadLE();
		}		
	}


	public function deleteLO(){
		 require './application/controllers/LOController.php';
		 session_start();
         if(isset($_SESSION['histlos']) && isset($_POST['counters'])){
            $los = unserialize($_SESSION['histlos']);
            //$index = $_POST['counters'];
            $lo = current($los);
            //print_r($los);
			$controller = new LOController;
			while($lo!=NULL){
				$ok = $controller->deleteLOHistory($lo);	
				unlink('./uploads/'.$lo->getFilePath());
				next($los);
				$lo = current($los);
			}            
        redirect('/redirect/LO');
        }	
	}

	public function deleteLE(){
		 require './application/controllers/LEController.php';
		 session_start();
         if(isset($_SESSION['histles']) && isset($_POST['counters'])){
            $les = unserialize($_SESSION['histles']);
            //$index = $_POST['counters'];
            $le = current($les);
            //print_r($los);
			$controller = new LEController;
			while($le!=NULL){
				$ok = $controller->deleteLEHistory($le);	
				unlink('./uploads/'.$le->getFilePath());
				next($les);
				$le = current($les);
			}            
        redirect('/redirect/LE');
        }	
	}	



	public function deleteLO_admin(){
		 require './application/controllers/LOController.php';
		 session_start();
		if(isset($_SESSION['histlos']) && isset($_POST['counters'])){
            $los = unserialize($_SESSION['histlos']);
            $lo = current($los);
            //print_r($los);
			$controller = new LOController;
			while($lo!=NULL){
				$ok = $controller->deleteLOHistory($lo);	
				unlink('./uploads/'.$lo->getFilePath());
				next($los);
				$lo = current($los);
			}
              redirect('/redirect/admin_view5');
        }		
	}

	public function deleteLE_admin(){
		 require './application/controllers/LEController.php';
		 session_start();
		if(isset($_SESSION['histles']) && isset($_POST['counters'])){
            $les = unserialize($_SESSION['histles']);
            $le = current($les);
            //print_r($los);
			$controller = new LEController;
			while($le!=NULL){
				$ok = $controller->deleteLEHistory($le);	
				unlink('./uploads/'.$le->getFilePath());
				next($les);
				$le = current($les);
			}
              redirect('/redirect/admin_view6');
        }		
	}

	public function plusrevLO(){
		require './application/controllers/LOController.php';
		session_start();
		if(isset($_SESSION['lo']) && isset($_POST['counters'])){
		 	$lo = unserialize($_SESSION['lo']);
		 	//$lo = current($los);
		 	//print_r($lo);
		 	$rev = $_POST['reviewer'];
		 	$controller = new LOController;
			$ok = $controller->setRev($rev,$lo);

			redirect('/redirect/admin_view5');
		}			
	}

	public function plusrevLE(){
		require './application/controllers/LEController.php';
		session_start();
		if(isset($_SESSION['le']) && isset($_POST['counters'])){
		 	$le = unserialize($_SESSION['le']);
		 	//$lo = current($los);
		 	//print_r($le);
		 	$rev = $_POST['reviewer'];
		 	$controller = new LEController;
			$ok = $controller->setRev($rev,$le);

			redirect('/redirect/admin_view6');
		}			
	}

	public function LO_rev(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('reviewer-update',$details);
	}

	public function LE_rev(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('reviewer-le',$details);
	}

	public function search_rev(){
		$this->load->view('advanced-search-rev');
	}

	public function reviewlist_rev(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('review-list',$details);
	}

	public function history(){
		$user = $this->session->userdata('userType');
		$data['username'] = $this->session->userdata('username');
		$data['counter'] = $this->uri->segment(4);
		$type = $this->uri->segment(3);
		if($type == 'LO'){
			if($user=='developer')
				$this->load->view('historyLO-dev',$data);
			else if($user=='reviewer')
				$this->load->view('historyLO-rev',$data);
			else
				$this->load->view('historyLO-admin',$data);
		}
		else if($type == 'LE'){
			if($user=='developer')
				$this->load->view('historyLE-dev',$data);
			else if($user=='reviewer')
				$this->load->view('historyLE-rev',$data);
			else
				$this->load->view('historyLE-admin',$data);
		}
		else
				redirect('page404.php');
	}

	public function download(){
		$data['username'] = $this->session->userdata('username');
		$data['counter'] = $this->uri->segment(3);
		$this->load->view('download',$data);

	}
	
	public function downloadLE(){
		$data['username'] = $this->session->userdata('username');
		$data['counter'] = $this->uri->segment(3);
		$this->load->view('downloadLE',$data);

	}

	public function download_Admin(){
		$data['username'] = $this->session->userdata('username');
		$type = $this->uri->segment(3);
		$data['counter'] = $this->uri->segment(4);
		//echo $this->uri->segment(4);
		if($type == 'LO')
			$this->load->view('downloadLOAdmin',$data);
		else
			$this->load->view('downloadLEAdmin',$data);

	}

	public function downloadNow(){
		$this->load->helper('download');
		$rev = $this->session->userdata('username');
		echo $rev;
		$name = $this->uri->segment(5);
		$folder = $this->uri->segment(4);
		$id = $this->uri->segment(3);
		$data = file_get_contents("./uploads/".$folder."/".$name);
		if($folder == 'LO'){
			$this->load->model('LO_model','lo');
			$this->lo->update_status($folder."/".$name,'2',$this->session->userdata('username'));
		}
		else{
			$this->load->model('LE_model','le');
			$this->le->update_status($folder."/".$name,'2',$this->session->userdata('username'));
		}
		
		
		force_download($name, $data);

	}

	public function review_rev(){
		$data['id'] = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		if($type == 'LO'){
			$this->load->view('reviewLO-rev',$data);
		}
		else if($type == 'LE'){
			$this->load->view('reviewLE-rev',$data);
		}
		// print_r($data['name']);
		
	}
	
	public function reviewLO_admin(){
		$data['id'] = $this->uri->segment(3);
		// print_r($data['name']);
		$this->load->view('reviewLO-admin',$data);
	}

	public function reviewLE_admin(){
		$data['id'] = $this->uri->segment(3);
		// print_r($data['name']);
		$this->load->view('reviewLE-admin',$data);
	}

	public function reviewNow(){
		if($this->input->post()){
			extract($this->input->post());
			if($type =='LO'){
				$this->load->model('LO_model','lo');
				$this->lo->reviewNow($optionsRadios,$comments,$id);
			}
			else{
				$this->load->model('LE_model','le');
				$this->le->reviewNow($optionsRadios,$comments,$id);
			}
		
		if($this->session->userdata('username') == 'admin')
			redirect('/redirect/admin_view6');
		else
			redirect('/redirect/review_list');
		}
	}


	public function review_list(){
		$details['username'] = $this->session->userdata('username');
		// print_r($data['name']);
		$this->load->view('review-list',$details);
	}



	public function admin_view(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view',$details);

	}

	public function admin_view1(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view1',$details);

	}

	public function admin_view2(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view2',$details);

	}

	public function admin_view3(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view3',$details);

	}
	public function admin_view4(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view4',$details);

	}
	public function admin_view5(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view5',$details);

	}

	public function admin_view6(){
		$details['username'] = $this->session->userdata('username');
		$this->load->view('admin-view6',$details);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */