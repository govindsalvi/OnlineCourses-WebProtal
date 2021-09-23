<?php include("includes/connections.php") ?>
<?php include("includes/functions.php") ?>
<?php
$id=$_GET['pageid'];
//echo $id;
$query="DELETE FROM page WHERE id={$id} LIMIT 1";
mysql_query($query,$link);
if(mysql_affected_rows()==1)
    {
    header("Location: content.php");
    exit;
    }
    else
    {
        echo "<p>page deletion error.mysql_error().</p>";
        echo "<a href=content.php>Return to main page</a>";
    }

?>
<?php include("includes/close.php") ?>