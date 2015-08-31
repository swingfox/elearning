<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('account_model','account');
    }

    public function index(){
        if($this->session->userdata('isLoggedIn')){
          
            if($this->session->userdata('userType') == 'developer')
            {
                $this->load->view('developer-update');
            //echo "<script type='text/javascript'>alert('1');</script>";
            }
            elseif ($this->session->userdata('userType') == 'reviewer') 
                $this->load->view('reviewer-update');
            else{
                // $this->load->view('download');
                // $this->load->view('review-rev');
                $this->load->view('admin-view5');
            }
            //echo "<script type='text/javascript'>alert('1');</script>";
        }
        else
            $this->load->view('index');
    }

    public function loggedDev(){
        $this->sign_up();
        
    }
    public function sign_in(){
        //echo "<script type='text/javascript'>alert('1');</script>";
        if($this->input->post()){
            extract($this->input->post());
          //$data= $this->account->check_if_admin($username,$password);
           
           
               
           
             if($this->account->get_user_by_username_password_accept($username,$password,$optionsRadios))
             {
//               $data['user'] = $this->account->get_user_by_username_password($username,$password,$type="developer");
                // $this->session-r>set_userdata('user_id',$user);
                 // $this->session->set_userdata('user_id',$user);
                if($this->account->get_user_by_username_password_block($username,$password,$optionsRadios))
                {
                        $data = array(
                                    'username'  =>  $username,
                                    'isLoggedIn'=>  1,
                                    'userType'  =>  $optionsRadios
                                );
                        $this->session->set_userdata($data);

                        $details['username'] = $this->session->userdata('username');
                        $details['userType'] = $this->session->userdata('userType');

                      if($optionsRadios == 'developer')
                      $this->load->view('developer-update',$details);
                      else
                        $this->load->view('reviewer-update', $details);
                        
                }
                else{
                    $data['status'] = FALSE;
                    $data['msg'] = "Account is blocked.";
                    $this->load->view('index',$data);
                }
               
                  
            }

            else if($username==$this->account->check_if_admin($username))
            {
                 
                        
                        if($password==$this->account->check_if_admin_pass($password)){

                            $data = array(
                                    'username'  =>  $username,
                                    'isLoggedIn'=>  1
                                );
                        $this->session->set_userdata($data);

                        $details['username'] = $this->session->userdata('username');
                        // $this->load->view('download', $details);
                        // $this->load->view('review-rev', $details);
                         $this->load->view('admin-view', $details);
                        }
                        else
                         redirect(base_url(),'refresh');
            }

            else if(!($this->account->get_user_by_username_password_accept($username,$password,$optionsRadios))){

                    if($this->account->get_user_by_username_password($username,$password,$optionsRadios)){
                    /*echo "<script type='text/javascript'>alert('ACCOUNT NOT CONFIRMED!');</script>";
                    redirect(base_url(),'refresh');*/
                        $data['status'] = FALSE;
                        $data['msg'] = "Account not confirmed.";
                        $this->load->view('index',$data);
                    }
                    else{
                        $data['status'] = FALSE;
                        $data['msg'] = "Invalid account details. Check your information below.";
                        $this->load->view('index',$data);
                    }

            }
         }

  else 
    redirect('account');



        }
        
      //  $this->load->view('index');



// public function sign_in(){
//         if($this->input->post()){
//             extract($this->input->post());

//             if($user = $this->account->get_user_by_username_password($username,$password)){
//                 $this->account->update_last_access($user->id,date('Y-m-d H:i:s'));
//                 $this->session->set_userdata('user_id',$user->id);

//                 redirect('home');
//             }
//             else{
//                 $data['status'] = FALSE;
                
//                 $this->load->view('index',$data);
//             }
//         }
        
//         $this->load->view('index');
//     }




    
       public function sign_up(){
      
                extract($this->input->post());
                $this->load->model('account_model');

                if(!($this->account->check_username($username))){
                    $data['msg'] = "Thanks for signing up <br> "  .$username. "<br>Your account is not yet confirmed.<br> Please contact the administrator.";
                    $data['status'] = $this->account->check_username($username);
                    $this->account->create_new_user($username,$password,$email,$optionsRadios);    
                    $this->load->view('index',$data);
                    
                    
                    
                }
                else{
                    $data['msg'] = "Username already exists.";
                    $this->load->view('index',$data);
                }
            
            
        
        
    }
    
    
    
    public function check_user(){
        
        
    }
    public function logout(){
        $this->session->sess_destroy();
        
        redirect(base_url());
    }

     public function change_password(){
        if($this->input->post()){
          extract($this->input->post());
             $user= $this->session->userdata('username');
             $type=$this->session->userdata('userType');

            if($this->account->checkSignIn($user,$password) && $newPassword == $confirmNewPassword){
                $this->account->update_password($user,$newPassword);  
            }
            else
               $data['status'] = FALSE; 

            if($type == "developer")   
                 $this->load->view('developer-update', $data);
            elseif ($type == "reviewer")
                $this->load->view('reviewer-update');
            else
                $this->load->view('admin-view');

      
        }
      
    }

    
    /**********
        AJAX FUNCTION
        ****************/
    public function check_password(){
        $user = $this->session->userdata('username');
        if($data = $this->input->post()){
            extract($data);
            if($this->account->checkSignIn($user,$password)){
                $this->account->update_password($user,$newPassword);
                $status = 1;
            }
            else{
                $status = 0;
            }
            echo json_encode(array('status'=>$status));
        }
    }

    public function check_password_email(){
        $user = $this->session->userdata('username');
        if($data = $this->input->post()){
            extract($data);
            if($this->account->checkSignIn($user,$emailPassword)){
                $this->account->update_email($user,$enterNewEmail);
                $status = 1;
            }
            else{
                $status = 0;
            }
            echo json_encode(array('status'=>$status, 'data' => $emailPassword));
        }
    }

public function change_email(){
        if($this->input->post()){
          extract($this->input->post());
         $user= $this->session->userdata('username');
         $type=$this->session->userdata('userType');

            if($this->account->checkSignIn($user,$password)){
             $this->account->update_email($user,$enterNewEmail);  
               
            }
 if($type == "developer")   
                 $this->load->view('developer-update');
                elseif ($type == "reviewer")
                $this->load->view('reviewer-update');
                else
                $this->load->view('admin-view');
     
        }
      
    }
    
    // public function change_password(){
    //     if($this->input->post()){
    //         extract($this->input->post());
    //         $userdata = $this->authentication->user_data();
    //         if(md5($password) == $userdata->password && $newPassword == $confirmNewPassword){
    //             $this->account->update_password($userdata->id,md5($newPassword));                
    //         }      
    //     }
    //     redirect('home');
    // }

    // public function change_email(){
    //     if($this->input->post()){
    //         extract($this->input->post());
    //         $userdata = $this->authentication->user_data();
    //         if(md5($password) == $userdata->password){
    //             $this->account->update_email($userdata->id,$enterNewEmail); 

    //         }
    //     }
    //     redirect('home');
    // }

  public function block() {
        
        require './application/controllers/AdminController.php';
    session_start();
    if(isset($_SESSION['siteUsers']) && isset($_POST['index'])){

        $controller = new AdminController;
        $users = unserialize($_SESSION['siteUsers']);
        $data['counter'] = $this->uri->segment(3);
        $controller->blockUser($users[$_POST['index']]);
        //print_r($_POST['index']);
        //redirect('account', 'refresh');
         //$this->load->view('admin-view1');
        //echo "<script type='text/javascript'>alert('$_POST['index']');</script>";

        if($a=="1")
           redirect('/redirect/admin_view4');
        elseif ($a=="2") 
            redirect('/redirect/admin_view4');
        else
            redirect('/redirect/admin_view4');
    }    
    }

public function accept(){
    session_start();
        require './application/controllers/AdminController.php';
        if(isset($_SESSION['siteUsers']) && isset($_POST['index'])){
       // echo '<script type="text/javascript">alert('.$_POST['index'].');</script>';
        $controller = new AdminController;
        $users = unserialize($_SESSION['siteUsers']);
        $controller->acceptNewUser($users[$_POST['index']]);

    }
    

    redirect('/redirect/admin_view','refresh');
        
}
public function unblock() {
        
        require './application/controllers/AdminController.php';
    session_start();
    if(isset($_SESSION['blockedUsers']) && isset($_POST['index'])){
        $controller = new AdminController;
        $users = unserialize($_SESSION['blockedUsers']);
        $controller->unblockUser($users[$_POST['index']]);

    }
    

    redirect('/redirect/admin_view4');
        //print_r($_POST['index']);
        //redirect('account', 'refresh');
         //$this->load->view('admin-view1');
        //echo "<script type='text/javascript'>alert('$_POST['index']');</script>";
    }    


    


}