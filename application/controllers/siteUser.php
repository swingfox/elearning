<?php
	class siteUser{
		private $id;
		private $username;
		private $lastLogin;
		private $lastDownload;
		private $blocked;
		private $email;
		private $usertype;
		
		public function getID(){
			return $this->id;
		}
		public function getUserName(){
			return $this->username;
		}
		
		public function getLastLogin(){
			return $this->lastLogin;
		}
		public function getLastDownload(){
			return $this->lastDownload;
		}
		public function getBlocked(){
			return $this->blocked;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getUserType(){
			return $this->usertype;
		}

		public function setUserType($usertype){
			$this->usertype = $usertype;
		}

		public function setEmail($email){
			$this->email = $email;
		}
		
		public function setID($id){
			$this->id = $id;
		}
		public function setUserName($username){
			$this->username = $username;
		}
		
		public function setLastLogin($lastLogin){
			 $this->lastLogin= $lastLogin;
		}
		public function setLastDownload($lastDownload){
			 $this->lastDownload= $lastDownload;
		}
		public function setBlocked($blocked){
			 $this->blocked = $blocked;
		}
		
		
	}
?>