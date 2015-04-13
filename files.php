<?php
	//CREATE TABLE files (fileid INTEGER PRIMARY KEY AUTOINCREMENT, file_name varchar(255), parent_folder_id INTEGER, time_created TEXT, last_edited TEXT, FOREIGN KEY(parent_folder_id) REFERENCES FOLDERS(folderid))
	class User
	{
		public $fid;
		public $name;
		public $time_created;
		public $last_edited;
		public $parent_id;
		
		/*
	 	* Creates a new user.
	 	*/
		public function __construct($fid, $name, $time_created, $last_edited, $parent_id) {
			if(isset($fid)) {
				$this->fid = $fid;
			}		

			$this->name = $firstName;
			$this->time_created = $lastName;
			$this->last_edited = $userName;
			$this->parent_id = $parent_id;
		}

	public static function getFileFromRow($row){
		$user = new User(null,null,null,null,null,null);
		
		$user->fid = $row['fileid'];
		$user->name = $row['file_name'];
		$user->time_created = $row['time_created'];
		$user->last_edited = $row['last_edited'];
		$user->parent_id = $row['parent_folder_id'];

		return $user;

	}
	}	
?>
