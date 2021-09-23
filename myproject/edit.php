<?php ob_start(); ?>
<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php require_once("includes/session.php");?>
<?php confirm_login(); ?>
<?php
	if(isset($_POST['submit']))
	{
		//$id=($_GET['subj']);
		//	echo $id;
		$error=array();
		$requir_field=array("menu","position");
		foreach($requir_field as $a)
		{
			if(!isset($_POST[$a])||empty($_POST[$a]))
			$error[]=$a;
		}
			if(empty($error))
			{
			$id=($_GET['subj']);
			//echo $id;
			$menu=($_POST['menu']);
			//echo $menu;
			$position=$_POST['position'];
			//echo $position;
			$visible=$_POST['visible'];
			
			
			$query="UPDATE subject SET menu='{$menu}',position={$position},visible={$visible} WHERE id={$id}";
			$result=mysql_query($query,$link);
			if(confirm_query($result)) { }
			else {
				 echo "updation faild";
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
				<h2>Edit Subject:<?php echo " ".$sel_subj['menu']; ?></h2>
                                <br/>
                    <form action="edit.php?subj=<?php echo urlencode($sel_subj['id']); ?>" method="POST">
                        <P>subject name <input type="text" name="menu" value="<?php echo $sel_subj['menu'];?>" /></P>
                        <P>position<select name="position">
                                <?php $s=get_subject();
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
			<?php if($sel_subj['visible']==0) {echo "checked";}?>/>No
                        &nbsp;<input type="radio" value="1" name="visible"
			<?php if($sel_subj['visible']==1) {echo "checked";}?>/>Yes
                        </p>
                        <input type="submit" name="submit" value="Edit Subject"/>
			&nbsp;&nbsp;
			<a href="deletesubj.php?subj=<?php echo urlencode($sel_subj['id']); ?>" onClick="return confirm('Are you sure?');">
				Delete</a>
			</form>
                                &nbsp;<a href="content.php">Cancle</a>
				<br/>
				<br/>
			 <hr/><h2>Page In This Subject</h2>
			 &nbsp;&nbsp;
			 <?php
			 $query="select * from page where sub_id={$sel_subj['id']} order by position asc";
			 $row=mysql_query($query,$link);
			 echo "<ul>";
			 while($r=mysql_fetch_array($row))
				{
				echo "<li>";
				echo $r[2];
				echo "</li>";
				}
			echo "</ul>";
			 ?>
			 <br/>
			 <a href="new_page.php?subj=<?php echo urlencode($sel_subj['id']); ?>">+ Add a new page to this subject</a>				
			</td>
			</tr>
		</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php") ?>
<?php ob_end_flush(); ?>