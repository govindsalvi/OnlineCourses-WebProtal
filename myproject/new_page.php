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
			$id=($_GET['subj']);
			$menu=work_on_slash($_POST['menu']);
			$position=$_POST['position'];
			$visible=$_POST['visible'];		
			$about=work_on_slash($_POST['about']);
			$query="INSERT into page(sub_id,menu,position,visible,about) values($id,'$menu',$position,$visible,'$about')";
			$result=mysql_query($query,$link);
			if(confirm_query($result)) {
				header("Location:content.php");
				exit;
				}
			else 	{
				 echo "can not add new page";
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
			<?php navigation($sel_subj,$sel_page); ?>
			</td>
			<td id="page">
				<h2>Adding New Page:</h2>
                                <br/>
                    <form action="new_page.php?subj=<?php echo urlencode($sel_subj['id']);?>" method="POST">
                        <P>Page Name <input type="text" name="menu" value="" /></P>
                        <P>position<select name="position">
                                <?php $s=get_page_by_id($sel_subj['id']);
				$sub_count=mysql_num_rows($s);
				for($count=1;$count<=$sub_count+1;$count++){
					echo "<option value=\"{$count}\"";
					if($sel_subj['position']==$count)
					echo "selected";
					echo ">{$count}</option>";
					}
					?>
                                </select>
                        </p>
                        <p>Visible<input type="radio" value="0" name="visible"
			<?php if($sel_page['visible']==0) {echo "checked";}?>/>No
                        &nbsp;<input type="radio" value="1" name="visible"
			<?php if($sel_page['visible']==1) {echo "checked";}?>/>Yes
                        </p>
			<p>Page Content<textarea name="about" cols=120 rows=18 value="" ></textarea></p>
                        <input type="submit" name="submit" value="Add Page"/>
			</form>
                                &nbsp;<a href="content.php">Cancle</a>
				
			</td>
			</tr>
		</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php") ?>