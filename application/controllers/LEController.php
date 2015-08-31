<?php
	require_once './application/controllers/LE.php';
	require_once './application/models/LEExporter.php';
date_default_timezone_set('Asia/Manila');
	class LEController{
		private $LEexp;
		private $LEsets;
		function __construct(){
				$this->LEexp = new LEExporter;
		}

		public function getAllLE(){//return array of AllLE and store it to LESet para f mo select ang user og LE index nlng ang kuhaon para ma kuha ang LE info  ;
				$LEsets = $this->LEexp->getAllLE();
				return $LEsets;
		}

		public function deleteLE($lo){//return array of AllLE and store it to LESet para f mo select ang user og LE index nlng ang kuhaon para ma kuha ang LE info  ;
				$LEsets = $this->LEexp->deleteLE($lo);
				return $LEsets;
		}

		public function deleteLEHistory($le){
				$LEsets = $this->LEexp->deleteLEHistory($le);
				return $LEsets;
		}

		public function uploadRevision($le){
			$LEsets = $this->LEexp->moveLE($le);
			return $LEsets;
			
		}
		public function getAllLEDev($username){//return array of AllLE and store it to LESet para f mo select ang user og LE index nlng ang kuhaon para ma kuha ang LE info  ;
				$LEsets = $this->LEexp->getAllLEDev($username);
				return $LEsets;
		}

		public function nameAvailabilty($name,$subject){
			return $this->LEexp->nameAvailabilty($name,$subject);
		}
		public function getAllLERev(){//return array of AllLE and store it to LESet para f mo select ang user og LE index nlng ang kuhaon para ma kuha ang LE info  ;
				$LEsets = $this->LEexp->getAllLERev();
				return $LEsets;
		}

		public function getAllLERevLater($user){//return array of AllLE and store it to LESet para f mo select ang user og LE index nlng ang kuhaon para ma kuha ang LE info  ;
				$LEsets = $this->LEexp->getAllLERevLater($user);
				return $LEsets;
		}

		public function searchLE($name,$subject,$dateStart,$dateEnd,$orderBy){//return array of LE results ;
				$LEsets =$this->LEexp->searchLE($name,$subject,$dateStart,$dateEnd,$orderBy);
				return $LEsets;
		}

		public function searchLEDev($name,$subject,$dateStart,$dateEnd,$orderBy,$upby){//return array of LE results ;
				$LEsets =$this->LEexp->searchLEDev($name,$subject,$dateStart,$dateEnd,$orderBy,$upby);
				return $LEsets;
		}

		public function searchLERev($name,$subject,$dateStart,$dateEnd,$orderBy){//return array of LE results ;
				$LEsets =$this->LEexp->searchLERev($name,$subject,$dateStart,$dateEnd,$orderBy);
				return $LEsets;
		}

		public function searchLERevLater($name,$subject,$dateStart,$dateEnd,$orderBy,$user){//return array of LE results ;
				$LEsets =$this->LEexp->searchLERevLater($name,$subject,$dateStart,$dateEnd,$orderBy,$user);
				return $LEsets;
		}

		public function getUserRevList($user){
				$LEset=$this->LEexp->getUserRevList($user);
				return $LEset;
		}

		public function getLEHistory($name,$dev){
				$LEsets = $this->LEexp->getLEHistory($name,$dev);
				return $LEsets;
		}

		public function reviewNow($LearningObject, $rate, $comments){
			return $this->LEexp->reviewNow($LearningObject,$rate,$comments);
		}



		public function download($LearningElement){
			
			$file = $LearningElement->getFilepath();
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
			$this->LEexp->incrementDownloads($LearningElement);//returns true/false btw
			
			//exit;
		}
		public function downloadedBy($le,$user){
			return $this->LEexp->downloadedBy($le,$user);
		}

		public function setRev($rev,$le){
			return $this->LEexp->setRev($rev,$le);

		}
		
	
	}
?>