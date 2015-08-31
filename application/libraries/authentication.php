<?php

class Authentication{
    private $CI;
    
    public function __construct(){
        $this->CI = & get_instance();
        
        $this->CI->load->model('account_model','account');
    }
    
    public function user_id(){
        $userid = $this->CI->session->userdata('user_id');
        
        return ($userid)?$userid:FALSE;
    }
    
    public function user_data(){
        $user_data = $this->CI->account->get_user_information_by_id($this->user_id());
        
        return $user_data;
    }
    
    public function user_name(){
        //BRING THIS BACK
        
        // $user = $this->user_data();
        // return (!empty($user->middle_name))?$user->first_name.' '.$user->middle_name.' '.$user->last_name:$user->first_name.' '.$user->last_name;
    }
    
    public function is_logged_in(){
        return ($this->CI->session->userdata('user_id'))?TRUE:FALSE;
    }
    
    public function logging_out(){
        $this->CI->session->unset_userdata('user_id');
    }
}
?>
