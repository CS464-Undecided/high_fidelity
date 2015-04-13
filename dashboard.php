<?php
	include('template.php');
	getHeader();
?>
<style>
	.docs {
		height:230px;
		width: 100%;
		overflow-y:scroll;
		
		
		padding: 5px;
	}
	
	.outer_docs {
		border:2px solid #005fb2;
		border-radius: 25px;
		padding:10px;
	}
	.file-icon {
		float: left;
		margin: 7px;
	}
</style>
<?php
	getNav(false);
?>

<!--Insert Content here-->
<div class="container">

	<div class="col-md-6">
		<h2>Dashboard</h2>
	</div>
	<div class="col-md-6">
		Hello, User
	</div>

	<div class="col-md-12">
		<h3>Scanned Documents</h3>
		<div class="outer_docs">
			<div class="docs icons">
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="zip"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="folder"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="xls"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="doc"></div></a>
				<a href="#"><div class="file-icon file-icon-lg" data-type="pdf"></div></a>
			</div><!--End #docs-->
		</div><!--End #outer_docs-->
	</div><!--End .col-md-12-->
</div><!--End container-->
<?php
	getFooter();
?>
