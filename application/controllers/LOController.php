<?php
	require_once './application/controllers/LO.php';
	require_once './application/models/LOExporter.php';
date_default_timezone_set('Asia/Manila');
	class LOController{
		private $LOexp;
		private $LOsets;
		function __construct(){
				$this->LOexp = new LOExporter;
		}

		public function getAllLO(){//return array of AllLO and store it to LOSet para f mo select ang user og LO index nlng ang kuhaon para ma kuha ang LO info  ;
				$LOsets = $this->LOexp->getAllLO();
				return $LOsets;
		}

		public function deleteLO($lo){//return array of AllLO and store it to LOSet para f mo select ang user og LO index nlng ang kuhaon para ma kuha ang LO info  ;
				$LOsets = $this->LOexp->deleteLO($lo);
				return $LOsets;
		}

		public function deleteLOHistory($lo){
				$LOsets = $this->LOexp->deleteLOHistory($lo);
				return $LOsets;
		}

		public function uploadRevision($lo){
			$LOsets = $this->LOexp->moveLO($lo);
			return $LOsets;
			
		}
		public function getAllLODev($username){//return array of AllLO and store it to LOSet para f mo select ang user og LO index nlng ang kuhaon para ma kuha ang LO info  ;
				$LOsets = $this->LOexp->getAllLODev($username);
				return $LOsets;
		}

		public function nameAvailabilty($name,$subject){
			return $this->LOexp->nameAvailabilty($name,$subject);
		}
		public function getAllLORev(){//return array of AllLO and store it to LOSet para f mo select ang user og LO index nlng ang kuhaon para ma kuha ang LO info  ;
				$LOsets = $this->LOexp->getAllLORev();
				return $LOsets;
		}

		public function getAllLORevLater($user){//return array of AllLO and store it to LOSet para f mo select ang user og LO index nlng ang kuhaon para ma kuha ang LO info  ;
				$LOsets = $this->LOexp->getAllLORevLater($user);
				return $LOsets;
		}

		public function searchLO($name,$subject,$dateStart,$dateEnd,$orderBy){//return array of LO results ;
				$LOsets =$this->LOexp->searchLO($name,$subject,$dateStart,$dateEnd,$orderBy);
				return $LOsets;
		}

		public function searchLODev($name,$subject,$dateStart,$dateEnd,$orderBy,$upby){//return array of LO results ;
				$LOsets =$this->LOexp->searchLODev($name,$subject,$dateStart,$dateEnd,$orderBy,$upby);
				return $LOsets;
		}

		public function searchLORev($name,$subject,$dateStart,$dateEnd,$orderBy){//return array of LO results ;
				$LOsets =$this->LOexp->searchLORev($name,$subject,$dateStart,$dateEnd,$orderBy);
				return $LOsets;
		}

		public function searchLORevLater($name,$subject,$dateStart,$dateEnd,$orderBy,$user){//return array of LO results ;
				$LOsets =$this->LOexp->searchLORevLater($name,$subject,$dateStart,$dateEnd,$orderBy,$user);
				return $LOsets;
		}

		public function getUserRevList($user){
				$LOset=$this->LOexp->getUserRevList($user);
				return $LOset;
		}

		public function getLOHistory($name,$dev){
				$LOsets = $this->LOexp->getLOHistory($name,$dev);
				return $LOsets;
		}

		public function reviewNow($LearningObject, $rate, $comments){
			return $this->LOexp->reviewNow($LearningObject,$rate,$comments);
		}



		public function download($LearningObject){
			
			$file = $LearningObject->getFilepath();
			if(file_exists($file))
			{
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				
			}
			//update no of downloads
			$this->LOexp->incrementDownloads($LearningObject);//returns true/false btw
			
			//exit;
		}
		public function downloadedBy($lo,$user){
			return $this->LOexp->downloadedBy($lo,$user);
		}

		public function setRev($rev,$lo){
			return $this->LOexp->setRev($rev,$lo);

		}
		
	
	}
?>