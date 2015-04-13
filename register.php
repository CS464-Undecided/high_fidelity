<?php
	include('template.php');
	getHeader();
	getNav(false);
	

	if(isset($_POST['userName'])) {
		if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) &&
			isset($_POST['email'])) {
			$firstName = sanitize($_POST['firstName']);
			$lastName = sanitize($_POST['lastName']);
			$userName = sanitize($_POST['userName']);
			$email = sanitize($_POST['email']);
			$password = sanitize($_POST['password']);

			//all fields submitted.
			if(!$databaseObj->userExists($userName)) {
				//user does NOT exist so add him.
				$newUser = new User(null, $firstName, $lastName, $userName, $email,	$password);
				$databaseObj::createUser($newUser);
				$_SESSION['userName'] = $firstName;
				header("Location: " . "index.php");
			} else {
				//user allready exists
				$errors[1] = "Error: Username allready exists";
			}
		} else {
			$errors[0] = "Error: Some fields missing. (All Required)";
		}
	} 
?>


<div class="container">
 <div class="main" >
  
  <div class="row">
  	<div class="col-md-6 col-md-offset-3">
			<h1>Register</h1>
					<?php
		       	if(isset($errors)) {
		       		foreach($errors as $error) {
		       			echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>";
		       		}
		       	}
		       ?>
     <form method="post" action="register.php">
			<div class="form-group">
				<label>First Name:</label>
				<input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
			</div>
			<div class="form-group">
				<label>Last Name:</label>
				<input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
			</div>
			<div class="form-group">
				<label>User Name:</label>
				<input type="text" class="form-control" name="userName" placeholder="Enter User Name">
			</div>
			 <div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" name="email" placeholder="Enter Your Email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Enter Your Desired Password">
			</div>
			<p>
				<button class="btn btn-theme margintop10 pull-left" type="submit">Register</button>
				<span class="pull-right margintop20">* Please fill all required form field, thanks!</span>
			</p>
	</form>
		</div>
	</div>
 </div>
</div>
<?php
	getFooter();
?>
