<?php include("includes/connections.php")?>
<?php include("includes/functions.php")?>
<?php require_once("includes/session.php");?>
<?php if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from user where username='{$username}' and password='{$password}' ";
		$row=mysql_query($query);
		if(mysql_num_rows($row)==1)
		{
		$_SESSION['name']=$username;
		header("Location:  staff.php");
		exit;
		}
		else
		$msg="you have entered wrong usename or password please check<br/> CAPSLOCK is on or off";
		
	}
?>
<?php include("includes/header.php"); ?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
				<a href="index.php">Back to public web</a></td>
			<td id="page">
				<h2>Login page</h2>
				<p> Please Provides the details</p>
				<form  method="POST" action="login.php">
					username <input type="text" name="username" value="" /><br/>
					password <input type="password" name="password" /><br/>
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