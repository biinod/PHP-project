<html>
<head>
<title>NBA News</title>
<link type="text/css" rel="stylesheet" href="css/news.css">
</head>
<body>
<div class="wrapper">
<div class="header">
		<div class="logo"><img src="Images/logo1.png"></div>
		<div class="heading"><span class="title">National Basketball Association</span>&nbsp;
		<a href="signin.php"><button type="button">Sign In</button></a>&nbsp;
		<a href="signup.php"><button type="button">Sign Up</button></a></div>
</div>
		<div class="nav">
		<ul>
		<li><a href="mainpage.php"><b>Home</b></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li><a href="gallery.php"><b>Gallery</b></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li><a href="news.php"><b>News</b></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li><a href="about.php"><b>About us</b></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li><a href="contact.php"><b>Contact us</b></a></li>
		</ul>
		</div>
<div class="left">
<p>
<h1>Latest News</h1>
<?php
$link=mysql_connect('localhost','root','');
if(!$link)
{
die('Not Connected'.mysql_error());
}
mysql_select_db('project',$link);
$sql="SELECT * FROM news";
$res=mysql_query($sql,$link);
if(!$res)
{
echo "Error in query";
}
else
{
while($row=mysql_fetch_array($res))
{
echo $row['id'].'.';
echo "<b>". $row['title']."</b><br>";
echo $row['content']."<br>";
}
}
mysql_close($link);
?>
</p>
</div>
<div class="footer">&copy;All rights reserved,2016-<?php echo date("Y")?></div>
</div>
</body>
</html>