<?php include("includes/connections.php")?>
<?php include("includes/functions.php")?>
<?php require_once("includes/session.php");?>
<?php confirm_login(); ?>
<?php if(isset($_POST['submit']))
	{
		
		if(empty($_POST['username'])||empty($_POST['password']))
		$msg="none of username or password is left empty";
		else
		{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="INSERT into user (username,password) values ('$username','$password') ";
		mysql_query($query,$link);
		$msg="user successfully created";
		}
		
	}
?>
<?php include("includes/header1.php"); ?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
				<a href="staff.php">Back to Staff page</a></td>
			<td id="page">
				<h2>Add new user</h2>
				<p> Please Provides the details</p>
				<form  method="POST" action="adduser.php">
					username <input type="text" name="username" value="" /><br/>
					password <input type="password" name="password" /><br/>
					<p><input type="submit" value="Create User" name="submit" /></p><br/>
					<?php echo $msg; ?>
				<form>
			</td> 
			</tr>
		</table>
	</div>
<?php
include("includes/footer.php");
?>