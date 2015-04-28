<?php
	//CREATE TABLE FOLDERS (folderid INTEGER PRIMARY KEY AUTOINCREMENT, folder_name varchar(255), time_created TEXT, last_edited TEXT)
	class User
	{
		public $fid;
		public $name;
		public $time_created;
		public $last_edited;
		
		/*
	 	* Creates a new user.
	 	*/
		public function __construct($fid, $name, $time_created, $last_edited) {
			if(isset($fid)) {
				$this->fid = $fid;
			}		

			$this->name = $firstName;
			$this->time_created = $lastName;
			$this->last_edited = $userName;
		}

	public static function geFolderFromRow($row){
		$user = new User(null,null,null,null,null,null);
		
		$user->fid = $row['folderid'];
		$user->name = $row['folder_name'];
		$user->time_created = $row['time_created'];
		$user->last_edited = $row['last_edited'];

		return $user;

	}
	}	
?>
