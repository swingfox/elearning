<?php
require './application/controllers/siteUser.php';
	Class dbConnection{
			public function Connect(){
			//$Connection = mysql_connect("172.31.11.208","loop","loop");
			$Connection = mysql_connect("localhost","loop","loop");
			mysql_select_db("loop",$Connection);
			}

			public function disconnect()
			{
				mysql_close();
			}

			public function isAdmin($username){//return bool
				return $this->SelectQuery("SELECT * FROM  siteuser WHERE userID = 1 AND username='$username' ");
			}

			public function isDeveloper2($username){
				return $this->SelectQuery("SELECT * FROM siteuser WHERE username='$username' AND userType='developer' ");
			}

			public function isReviewer2($username){
				return $this->SelectQuery("SELECT * FROM siteuser WHERE username='$username' AND userType='reviewer' ");
			}

			public function isDeveloper($username,$password){//return bool
				return $this->SelectQuery("SELECT * FROM siteuser WHERE username='$username' AND password='$password' AND userType='developer' AND blocked = 0 ");
			}

			public function isReviewer($username,$password){//return bool
				return $this->SelectQuery("SELECT * FROM siteuser WHERE username='$username' AND password='$password' AND userType='reviewer' AND blocked = 0 ");
			}

			public function authenticateAdmin($password){//return bool
				return $this->SelectQuery("SELECT * FROM siteuser WHERE userID = 1 AND password = '$password' ");
			}
			public function usernameAvailabilty($username){//return bool
				$ok = true;
				if($this->SelectQuery("SELECT * FROM  siteuser WHERE USERNAME = '$username' ")){
					$ok=false;
				}
				elseif($this->SelectQuery("SELECT * FROM  newuser WHERE USERNAME = '$username' ")){
					$ok=false;
				}
				return $ok;
			}

			public function acceptUser($user){
				$ok = true;
				$userID = $user->getID();
				if($this->SelectQueryBuild3("UPDATE siteuser SET accept = '1' WHERE userID = '$userID'"))
					$ok = false;
				return $ok;
			}

			private function SelectQueryBuild3($Query){//return bool
				$this->Connect();
				$result = mysql_query($Query);
				$this->disconnect();
				return $result;
			}

			public function getAllBlockedUser(){
				$result =$this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE userID<>1");//exempt admin
				$Users=array();
				while($row = mysql_fetch_array($result))
				{
					if($row['blocked'] == '1' ){
						$temp = new siteUser;
						$temp->setID($row['userID']);
						$temp->setUserName($row['username']);
						$temp->setLastLogin($row['lastlogin']);
						$temp->setLastDownload($row['lastactivity']);
						$temp->setBlocked($row['blocked']);
						$temp->setEmail($row['email']);
						$temp->setUserType($row['userType']);

						$Users[]= $temp;
					}
				}
				return $Users;
			}

			private function fetchResultSiteUsers($result){
				$Users=array();
				while($row = mysql_fetch_array($result))
				{
					$temp = new siteUser;
					$temp->setID($row['userID']);
					$temp->setUserName($row['username']);
					$temp->setLastLogin($row['lastlogin']);
					$temp->setLastDownload($row['lastactivity']);
					$temp->setBlocked($row['blocked']);
					$temp->setEmail($row['email']);
					$temp->setUserType($row['userType']);

					$Users[]= $temp;
				}
				return $Users;
			}

			public function searchExpiredUser($username){//return user or null
				$lastyear = strtotime("-1 year");
				$lastYearDate = date("Y-m-d",$lastyear);
				$result =$this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE username LIKE '%$username%' AND userID<>1");//exempt admin
				$Users=array();
				while($row = mysql_fetch_array($result))
				{
					$d = strtotime($row['lastlogin']);
					if(strtotime($row['lastlogin']) <= strtotime($lastYearDate) || strtotime($row['lastactivity']) <= strtotime($lastYearDate) && $row['blocked'] != '1' ){
						$temp = new siteUser;
						$temp->setID($row['userID']);
						$temp->setUserName($row['username']);
						$temp->setLastLogin($row['lastlogin']);
						$temp->setLastDownload($row['lastactivity']);
						$temp->setBlocked($row['blocked']);
						$temp->setUserType($row['userType']);

						$Users[]= $temp;
					}
				}
				return $Users;
			}

			public function getAllExpireUser(){
				$lastyear = strtotime("-1 year");
				$lastYearDate = date("Y-m-d",$lastyear);
				$result =$this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE userID<>1");//exempt admin
				$Users=array();
				while($row = mysql_fetch_array($result))
				{
					$d = strtotime($row['lastlogin']);
					if((strtotime($row['lastlogin']) <= strtotime($lastYearDate) || strtotime($row['lastactivity']) <= strtotime($lastYearDate)) && $row['blocked'] != '1' ){
						$temp = new siteUser;
						$temp->setID($row['userID']);
						$temp->setUserName($row['username']);
						$temp->setLastLogin($row['lastlogin']);
						$temp->setLastDownload($row['lastactivity']);
						$temp->setBlocked($row['blocked']);
						$temp->setUserType($row['userType']);

						$Users[]= $temp;
					}
				}
				return $Users;
			}

			public function getAllNewUser(){
				$result =$this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE  `accept` =0 ");//exempt admin
				$Users=array();
				$Users=$this->fetchResultSiteUsers($result);
				return $Users;
			}

			public function getAllSiteUserDev(){
				$result =$this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE userID<>1 AND blocked<>1 AND accept<>0 AND userType = 'developer' ");//hide admin -> userID <> 1
				$Users=$this->fetchResultSiteUsers($result);
				return $Users;
			}

			public function getAllSiteUserRev(){
				$result =$this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE userID<>1 AND blocked<>1 AND accept<>0 AND userType = 'reviewer' ");//hide admin -> userID <> 1
				$Users=$this->fetchResultSiteUsers($result);
				return $Users;
			}

			private function SelectQuery($Query){//return bool
				$this->Connect();
				$ok = false;
				$result = mysql_query($Query);
				if(mysql_num_rows($result)){
				//if(mysql_fetch_assoc($result)){
					$ok=true;
				}
				$this->disconnect();
				return $ok;

			}
			private function UpdateQuery($Query){//return bool
				$this->Connect();
				$ok = mysql_query($Query);
				$this->disconnect();
				return $ok;

			}
			public function LoginSuccess($user){
				$Query = "UPDATE `siteuser` SET `lastlogin` = Now() WHERE `username` = '$user'";
				$this->UpdateQuery($Query);
			}

			private function InsertQuery($Query){
				return $this->UpdateQuery($Query);
			}

			public function emailAvailabilty($email){//return bool
				return !($this->SelectQuery("SELECT * FROM  siteuser WHERE email = '$email' "));
			}
			public function SignUp($username,$password,$confirmpassword,$email){
				return $this->InsertQuery("INSERT INTO `newuser` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email');");

			}


			public function changePasswordUser($user,$pass,$newpass){//return bool
				$ok = false;
				if($this->SelectQuery("SELECT * FROM `siteuser` WHERE `password` = '$pass' AND `username` = '$user'")){
					$this->UpdateQuery("UPDATE `siteuser` SET `password`='$newpass' WHERE `username` = '$user'");
					$ok = true;
				}

				return $ok;
			}
			public function changeEmailUser($user,$pass,$email){//return bool
				$ok = false;
				if($this->SelectQuery("SELECT * FROM `siteuser` WHERE `password` = '$pass' AND `username` = '$user'")){
					$this->UpdateQuery("UPDATE `siteuser` SET `email`='$email' WHERE `username` = '$user'");
					$ok = true;
				}
				return $ok;
			}

			public function searchSiteUserDev($username){//return user or null
				$result = $this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE username LIKE '%$username%' AND blocked<>1 AND userID<>1 AND accept<>0 AND userType ='developer' ");//exempt admin
				/*$temp = new siteUser;
				if($row = mysql_fetch_array($result))
				{
					$temp->setID($row['userID']);
					$temp->setUserName($row['username']);
					$temp->setLastLogin($row['lastLogin']);
					$temp->setLastDownload($row['lastDownload']);
					$temp->setBlocked($row['blocked']);
				}
				else
					$temp = null;

				return $temp;*/
				return $this->fetchResultSiteUsers($result);
			}

			public function searchSiteUserRev($username){//return user or null
				$result = $this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE username LIKE '%$username%' AND blocked<>1 AND userID<>1 AND accept<>0 AND userType = 'reviewer' ");//exempt admin
				/*$temp = new siteUser;
				if($row = mysql_fetch_array($result))
				{
					$temp->setID($row['userID']);
					$temp->setUserName($row['username']);
					$temp->setLastLogin($row['lastLogin']);
					$temp->setLastDownload($row['lastDownload']);
					$temp->setBlocked($row['blocked']);
				}
				else
					$temp = null;

				return $temp;*/
				return $this->fetchResultSiteUsers($result);
			}

			public function searchBlockedUser($username){//return user or null
				$result = $this->SelectQueryBuild3("SELECT * FROM  `siteuser` WHERE username LIKE '%$username%' AND blocked=1 AND userID<>1");//exempt admin
				return $this->fetchResultSiteUsers($result);
			}

			public function blockUser($user){
				$userID = $user->getID();
				return $this->UpdateQuery("UPDATE  `siteuser` SET  `blocked` =  '1' WHERE  `userID` = $userID");
			}

			public function unblockUser($user){
				$userID = $user->getID();
				return $this->UpdateQuery("UPDATE  `siteuser` SET  `blocked` =  '0' WHERE  `userID` = $userID");
			}



	}







?>