<?php
	require_once './application/controllers/LO.php';
	class LOExporter{
			public function Connect(){
				$Connection = mysql_connect("localhost","loop","loop");
				mysql_select_db("loop",$Connection);
			}
		   public function disconnect()
			{
				mysql_close();
			}

			public function getAllDownloadableLO(){
				$result =$this->SelectQuery("SELECT * FROM  lo WHERE rating=5 ORDER BY dateUploaded DESC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function nameAvailabilty($name,$subject){//return bool
				$ok = true;
				$result = $this->SelectQuery("SELECT * FROM `lo` WHERE `name`='$name' and `subject`='$subject' ");
				if($result){
					$ok=false;
				}
				return $ok;
			}
			
			public function insertLO($name,$subject,$description,$filepath,$uploadedBy){
				$ok = true;
				$result = $this->SelectQuery("INSERT INTO `lo`(`name`, `subject`, `description`, `dateUploaded`, `filepath`, `uploadedBy`) VALUES ('$name', '$subject', '$description', NOW(), '$filepath', '$uploadedBy') ");
				if($result)
					$ok = false;
				return $ok;
			}
			public function getAllLO(){
				$result =$this->SelectQuery("SELECT * FROM  lo ORDER BY dateUploaded DESC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}
	
			public function getAllLODev($username){
				$result =$this->SelectQuery("SELECT * FROM  lo WHERE uploadedBy='$username' ORDER BY dateUploaded DESC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function getAllLORev(){
				$result =$this->SelectQuery("SELECT * FROM  lo WHERE rating<4 and rating>0 and rev='' ORDER BY dateUploaded DESC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function getAllLORevLater($user){
				$result =$this->SelectQuery("SELECT * FROM  lo WHERE rating<4 and rating>0 and status=2 and rev='$user' ORDER BY dateUploaded DESC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			private function SelectQuery($Query){//return bool
				$this->Connect();
				$result = mysql_query($Query);
				$this->disconnect();
				return $result;
			}
			public function fetchResultSet($result){
				$LOset=array();
				while($row = mysql_fetch_array($result))
				{
				//	$LOset[]= new LO($row['name'],$row['subject'],$row['description'], $row['downloads'],$row['dateUploaded'],$row['filepath']); 
					$temp = new LO;
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
					
					$LOset[]= $temp;
				}
				return $LOset;
			}
			public function searchLO($name,$subject,$dateStart,$dateEnd,$orderBy){
				$query ="SELECT * FROM `lo` WHERE (`name` LIKE '%$name%')";
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
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function deleteLO($lo){
				$id = $lo->getID();
				$query = "DELETE FROM lo WHERE ID = '$id'";
				$result =$this->SelectQuery($query);
				
				return $result;
			}

			public function deleteLOHistory($lo){
				$id = $lo->getID();
				$name = $lo->getName();

				$query1 = "DELETE FROM oldlo WHERE ID = '$id' AND name = '$name'";
				$result1 =$this->SelectQuery($query1);
				$query = "DELETE FROM lo WHERE ID = '$id' AND name = '$name'";
				$result =$this->SelectQuery($query);

				return $result;

			}

			public function moveLO($lo){
				$name=$lo->getName();	
				$subject=$lo->getSubject();	
				$description=$lo->getDescription();
				$downloads=$lo->getDownloads();
				$date=$lo->getDateUploaded();	
				$path=$lo->getFilepath();	
				$rate=$lo->getRating();	
				$comments=$lo->getComments();
				$uploaded=$lo->getUploadedBy();
				$status=$lo->getStatus();	
				$reviewer=$lo->getRev();
				$type = $lo->getType();

				$query = "INSERT INTO oldlo VALUES(NULL,'$name','$subject','$description','$downloads','$date','$path','$rate','$comments','$uploaded','$status','$reviewer','$type')";
				$result = $this->SelectQuery($query);
				if(!$result)
					echo $result;
				else
					return $this->deleteLO($lo);
			}

			public function setRev($rev,$lo){
				$id = $lo->getID();
				//print_r($lo);
				//echo $rev;
				$query = "UPDATE lo SET rev='$rev' WHERE ID = '$id'";
				$result =$this->SelectQuery($query);
				return result;

			}

			public function searchLODev($name,$subject,$dateStart,$dateEnd,$orderBy,$upby){
				$query ="SELECT * FROM `lo` WHERE (`name` LIKE '%$name%')";
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
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}
			
			public function searchLORev($name,$subject,$dateStart,$dateEnd,$orderBy){
				$query ="SELECT * FROM `lo` WHERE (`name` LIKE '%$name%')";
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
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function searchLORevLater($name,$subject,$dateStart,$dateEnd,$orderBy,$user){
				$query ="SELECT * FROM `lo` WHERE (`name` LIKE '%$name%') AND (rev=$user)";
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
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function getUserRevList($user){
				$result=$this->SelectQuery("(SELECT * FROM  lo WHERE rev='$user' AND rating<5 ORDER BY rating ASC, dateUploaded DESC) UNION (SELECT * FROM  le WHERE rev='$user' AND rating<5 ORDER BY rating ASC, dateUploaded DESC)");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			public function getLOHistory($name,$dev){
				$result=$this->SelectQuery("(SELECT * FROM lo WHERE uploadedBy='$dev' AND name='$name') UNION (SELECT * FROM oldlo WHERE uploadedBy='$dev' AND name='$name') ORDER BY dateUploaded ASC");
				$LOset=$this->fetchResultSet($result);
				return $LOset;
			}

			//temporary just for noOfDownloads update of local database, should called from sister site on their db
			public function incrementDownloads($lo)
			{
				$newvalue = $lo->getDownloads() + 1;
				$id = $lo->getID();
				$query = "UPDATE lo SET downloads='$newvalue' WHERE ID='$id'";
				$result =$this->SelectQuery($query);
				
				

				return $result;
			}

			public function downloadedBy($lo,$user){
				$id = $lo->getID();
				$query = "UPDATE lo SET rev='$user', status=2 WHERE ID='$id'";
				$result = $this->SelectQuery($query);
				return $result;
			}			

			public function reviewNow($lo, $rate, $comments){
			$id = $lo->getID();
			$query = "UPDATE lo SET rating='$rate', comments='$comments', status=1 WHERE ID='$id'";
			$ok =$this->SelectQuery($query);
			return $ok;
			}
			
	}	
?>