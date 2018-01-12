<html>
<head>
<title>sign in</title>
<link type="text/css" rel="stylesheet" href="css/news.css">
<style>
input{
border-radius:5px;
height:30px;
}
.error{
color:red;
}
</style>
</head>
<body bgcolor="#949394">
<?php
$erremail=$errpassword="";
$email=$password="";
if(isset($_POST['submit']))
{
#validation for email
if(empty($_POST['email']))
{
$erremail=" Enter email";
}
else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
$erremail="Email not in format";
}
else
{
$email=$_POST['email'];
}

#validation for password
if(empty($_POST['password']))
{
$errpassword="Enter password";
}
else
{
$password=$_POST['password'];
}
}
?>
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
<fieldset>
<form name="f" method="POST" action="login.php">
<h1 align="center">Sign In To Your NBA Account</h1>
<table align="center">
<tr>
<td>Email</td>
</tr>
<tr>
<td><input type="text" name="email" size="40px"><span class="error"><?php echo $erremail?></span></td>
</tr>
<tr>
<td>Password</td>
</tr>
<tr>
<td><input type="password" name="password" size="40px"><span class="error"><?php echo $errpassword?></span></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Sign In"></td>
</tr>
<tr>
<td>
Don't have an account? <a href="signup.php">Create Account</a>
</td>
</tr>
</table>
</form>
</fieldset>
</div>
<div class="footer">&copy;All rights reserved,2016-<?php echo date("Y")?></div>
</div>
</body>
</html>