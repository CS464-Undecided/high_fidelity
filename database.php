<?php
require_once 'users.php';
/*
 * I'm thinking this class will be used for all database operations Feel free to alter code 0 (false) and 1 (true) for boolean flags -Ryan S.
 */
class database extends PDO {
	public $salt = "cs464";
	// Grabs from database
	public function __construct() {
		//$this->createDatabase();
		if ((! file_exists(dirname(__FILE__) .'/existingUsers.db')) 
			&& (! file_exists(dirname(__FILE__) .'/files.db'))){
			parent::__construct ( "sqlite:./existingUsers.db" );
			parent::__construct ( "sqlite:./files.db" );
			self::createDataBase();
		}
		
	}
	
	/*
	 * Creates a database by dropping old tables and adding new ones This should only be called if a .dbo file does not exist
	 */
	public static function createDatabase() {
		// Connect to database
		global $dbh;
		try {
			$dbh = new PDO ( "sqlite:./existingUsers.db" );
		} catch ( PDOException $e ) {
			echo 'CONNECTION FAILED: ' . $e->getMessage ();
			die ();
		}
		
		// Dropping old tables
		$sql = "DROP TABLE IF EXISTS Users";
		$status = $dbh->exec ( $sql );
		if ($status === FALSE) {
			print_r ( $dbh->errorInfo () );
		}
		// Dropping old tables
		$sql = "DROP TABLE IF EXISTS PDFs";
		$status = $dbh->exec ( $sql );
		if ($status === FALSE) {
			print_r ( $dbh->errorInfo () );
		}
		// Creating new tables
		$sql = "CREATE TABLE Users (id INTEGER PRIMARY KEY AUTOINCREMENT, first_name varchar(50), last_name varchar(50),
						username varchar(50), email varchar(55), password varchar(100));";
		$status = $dbh->exec ( $sql );
		if ($status === FALSE) {
			echo "failed User";
			print_r ( $dbh->errorInfo () );
		}
		
		//Raw value determines where it is scanned or not. 0 means its been scanned, 1 means its a PDF
		$sql = "CREATE TABLE PDFs (UserID INTEGER AUTOINCREMENT, image_loc INTEGER, raw INTEGER);";
		$status = $dbh->exec ( $sql );
		if ($status === FALSE) {
			echo "failed PDFs";
			print_r ( $dbh->errorInfo () );
			die ();
		}
		
		
		
		
		global $db_docs;
		try {
			$db_docs = new PDO ( "sqlite:./files.db" );
		} catch ( PDOException $e ) {
			echo 'CONNECTION FAILED: ' . $e->getMessage ();
			die ();
		}
		
		
		$sql = "CREATE TABLE FOLDERS (folderid INTEGER PRIMARY KEY AUTOINCREMENT, folder_name varchar(255), time_created TEXT, last_edited TEXT);";
		$status = $db_docs->exec ( $sql );
		if ($status === FALSE) {
			echo "failed folders";
			print_r ( $db_docs->errorInfo () );
			die ();
		}
		
		$sql = "CREATE TABLE files (fileid INTEGER PRIMARY KEY AUTOINCREMENT, file_name varchar(255), parent_folder_id INTEGER, time_created TEXT, last_edited TEXT, FOREIGN KEY(parent_folder_id) REFERENCES FOLDERS(folderid));";
		$status = $db_docs->exec ( $sql );
		if ($status === FALSE) {
			echo "failed files";
			print_r ( $db_docs->errorInfo () );
			die ();
		}
		
		//adding default users
		self::addUsers ();
	}
	
	
	
	
	
	
	
	
	// adds default users
	function addUsers() {//($PID, $firstName, $lastName, $userName, $email, $password)
		$ryan = new User ( null,"Ryan", "Skinner", "rskinner", "rskinner956@gmail.com", "password");
		self::createUser($ryan);
	}
	
	// Grabs all users from database
	function getUsers() {
		$sql = "SELECT * FROM users";
		$result = $this->query ( $sql );
		
		if ($result === FALSE) {
			echo '<pre class="bg-danger">';
			print_r ( $this->errorInfo () );
			echo '</pre>';
			return array ();
		}
		
		$users = array ();
		foreach ( $result as $row ) {
			$users [] = User::getUserFromRow ( $row );
		}
		if (empty ( $users )) {
			return false;
		}
		return $users;
	}
	
	//Gets user given the PID
	function getUserFromPID($pID){
		$users = $this->getUsers ();
		foreach ( $users as $user ) {
			if ($pID == $user->PID) {
				return $user;
			}
		}
		return null;
		
	}
	
	// finds user with same username and password
	function findUser($username, $password) {
		$salt = "cs464";
		
		$users = $this->getUsers ();
		foreach ( $users as $user ) {
			
			if ($username == $user->userName) {
				if ($user->password == md5 ( $salt . $password )) {
					return $user;
				} else {
					return null;
				}
			}
		}
		return null;
	}
	
	//gets user info given the username
	function getUser($username) {
		$users = $this->getUsers ();
		foreach ( $users as $user ) {
			if ($username == $user->userName) {
					return $user;
			}
		}
		return null;
	}
	
	//checks to see if a user exist
	public function userExists($username) {
		$users = $this->getUsers ();
		if ($users === FALSE) {
			return false;
		}
		foreach ( $users as $user ) {
			if ($username == $user->userName) {
				return true;
			}
		}
		return false;
	}
	
	// returns false if user doesn't exist
	public function getPID($username) {
		$users = $this->getUsers ();
		if ($users === FALSE) {
			return false;
		}
		foreach ( $users as $user ) {
			if ($username == $user->userName) {
				return $user->PID;
			}
		}
		return false;
	}
	
	//creates user
	public static function createUser($user) {
		try {
			$dbh = new PDO ( "sqlite:./existingUsers.db" );
		} catch ( PDOException $e ) {
			echo 'CONNECTION FAILED: ' . $e->getMessage ();
			die ();
		}
		//A different way of running database operations. Prepare a statement then execute it.
		$sql_user = "INSERT INTO Users (first_name, last_name, username, email, password) VALUES (:first_name, :last_name, :userName, :email, :password)";
		$users_stm = $dbh->prepare ( $sql_user );
		if (! $users_stm->execute ( array (
				':first_name' => $user->firstName,
				':last_name' => $user->lastName,
				':userName' => $user->userName,
				':email' => $user->email,
				':password' => $user->password
		) ))
			
			$dbh->exec ( $sql );
	}
	
	// Checks to make sure user is logged in
	function loginRequired() {
		global $_SESSION;
		global $config;
		
		if (isset ( $_SESSION ["userName"] ) && isset ( $_SESSION ["color"] )) {
			$users = $this->getUsers ();
			
			foreach ( $users as $u ) {
				
				if ($u->userName == $_SESSION ["userName"]) {
					
					return;
				}
			}
			header ( "Location: login.php" );
			exit ();
		}
		$_SESSION ['redirect'] = $_SERVER ["REQUEST_URI"];
		// If we got here then we need to log in
		header ( "Location: login.php" );
		exit ();
	}
	
	/*
	* Adds image location to the table Returns completion message
	*/
	public function addPDF($user, $path, $Raw) {
		try {
			$dbh = new PDO ( "sqlite:./existingUsers.db" );
		} catch ( PDOException $e ) {
			echo 'CONNECTION FAILED: ' . $e->getMessage ();
			die ();
		}
			$pID =  $this->getPID($user->userName);
			$sql = "INSERT INTO PDFs (UserID, image_loc, Raw) VALUES ('$pID','$path', '$Raw')";
			$dbh->query ( $sql );
			$msg = "PDF uploaded successfully! =]";
			return $msg;
	}
		/*
	 * In order to update all the forum data for the user must be passed in...
	 * I think we can make into if its easier...
	 * first_name varchar(50), last_name varchar(50),
						username varchar(50),  gender varchar(50), mobile_number varchar(13),
						immage_loc varchar(200), email varchar(55), password varchar(100),
						question_id INTEGER, question_answer varchar(50), is_admin INTEGER);";
	 
	public function Update($firstName, $lastName, $email, $userName){
		try {
			$dbh = new PDO ( "sqlite:./validUsers.db" );
		} catch ( PDOException $e ) {
			echo 'CONNECTION FAILED: ' . $e->getMessage ();
			die ();
		}
		$pID = $this->getPID($userName);
		$statement = $dbh->prepare("UPDATE User SET first_name = :firstName, last_name = :lastName,
				 gender = :gender, mobile_number = :mobile, immage_loc = :imageLocation, 
				 email = :email WHERE id = :pid");
		$statement->execute(array(':pid' => $pID , ':email' => $email, ':imageLocation' => $imageLocation, ':mobile' => $mobileNumber,':gender' => $gender, ':firstName' => $firstName, ':lastName' => $lastName));
		$msg = "Information updated successfully! 8-]";
		return $msg;
	}*/
	
	public function getUserPDFs($user) {
		try {
			$dbh = new PDO ( "sqlite:./existingUsers.db" );
		} catch ( PDOException $e ) {
			echo 'CONNECTION FAILED: ' . $e->getMessage ();
			die ();
		}
		$statement = $dbh->prepare("SELECT * FROM PDFs WHERE UserID= :pid");
		$statement->execute(array(':pid' => $user->PID));
		$row = $statement->fetchAll(); 
		for($j = 0; $j < count($row);$j++) {
			$imageData[$j] = $row[$j]['image_loc'];
		}
		if(isset($imageData)) {
			return $imageData;
		} else {
			return false;
		}
		
	}
}


?>

