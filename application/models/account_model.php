<?php

class Account_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
       public function addAccount($username, $password, $email,$type){

            $data = array(
            'username' => $username,
            'userType'=>$type,
            'password' => $password,
            'email' => $email,
            
        ); 
        
            $query = $this->db->insert('siteuser',$data);

            if($query)
                return true;
            else
                return false;
        
        }
     public function checkSignIn($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password',$password);

        $query = $this->db->get('siteuser');
        
        if($query->num_rows()){
            return true;
        }
        else{
            return false;
        }
    }
    
//    public function checkFullName($fname, $mname, $lname){
//        $firstname = $this->db->where('firstname', $fname);
//        $middlename = $this->db->where('middlename', $mname);
//        $lastname = $this->db->where('lastname', $lname);
//        $query = $this->db->get('users');
//
//        if($query->num_rows())
//            return false;
//        else
//            return true;
//    }
    public function check_username($username){
        $this->db->where('username',$username);
        

        $query = $this->db->get('siteuser');

        if($query->num_rows())
            return true;
        else
            return false;
    }


    public function check_username_type($username, $type){
        $this->db->where('username',$username);
        $this->db->where('userType',$type);

        $query = $this->db->get('siteuser');

        if($query->num_rows())
            return true;
        else
            return false;
    }

    public function create_new_user($username, $password, $email,$type){
        $data = array(
            'username' => $username,
            'userType'=>$type,
            'password' => $password,
            'email' => $email,
            
        );
        
        $this->db->insert('siteuser', $data);
        
        return ($this->db->affected_rows())?$this->db->insert_id():FALSE;
    }




     
     public function get_user_by_username_password($username, $password, $type){
//        $query = $this->db->query("SELECT * FROM siteuser WHERE username  = $username AND password = $password LIMIT 1");
//        
//     return $query->num_rows() ? $query->result_array() : false;
         $this->db->where('username',$username);
         $this->db->where('password',$password);
         $this->db->where('userType',$type);
         

         $this->db->limit(1);
         $query = $this->db->get('siteuser');
         
         if($query->num_rows())
             return true;
         else
             return false;
    }

      public function get_user_by_username_password_accept($username, $password, $type){
//        $query = $this->db->query("SELECT * FROM siteuser WHERE username  = $username AND password = $password LIMIT 1");
//        
//     return $query->num_rows() ? $query->result_array() : false;
         $this->db->where('username',$username);
         $this->db->where('password',$password);
         $this->db->where('userType',$type);
         $this->db->where('accept','1');

         $this->db->limit(1);
         $query = $this->db->get('siteuser');
         
         if($query->num_rows())
             return true;
         else
             return false;
    }

     public function get_user_by_username_password_block($username, $password, $type){
//        $query = $this->db->query("SELECT * FROM siteuser WHERE username  = $username AND password = $password LIMIT 1");
//        
//     return $query->num_rows() ? $query->result_array() : false;
         $this->db->where('username',$username);
         $this->db->where('password',$password);
         $this->db->where('userType',$type);
        $this->db->where('blocked','0');
         
         $this->db->limit(1);
         $query = $this->db->get('siteuser');
         $this->update_login($username);
         if($query->num_rows())
             return true;
         else
             return false;
    }

    public function update_login($username){
        $this->db->query("UPDATE siteuser set lastlogin = ? WHERE username = ?",array(date('Y-m-d'),$username));
    }
    
   public function check_if_admin($username){
          
         $query = $this->db->query("SELECT username FROM siteuser WHERE username = ? LIMIT 1", array('admin'));
          //$this->db->where('password',$password);
         //$this->db->where('userType',$type);
         //$this->db->limit(1);
         //$query = $this->db->get('siteuser');
         
        return $query->num_rows() ? $query->row()->username : false;

    }

    public function block($username){
     $this->db->query("UPDATE siteuser set blocked = 0 WHERE username = ?",array($username)); 
        
    }

    public function check_if_admin_pass($password){
       $query = $this->db->query("SELECT password FROM siteuser WHERE password = ? LIMIT 1", array($password));
       
        return $query->num_rows() ? $query->row()->password : false;
        
    }

    public function update_password($username,$newPassword){
        $this->db->query("UPDATE siteuser set password = ? WHERE username = ?",array($newPassword, $username)); 
    }
      public function update_email($username,$enterNewEmail){
        $this->db->query("UPDATE siteuser set email = ? WHERE username = ?",array($enterNewEmail, $username)); 
    }

    public function update_lastactivity($username, $datetime){
        $this->db->query("UPDATE siteuser set lastactivity = ? WHERE username = ?",array($datetime,$username)); 
    }
  /*  
    public function update_user($user_id,$first_name, $middle_name, $last_name, $birthdate){
        $this->db->where('id',$user_id);
        $data = array(
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'birthdate' => $birthdate
        );
        
        $this->db->update('users', $data);
        
        return ($this->db->affected_rows())?TRUE:FALSE;
    }
    
    public function update_last_access($user_id, $datetime){
        $this->db->query("UPDATE users set last_access = ? WHERE id = ?",array($datetime, $user_id));
    }
    
   
    
    public function get_user_information_by_id($user_id){
        $query = $this->db->query("SELECT u.*, MAX(e.date_created) as last_entry
            FROM users u 
            LEFT JOIN entries e ON e.user_id = u.id 
            WHERE u.id = ? LIMIT 1", array($user_id));
        
        return $query->row();
    }
    
    public function update_email($user_id,$newEmail){
        $this->db->query("UPDATE users set email =  ? WHERE id = ?",array($newEmail, $user_id)); 
    }
    public function update_password($user_id,$newPassword){
        $this->db->query("UPDATE users set password = ? WHERE id = ?",array($newPassword, $user_id)); 
    }

     
     */
    }
?>
