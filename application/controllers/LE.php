<?php
	//require_once("dbConnection.php");
	class LE{
		private $id;
		private $name;
		private $subject;
		private $description;
		private $downloads;
		private $dateUploaded;
		private $filepath;
		private $rating;
		private $comments;
		private $status;
		private $rev;
		private $uploadedBy;
		/* public function  __construct($name,$subject,$description,$downloads,$dateUploaded,$filepath) {
			$this->$name = $name;
			$this->$subject= $subject;
			$this->$description= $description;
			$this->$downloads =$downloads;
			$this->$dateUploaded = $dateUploaded;
			$this->$filepath= $filepath;
		}*/
		
		public function getUploadedBy(){
			return $this->uploadedBy;
		}
		
		public function getID(){
			return $this->id;
		}
		
		public function getStatus(){
			return $this->status;
		}

		public function getName(){
			return $this->name;
		}
		
		public function getSubject(){
			return $this->subject;
		}
		public function getDescription(){
			return $this->description;
		}
		
		public function getDownloads(){
			return $this->downloads;
		}
		public function getDateUploaded(){
			return $this->dateUploaded;
		}
		public function getFilepath(){
			return $this->filepath;
		}

		public function getRating(){
			return $this->rating;
		}

		public function getComments(){
			return $this->comments;
		}

		public function getRev(){
			return $this->rev;
		}

		public function getType(){
			return $this->type;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function setRev($rev){
			$this->rev = $rev;
		}
		public function setID($id){
			$this->id = $id;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}

		public function setName($name){
			$this->name = $name;
		}
		
		public function setSubject($subject){
			 $this->subject= $subject;
		}
		public function setDescription($description){
			 $this->description= $description;
		}
		
		public function setDownloads($downloads){
			 $this->downloads =$downloads;
		}
		public function setDateUploaded($dateUploaded){
			 $this->dateUploaded = $dateUploaded;
		}
		public function setFilepath($filepath){
			$this->filepath= $filepath;
		}

		public function setRating($rating){
			$this->rating = $rating;
		}

		public function setComments($comments){
			$this->comments = $comments;
		}
		
		public function setUploadedBy($uploadedBy){
			 $this->uploadedBy= $uploadedBy;
		}
		
	}
?>