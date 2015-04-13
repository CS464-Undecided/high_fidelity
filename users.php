<?php
	
	class User
	{
		public $PID;
		public $firstName;
		public $lastName;
		public $userName;
		public $email;
		public $password;
		
		/*
	 	* Creates a new user.
	 	*/
		public function __construct($PID, $firstName, $lastName, $userName, $email, $password) {
			$saltValue = "cs464";
			if(isset($PID)) {
				$this->PID = $PID;
			}		

			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->userName = $userName;
			$this->email = $email;
			//Hashing passsword with salt
			$this->password = md5($saltValue.$password);
		}

	public static function getUserFromRow($row){
		$user = new User(null,null,null,null,null,null);
		
		$user->PID = $row['id'];
		$user->userName = $row['username'];
		$user->firstName = $row['first_name'];
		$user->lastName = $row['last_name'];
		$user->password = $row['password'];
		$user->email = $row['email'];

		return $user;

	}
	}	
?>
