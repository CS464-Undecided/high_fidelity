<?php
	session_name("CS464undecided");
	session_start();
	include('global.php');
	function getHeader(){
		echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Data Haus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link rel="stylesheet" href="css/xenon-core.css">
<link rel="stylesheet" href="css/xenon-forms.css">
<link rel="stylesheet" href="css/xenon-components.css">
<link rel="stylesheet" href="css/xenon-skins.css">
<link rel="stylesheet" href="css/custom.css">

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="css/default.css" rel="stylesheet" />

<!--File Icons-->
<link href="css/fileicon.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->';
	}

	//set $headline to true to print the #inner-headline div
	function getNav($headline=false){
		$homeActive = '';
		$uploadActive = '';
		$dashActive = '';
		$exportActive = '';

		if(basename($_SERVER['PHP_SELF']) == "index.php"){
			$homeActive = ' class="active" ';
		}else if(basename($_SERVER['PHP_SELF']) == "upload.php"){
			$uploadActive = ' class="active" ';
		}else if(basename($_SERVER['PHP_SELF']) == "dashboard.php"){
			$dashActive = ' class="active" ';
		}else if(basename($_SERVER['PHP_SELF']) == "export.php"){
			$exportActive = ' class="active" ';
		}





		echo '</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/datalogo.png" alt="Data Haus"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li'.$homeActive.'><a href="index.php">Home</a></li>
                        <li'.$uploadActive.'><a href="upload.php">Upload</a></li>
                        <li'.$dashActive.'><a href="dashboard.php">Dashboard</a></li>
                        <li '.$exportActive.'><a href="export.php">Export</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->';

	if($headline){
	echo '<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="home.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">'.basename($_SERVER['PHP_SELF'], ".php").'</li>
				</ul>
			</div>
		</div>
	</div>
	</section><!-- End #inner-headline section -->';
	}



	echo '<section id="content">
	';
	}

	function getFooter(){
		echo '
	</section><!-- End #content section -->
	<footer>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Group Undecided 2015</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- ========================== JavaScript ======================== -->

<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="js/validate.js"></script>
</body>
</html>';
	}
?>


