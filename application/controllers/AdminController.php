<?php
	require_once './application/models/dbConnection.php';
	date_default_timezone_set('Asia/Manila');

	class AdminController{		
		private $db;
		function __construct(){
			$this->db = new dbConnection;
		}
		
		public function getAllSiteUsersDev(){
			return $this->db->getAllSiteUserDev();
			//insert filtering logic with usermanagement site here
		}

		public function getAllSiteUsersRev(){
			return $this->db->getAllSiteUserRev();
			//insert filtering logic with usermanagement site here
		}

		public function getAllNewUsers(){
			return $this->db->getAllNewUser();
			//insert filtering logic with usermanagement site here
		}
		public function getAllExpiredUsers(){
			return $this->db->getAllExpireUser();
			//insert filtering logic with usermanagement site here
		}
		public function getAllBlockedUsers(){
			return $this->db->getAllBlockedUser();
			//insert filtering logic with usermanagement site here
		}
		public function declineNewUser($id){
			return $this->db->declineNewUser($id);
		}
		public function acceptNewUser($user){
			//insert preliminary logic with usermanagement site here
			return $this->db->acceptUser($user);
		}
		//build 4 methods
		public function searchSiteUsersDev($username){
			return $this->db->searchSiteUserDev($username);
			//insert filtering logic with usermanagement site here
		}
		public function searchSiteUsersRev($username){
			return $this->db->searchSiteUserRev($username);
			//insert filtering logic with usermanagement site here
		}
		public function searchNewUsers($username){
			return $this->db->searchNewUser($username);
			//insert filtering logic with usermanagement site here
		}
		public function searchExpiredUsers($username){
			return $this->db->searchExpiredUser($username);
			//insert filtering logic with usermanagement site here
		}
		public function searchBlockedUsers($username){
			return $this->db->searchBlockedUser($username);
			//insert filtering logic with usermanagement site here
		}
		public function blockUser($user){
			$this->db->blockUser($user);
		}
		public function unblockUser($user){
			$this->db->unblockUser($user);
		}
	}
?>