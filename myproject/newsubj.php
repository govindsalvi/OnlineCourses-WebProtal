<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php require_once("includes/session.php");?>
<?php confirm_login(); ?>
<?php getnavigation(); ?>
<?php include("includes/header1.php"); ?>
<?php $subjid=$_GET['subj'];
echo $subjid;
?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
			<?php navigation($sel_subj,$sel_page); ?>
			</td>
			<td id="page">
				<h2>Add Subject:</h2>
                                <br/>
                    <form action="news.php" method="POST">
                        <P>subject name <input type="text" name="menu" value="" /></P>
                        <P>position<select name="position">
                                <?php $s=get_subject();
				$sub_count=mysql_num_rows($s);
				for($count=1;$count<=$sub_count+1;$count++){
					echo "<option value=\"{$count}\">{$count}</option>";
					}
					?>
                                </select>
                        </p>
                        <p>Visible<input type="radio" value="0" name="visible">No
                        &nbsp;<input type="radio" value="1" name="visible">Yes
                        </p>
                        <input type="submit" name="submit" value="Enter"/>
			</form>
                                &nbsp;<a href="content.php">Cancle</a>
			</td>
			</tr>
		</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php") ?>