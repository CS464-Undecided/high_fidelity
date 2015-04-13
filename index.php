<?php
	include('template.php');
	getHeader();
	if(isset($_SESSION['userName'] ) ){
		echo "<br>user:".$_SESSION['userName'];
	}
	
	getNav();
	getFooter();
?>
