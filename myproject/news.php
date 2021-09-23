<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php
	$error=array();
	if(!isset($_POST['menu'])||empty($_POST['menu']))
	$error[]='menu';
	if(!isset($_POST['position'])||empty($_POST['position']))
	$error[]='position';
	//if(!isset($_POST['visible'])||empty($_POST['visible']))
	//$error[]='visible';
	if(!empty($error))
	{
		header("Location: newsubj.php");
		exit;
	}
?>
<?php
$menu=work_on_slash($_POST['menu']);
$position=$_POST['position'];
$visible=$_POST['visible'];
?>
<?php
$query="insert into subject (menu,position,visible) values('$menu',$position,$visible)";
if(mysql_query($query))
{
	header("Location: content.php");
	exit;
}
else
	echo "an error occurs";
?>
<?php include("includes/close.php") ?>