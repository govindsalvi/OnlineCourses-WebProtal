<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php require_once("includes/session.php");?>
<?php confirm_login(); ?>
<?php
	if(isset($_POST['submit']))
	{
		$error=array();
		$requir_field=array("menu","position","about");
		foreach($requir_field as $a)
		{
			if(!isset($_POST[$a])||empty($_POST[$a]))
			$error[]=$a;
		}
		if(empty($error))
			{
			$id=($_GET['pageid']);
			$sub_id=($_GET['subj']);
			
			//echo $sub_id;
			$menu=work_on_slash($_POST['menu']);
			$position=$_POST['position'];
			$visible=$_POST['visible'];		
			$about=work_on_slash($_POST['about']);
			//echo $about;
			$query="UPDATE page SET sub_id={$sub_id},menu='{$menu}',position={$position},visible={$visible},about='{$about}' WHERE id={$id}";
			$result=mysql_query($query,$link);
			if(confirm_query($result)) {
				header("Location:content.php");
				exit;
				}
			else 	{
				 echo "Updation faild";
				}
			}
	}
?>
<?php getnavigation(); ?>
<?php include("includes/header1.php"); ?>
		<div id="main">
		<table id="structure">
			<tr>
			<td id="navigation">
			<?php navigation($sel_subj,$sel_page);?>
			<?php $pageid=$_GET['pageid'];
				$sub_id=$_GET['subj'];
				$subjinfo=get_sub_by_id($sub_id);
				$pageinfo=get_page_th_id($pageid);
				//echo $pageinfo['menu'];
			?>
			</td>
			<td id="page">
				<h2>Edit Page:<?php //echo " ".$sel_subj['menu']; ?></h2>
                                <br/>
                    <form action="edit_page.php?pageid=<?php echo urlencode($pageinfo['id']);?>&
						subj=<?php echo urlencode($subjinfo['id']);?>" method="POST">
                        <p>Page Name <input type="text" name="menu" value="<?php echo $pageinfo['menu'];?>" /></p>
                        <p>position
				<select name="position">
                                <?php $s=get_page_by_id($subjinfo['id']);
				$sub_count=mysql_num_rows($s);
				for($count=1;$count<=$sub_count;$count++){
					echo "<option value=\"{$count}\"";
					if($pageinfo['position']==$count)
					echo "selected";
					echo ">{$count}</option>";
					}
					?>
                                </select>
                        </p>
                        <p>Visible
				<input type="radio" value="0" name="visible"
				<?php if($pageinfo['visible']==0) {echo "checked";}?>/>No
				&nbsp;<input type="radio" value="1" name="visible"
				<?php if($pageinfo['visible']==1) {echo "checked";}?>/>Yes
                        </p>
			<p>
			<textarea name="about" cols=120 rows=18>
				<?php echo $pageinfo['about'];?>
			</textarea>
			</p>
                        <input type="submit" name="submit" value="Edit Page"/>
			&nbsp;&nbsp;
			<a href="deletepage.php?pageid=<?php echo urlencode($pageid); ?>" onClick="return confirm('Are you sure?');">
				Delete</a>
			</form>
                                &nbsp;<a href="content.php">Cancle</a>
				
			</td>
			</tr>
		</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php") ?>