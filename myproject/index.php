<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php getnavigation(); ?>
<?php include("includes/header.php"); ?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
			<?php publicnavigation($sel_subj,$sel_page); ?>
			<br/>
			</td>
			<td id="page">
				<?php
				if(!is_null($sel_page))
				{
				echo "<h2>{$sel_page['menu']}</h2>";
				echo "{$sel_page['about']}";
				}
				else
				echo "<h2>Welcome To On-Line Courses<h2>";
				?>

			</td>
			</tr>
		</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php") ?>