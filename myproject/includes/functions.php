<?php
	function work_on_slash($input)
		{
				$magic_quotes_active=get_magic_quotes_gpc();
				$newverson=function_exists("mysql_real_escape_string");
				if($newverson)
					{
					if($magic_quotes_active)
					$input=stripcslashes($input);
					$input=mysql_real_escape_string($input);
					}
				else
				{
					if(!$magic_quotes_active)
					$input=addcslashes($input);
				}
				return $input;
		}
	function get_subject($public=true)
		{
			global $link;
			$query="select * from subject";
			if($public)
			$query.= " WHERE visible=1 ";
			$query.=" order by position asc";
			$result=mysql_query($query,$link);
			if(confirm_query($result))
				return $result;

				}
	function confirm_query($var)
		{
		if(!$var)
		{
			die("query operation faild".mysql_error());
		return false;
		}
		else return true;
		}
	function get_page()
		{
			global $link;
			$query="select * from page order by position asc";
			$result=mysql_query($query,$link);
			if(confirm_query($result))
				return $result;

				}
	
	function get_page_by_id($sub_id,$public=true)
		{
		global $link;
		$query="select * from page where sub_id={$sub_id}";
		if($public)
		$query.=" AND visible=1 ";
		$query.=" order by position asc";
		$result=mysql_query($query,$link);
		if(confirm_query($result))
			return $result;
		}
	function get_sub_by_id($subj_id)
	{
	global $link;
	$query="select * from subject where id={$subj_id} LIMIT 1";
	$r=mysql_query($query,$link);
	if($rr=mysql_fetch_array($r)){
	  return $rr; }
		else return null;
		
	}
	function get_page_th_id($page_id)
		{
		global $link;
		$query="select * from page where id={$page_id} LIMIT 1";
		$r=mysql_query($query,$link);
	if($rr=mysql_fetch_array($r)){
	  return $rr; }
		else return null;
		}
	function get_default_page($subj)
	{
		$pageset=get_page_by_id($subj);
		if($firstpage=mysql_fetch_array($pageset))
		return $firstpage;
		else NULL;
	}
	function getnavigation(){
		
		global $sel_page;
		global $sel_subj;
		if(isset($_GET['subj']))
	{
	$sel_subj=get_sub_by_id($_GET['subj']);
	$sel_page=get_default_page($sel_subj['id']);
	}
	elseif(isset($_GET['page']))
	{	
	$sel_subj=NULL;
	$sel_page=get_page_th_id($_GET['page']);
	}
	else 
	{ 
	$sel_page=NULL; 
	$sel_subj=NULL;
	}
	}
      function navigation($sel_subj,$sel_page){
	echo "&nbsp;&nbsp;<a href=\"content.php\"><b>Home</b></a>";
	echo "<ul class=\"subject\">";
			$result=get_subject(false);
			while($row=mysql_fetch_array($result))
				{
				echo "<li ";
				if($row["id"]==$sel_subj['id']) { echo "class=\"sel\" "; }
				echo "><a href=\"edit.php?subj=".urlencode($row["id"]).
		"\">{$row["menu"]}</a></li>";
			if($row['id']==$sel_subj['id']||$sel_page['sub_id']==$row['id'])
				{
				$page_set=get_page_by_id($row["id"],false);
			echo "<ul class=\"page\">";
			 while($page_row=mysql_fetch_array($page_set))
				{
				echo "<li ";
				if($page_row["id"]==$sel_page['id']) { echo "class=\"sel\" "; }
				echo "><a href=\"pageinfo.php?page=".urlencode($page_row["id"]).
		"\">{$page_row["menu"]}</a></li>";
				}
			echo "</ul>";		
				}
				}
			echo "</ul>";
      }
       function publicnavigation($sel_subj,$sel_page){
	echo "&nbsp;&nbsp;<a href=\"index.php\"><b>Home</b></a>";
	echo "<ul class=\"subject\">";
			$result=get_subject();
			while($row=mysql_fetch_array($result))
				{
				echo "<li ";
			if($row["id"]==$sel_subj['id']) { echo "class=\"sel\" "; }
				echo "><a href=\"index.php?subj=".urlencode($row["id"]).
		"\">{$row["menu"]}</a></li>";
			if($row['id']==$sel_subj['id']||$sel_page['sub_id']==$row['id'])
				{
				$page_set=get_page_by_id($row["id"]);
			echo "<ul class=\"page\">";
			 while($page_row=mysql_fetch_array($page_set))
				{
				echo "<li ";
				if($page_row["id"]==$sel_page['id']) { echo "class=\"sel\" "; }
				echo "><a href=\"index.php?page=".urlencode($page_row["id"]).
		"\">{$page_row["menu"]}</a></li>";
				}
			echo "</ul>";
				}
				}
			echo "</ul>";
      }
?>