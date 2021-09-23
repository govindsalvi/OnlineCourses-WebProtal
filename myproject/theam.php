<?php include("includes/connections.php")?>
<?php include("includes/functions.php")?>
<?php require_once("includes/session.php");?>
<?php confirm_login(); ?>
<?php if(isset($_POST['submit']))
	{
		
		$theam=$_POST['theam'];
		$query="select * from user where username='{$username}' and password='{$password}' ";
		$row=mysql_query($query);

		
	}
?>
<?php include("includes/header1.php"); ?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
			<td id="page">
				<h2>Select theam</h2>
				<p></p>
				<form  method="POST" action="theam.php">
					most wanted <input type="radio" name="theam" value="public" /><br/>
					light       <input type="radio" name="theam" value="public1"/><br/>
					<p><input type="submit" value="Enter" name="submit" /></p><br/>
					<?php echo $msg; ?>
				<form>
			</td> 
			</tr>
		</table>
	</div>
<?php
include("includes/footer.php");
?>