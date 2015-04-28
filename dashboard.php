<?php
	include('template.php');
	getHeader();
?>
<style>
	.docs {
		height:275px;
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
	.btn-group {
		display: flex;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$.noConflict();
	jQuery( document ).ready(function( $ ) {
		$('[id^=edit]').click(function(){
			prompt("Enter Name to edit", $(this).attr("title"));
		});

		$('[id^=clone]').click(function(){
			prompt("Enter Name of cloned project", "");
		});

		$('[id^=delete]').click(function(){
			confirm("Are you sure you want to delete?");
		});
	});
</script>
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
		<h3>All Projects</h3>
		<div style="margin-bottom: 10px;">
		<button>Create New Project</button>
		</div>
		<div class="outer_docs">
			<div class="docs icons">
			<?php
				for($i = 1; $i < 20; $i++){
					echo '
					<div style="height: 120px; width: 120px; float: left;">
				<img height="80" width="80" src="img/folder.png">
				<div class="btn-group left-dropdown">
					<button type="button" class="btn btn-success">Project '.$i.'</button>
					<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>

					<ul class="dropdown-menu dropdown-green" role="menu">
						<li>
						<a href="#" id="delete'.$i.'">Delete project</a>
						</li>
						<li>
						<a href="#" id="clone'.$i.'">Clone Project</a>
						</li>
						<li>
						<a href="#" id="edit'.$i.'" title="Project '.$i.'">Edit Name</a>
						</li>
					</ul>
				</div>
			</div>';
				}
			?>
			<!--<div style="height: 120px; width: 120px;">
				<img height="80" width="80" src="img/folder.png">
				<div class="btn-group left-dropdown">
					<button type="button" class="btn btn-success">Project 1</button>
					<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>

					<ul class="dropdown-menu dropdown-green" role="menu">
						<li>
						<a href="#">Delete project</a>
						</li>
						<li>
						<a href="#">Clone Project</a>
						</li>
						<li>
						<a href="#">Edit Name</a>
						</li>
					</ul>
				</div>
			</div>-->
		</div--><!--End #docs-->
		</div><!--End #outer_docs-->
	</div><!--End .col-md-12-->
</div><!--End container-->
<?php
	getFooter();
?>
