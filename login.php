<?php
session_start();
include "conn.php";
$user=$_POST['email'];
$pass=$_POST['password'];
$sql="SELECT name, email, password, usertype FROM form 
WHERE email='$user' and password='$pass'";
$run=mysql_query($sql,$link);
$row=mysql_fetch_array($run);
$op=mysql_num_rows($run);
$_SESSION['name']=$row['name'];
if($op)
{
if($row['usertype']=="u")
{
header("location:profile.php");
}
else{
header("location:aprofile.php");
}
}
else
{
header("location:signin.php");
}
?>