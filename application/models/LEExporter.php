<?php
	require_once './application/controllers/LO.php';
	class LEExporter{
			public function Connect(){
				$Connection = mysql_connect("localhost","loop","loop");
				mysql_select_db("loop",$Connection);
			}
		   public function disconnect()
			{
				mysql_close();
			}

			public function getAllDownloadableLE(){
				$result =$this->SelectQuery("SELECT * FROM  le WHERE rating=5 ORDER BY dateUploaded DESC");
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			public function nameAvailabilty($name,$subject){//return bool
				$ok = true;
				$result = $this->SelectQuery("SELECT * FROM `le` WHERE `name`='$name' and `subject`='$subject' ");
				if($result){
					$ok=false;
				}
				return $ok;
			}
			
			public function insertLE($name,$subject,$description,$filepath,$uploadedBy){
				$ok = true;
				$result = $this->SelectQuery("INSERT INTO `le`(`name`, `subject`, `description`, `dateUploaded`, `filepath`, `uploadedBy`) VALUES ('$name', '$subject', '$description', NOW(), '$filepath', '$uploadedBy') ");
				if($result)
					$ok = false;
				return $ok;
			}
			public function getAllLE(){
				$result =$this->SelectQuery("SELECT * FROM  le ORDER BY dateUploaded DESC");
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}
	
			public function getAllLEDev($username){
				$result =$this->SelectQuery("SELECT * FROM  le WHERE uploadedBy='$username' ORDER BY dateUploaded DESC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function getAllLERev(){
				$result =$this->SelectQuery("SELECT * FROM  le WHERE rating<4 and rating>0 and rev='' ORDER BY dateUploaded DESC");
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			public function getAllLORevLater($user){
				$result =$this->SelectQuery("SELECT * FROM  lo WHERE rating<4 and rating>0 and status=2 and rev='$user' ORDER BY dateUploaded DESC");
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			private function SelectQuery($Query){//return bool
				$this->Connect();
				$result = mysql_query($Query);
				$this->disconnect();
				return $result;
			}
			public function fetchResultSet($result){
				$LEset=array();
				while($row = mysql_fetch_array($result))
				{
				//	$LOset[]= new LO($row['name'],$row['subject'],$row['description'], $row['downloads'],$row['dateUploaded'],$row['filepath']); 
					$temp = new LE;
					$temp->setID($row['ID']);
					$temp->setName($row['name']);	
					$temp->setSubject($row['subject']);	
					$temp->setType($row['type']);
					$temp->setDescription($row['description']);
					$temp->setDownloads($row['downloads']);	
					$temp->setDateUploaded($row['dateUploaded']);	
					$temp->setFilepath($row['filepath']);	
					$temp->setRating($row['rating']);	
					$temp->setComments($row['comments']);
					$temp->setUploadedBy($row['uploadedBy']);
					$temp->setStatus($row['status']);	
					$temp->setRev($row['rev']);
					
					$LEset[]= $temp;
				}
				return $LEset;
			}
			public function searchLE($name,$subject,$dateStart,$dateEnd,$orderBy){
				$query ="SELECT * FROM `le` WHERE (`name` LIKE '%$name%')";
				if($subject!=null){
					$query .=  " AND (`subject` = '$subject')";
				}
				if($dateStart!=null&&$dateEnd !=null){
					$query .= " AND (`dateUploaded` BETWEEN '$dateStart' AND '$dateEnd')";
				}
				if($orderBy!=null){
					if($orderBy=="name"){
						$query.= " ORDER BY `$orderBy` ASC";
					}
					else{
						$query.= " ORDER BY `$orderBy` DESC";
					}
				}
				else{
					$query.= "ORDER BY dateUploaded DESC";
				}
				
				$result =$this->SelectQuery($query);
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			public function deleteLE($le){
				$id = $le->getID();
				$query = "DELETE FROM le WHERE ID = '$id'";
				$result =$this->SelectQuery($query);
				
				return $result;
			}

			public function deleteLEHistory($le){
				$id = $le->getID();
				$name = $le->getName();

				$query1 = "DELETE FROM oldle WHERE ID = '$id' AND name = '$name'";
				$result1 =$this->SelectQuery($query1);
				$query = "DELETE FROM le WHERE ID = '$id' AND name = '$name'";
				$result =$this->SelectQuery($query);

				return $result;
			}

			public function moveLE($le){
				$name=$le->getName();	
				$subject=$le->getSubject();	
				$description=$le->getDescription();
				$downloads=$le->getDownloads();
				$date=$le->getDateUploaded();	
				$path=$le->getFilepath();	
				$rate=$le->getRating();	
				$comments=$le->getComments();
				$uploaded=$le->getUploadedBy();
				$status=$le->getStatus();	
				$reviewer=$le->getRev();
				$type=$le->getType();

				$query = "INSERT INTO oldle VALUES(NULL,'$name','$subject','$description','$downloads','$date','$path','$rate','$comments','$uploaded','$status','$reviewer','$type')";
				$result = $this->SelectQuery($query);
				if(!$result)
					echo "ERROR";
				else
					return $this->deleteLE($le);
			}

			public function setRev($rev,$le){
				$id = $le->getID();
				//print_r($lo);
				//echo $rev;
				$query = "UPDATE le SET rev='$rev' WHERE ID = '$id'";
				$result =$this->SelectQuery($query);
				return result;

			}

			public function searchLEDev($name,$subject,$dateStart,$dateEnd,$orderBy,$upby){
				$query ="SELECT * FROM `le` WHERE (`name` LIKE '%$name%')";
				if($subject!=null){
					$query .=  " AND (`subject` = '$subject')";
				}
				if($dateStart!=null&&$dateEnd !=null){
					$query .= " AND (`dateUploaded` BETWEEN '$dateStart' AND '$dateEnd')";
				}
				if($orderBy!=null){
					if($orderBy=="name"){
						$query.= " AND (uploadedBy = '$upby') ORDER BY `$orderBy` ASC";
					}
					else{
						$query.= " AND (uploadedBy = '$upby') ORDER BY `$orderBy` DESC";
					}
				}
				else{
					$query.= " AND (uploadedBy = '$upby') ORDER BY dateUploaded DESC";
				}
				
				$result =$this->SelectQuery($query);
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}
			
			public function searchLERev($name,$subject,$dateStart,$dateEnd,$orderBy){
				$query ="SELECT * FROM `le` WHERE (`name` LIKE '%$name%')";
				if($subject!=null){
					$query .=  " AND (`subject` = '$subject')";
				}
				if($dateStart!=null&&$dateEnd !=null){
					$query .= " AND (`dateUploaded` BETWEEN '$dateStart' AND '$dateEnd')";
				}
				if($orderBy!=null){
					if($orderBy=="name"){
						$query.= " AND (rating < 4 and rating >0) ORDER BY `$orderBy` ASC";
					}
					else{
						$query.= " AND (rating < 4 and rating >0) ORDER BY `$orderBy` DESC";
					}
				}
				else{
					$query.= " AND (rating < 4 and rating >0) ORDER BY dateUploaded DESC";
				}
				
				$result =$this->SelectQuery($query);
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			public function searchLERevLater($name,$subject,$dateStart,$dateEnd,$orderBy,$user){
				$query ="SELECT * FROM `le` WHERE (`name` LIKE '%$name%') AND (rev=$user)";
				if($subject!=null){
					$query .=  " AND (`subject` = '$subject')";
				}
				if($dateStart!=null&&$dateEnd !=null){
					$query .= " AND (`dateUploaded` BETWEEN '$dateStart' AND '$dateEnd')";
				}
				if($orderBy!=null){
					if($orderBy=="name"){
						$query.= " AND (rating < 4 and rating >0 and status=2) ORDER BY `$orderBy` ASC";
					}
					else{
						$query.= " AND (rating < 4 and rating >0 and status=2) ORDER BY `$orderBy` DESC";
					}
				}
				else{
					$query.= " AND (rating < 4 and rating >0 and status=2) ORDER BY dateUploaded DESC";
				}
				
				$result =$this->SelectQuery($query);
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			public function getUserRevList($user){
				$result=$this->SelectQuery("(SELECT * FROM  le WHERE rev='$user' ORDER BY rating ASC, dateUploaded DESC) UNION (SELECT * FROM  lo WHERE rev='$user' ORDER BY rating ASC, dateUploaded DESC)");
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			public function getLEHistory($name,$dev){
				$result=$this->SelectQuery("(SELECT * FROM le WHERE uploadedBy='$dev' AND name='$name') UNION (SELECT * FROM oldle WHERE uploadedBy='$dev' AND name='$name') ORDER BY dateUploaded ASC");
				$LEset=$this->fetchResultSet($result);
				return $LEset;
			}

			//temporary just for noOfDownloads update of local database, should called from sister site on their db
			public function incrementDownloads($le)
			{
				$newvalue = $le->getDownloads() + 1;
				$id = $le->getID();
				$query = "UPDATE le SET downloads='$newvalue' WHERE ID='$id'";
				$result =$this->SelectQuery($query);
				
				

				return $result;
			}

			public function downloadedBy($le,$user){
				$id = $le->getID();
				$query = "UPDATE le SET rev='$user', status=2 WHERE ID='$id'";
				$result = $this->SelectQuery($query);
				return $result;
			}			

			public function reviewNow($le, $rate, $comments){
			$id = $le->getID();
			$query = "UPDATE le SET rating='$rate', comments='$comments', status=1 WHERE ID='$id'";
			$ok =$this->SelectQuery($query);
			return $ok;
			}
			
	}	
?>