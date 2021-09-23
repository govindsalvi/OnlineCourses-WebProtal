<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php require_once("includes/session.php");?>
<?php confirm_login(); ?>
<?php getnavigation(); ?>
<?php include("includes/header1.php"); ?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
			<?php navigation($sel_subj,$sel_page); ?>
			<br/>
			<a href="newsubj.php">+ Add a New Subject</a>
			</td>
			<td id="page">
				<h2>Content Area:</h2>
				<?php
				if (!is_null($sel_subj))
				echo "{$sel_subj['menu']}";
				elseif(!is_null($sel_page))
				{
				echo "{$sel_page['about']}";
				echo "<p/>";
				echo "<a href=\"edit_page.php\">Edit Page Content</a>";
				}
				else
				echo "Select a Subject or Page to Edit";
				?>

			</td>
			</tr>
		</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php") ?>