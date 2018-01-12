<?php
$link= mysql_connect('localhost','root','');
if(!$link)
{
die('Not Connected'.mysql_error());
}
mysql_select_db("project",$link);
?>