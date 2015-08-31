<?php

class LE_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

	public function update_status($filepath,$status,$username){
        $this->db->query("UPDATE siteuser set lastactivity = ? WHERE username = ?", array(date('Y-m-d'),$username));
        $this->db->query("UPDATE le set status = ? WHERE filepath = ?",array($status, $filepath)); 
        $this->db->query("UPDATE le set rev = ? WHERE filepath = ?",array($username, $filepath)); 
    }

    public function update_dev($username){
        $this->db->query("UPDATE siteuser set lastactivity = ? WHERE username = ?", array(date('Y-m-d'),$username));
    }
    public function reviewNow($optionsRadio, $comments, $id){
    	$this->db->query("UPDATE le set rating = ? WHERE id = ?",array($optionsRadio, $id)); 
        $this->db->query("UPDATE le set comments = ? WHERE id = ?",array($comments, $id)); 
        $this->db->query("UPDATE le set status = 1 WHERE id = ?",array($id));
    }

    public function deleteLO($le){
        require 'Library/WebServer/Documents/loop-sp-ci17/application/controllers/LE.php';
        $id = $le->getID();
        $this->db->query("DELETE FROM le WHERE id = ?", array($id));
    }

	}
?>