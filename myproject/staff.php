<?php include_once("includes/session.php"); ?>
<?php confirm_login(); ?>
<?php
	include("includes/header1.php");
?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
				&nbsp;</td>
			<td id="page">
				<h2>Staff Menu</h2>
				<p> Wellcome to Staff Menu</p>
				<ul>
				<li><a href="content.php">Manage Website Content</a></li>
				<li><a href="adduser.php">Add New User</a></li>
				<li><a href="logout.php">Logout</a>
			</td>
			</tr>
		</table>
	</div>
<?php
include("includes/footer.php");
?>