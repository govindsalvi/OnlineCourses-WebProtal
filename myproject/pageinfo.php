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
				<h2><?php echo $sel_page['menu']; ?> </h2>
				<?php
				if (!is_null($sel_subj))
				echo "{$sel_subj['menu']}";
				elseif(!is_null($sel_page))
				{
				//$id=$_GET["page"];
				//echo $id;
				echo "{$sel_page['about']}";
				echo "<p/>";
				$q="select sub_id from page where id={$sel_page['id']}";
				$r=mysql_query($q);
				$subj=mysql_fetch_array($r);
				//echo $subj['sub_id'];
				echo "<a href=\"edit_page.php?pageid=".urlencode($sel_page['id'])."&subj=".urlencode($subj['sub_id'])."
				\">Edit Page Content</a>";
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