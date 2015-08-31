<?php

class LO_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

	public function update_status($filepath,$status,$username){
        $this->db->query("UPDATE siteuser set lastactivity = ? WHERE username = ?", array(date('Y-m-d'),$username));
        $this->db->query("UPDATE lo set status = ? WHERE filepath = ?",array($status, $filepath)); 
        $this->db->query("UPDATE lo set rev = ? WHERE filepath = ?",array($username, $filepath)); 
    }

    public function update_dev($username){
        $this->db->query("UPDATE siteuser set lastactivity = ? WHERE username = ?", array(date('Y-m-d'),$username));
    }
    public function reviewNow($optionsRadio, $comments, $id){
    	$this->db->query("UPDATE lo set rating = ? WHERE id = ?",array($optionsRadio, $id)); 
        $this->db->query("UPDATE lo set comments = ? WHERE id = ?",array($comments, $id)); 
        $this->db->query("UPDATE lo set status = 1 WHERE id = ?",array($id));
    }

    public function deleteLO($lo){
        require 'Library/WebServer/Documents/loop-sp-ci17/application/controllers/LO.php';
        $id = $lo->getID();
        $this->db->query("DELETE FROM lo WHERE id = ?", array($id));
    }

	}
?>