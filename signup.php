<html>
<head>
<link type="text/css" rel="stylesheet" href="css/news.css">
<style>
body{
font-family:Comic Sans MS;
color:black;
background:#6B6A6D;
border:1px solid #000;
}
fieldset{
margin:auto;
border: 1px solid rgb(255,232,57);
width: 400px;
background:#D3E8F6;
}
h3{
text-align:center;
}
.error{
color:red;
}
input{
	border-radius:5px;
	height:25px;
}
</style></head>
<body>
<?php
$row = null;
if(isset($_GET['id']) && (int)$_GET['id']>0 ){ // GET THE DATA OF MATCHING ID FROM DATABASE
  $qry = "SELECT * FROM form where id=".(int)$_GET['id'];
  $link = mysql_connect('localhost','root','');
  if(!$link){
    echo mysql_error();
    die("Could not connect to database");
  }
  mysql_select_db('project', $link);
  $res = mysql_query($qry);
  if(!$res){
    echo mysql_error();
    die("Could not execute query");
  }
  $row = mysql_fetch_array($res);
  mysql_close($link);
}
if(!is_array($row)){ // If no data is returned 
  $row['id'] =0;
  $row['name'] = '';
  $row['age'] = '';
  $row['paddress']='';
  $row['taddress']='';
  $row['email']='';
  $row['password']='';
}
?>
<?php
$errname=$errage=$errpaddress=$errtaddress=$erremail=$errpassword=$errcpassword="";
$name=$age=$paddress=$taddress=$email=$password=$res="";
if(isset($_POST['submit']))
{
$id=$_POST['id'];
#validation for name
if(empty($_POST['name']))
{
$errname="Enter name";
}
else if(!preg_match("/^[a-zA-Z ]+$/",$_POST['name']))
{
$errname="Name in letter only";
}
else
{
$name=$_POST['name'];
}

#validation for age
if(empty($_POST['age']))
{
$errage="Enter age";
}
else if(!preg_match("/^[0-9]+$/",$_POST['age']))
{
$errage="Age in number only";
}
else
{
$age=$_POST['age'];
}

#validation for permanent address
if(empty($_POST['paddress']))
{
$errpaddress="Enter permanent address";
}
else if(!preg_match("/^[a-zA-Z]+$/",$_POST['paddress']))
{
$errpaddress="Address in letters only";
}
else
{
$paddress=$_POST['paddress'];
}

#validation for Temporary address
if(empty($_POST['taddress']))
{
$errtaddress="Enter temporary address";
}
else if(!preg_match("/^[a-zA-Z]+$/",$_POST['taddress']))
{
$errtaddress="Address in letters only";
}
else
{
$taddress=$_POST['taddress'];
}

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

#validation for confirm password
if(empty($_POST['cpassword']))
{
$errcpassword="Re-Enter password";
}
else if(!($_POST['password']==$_POST['cpassword']))
{
$errcpassword="Password not match";
}
else{}
if($errname==""&&$errage==""&&$errpaddress==""&&$errtaddress==""&&$erremail==""&&$errpassword==""&&$errcpassword=="")
{
$link=mysql_connect('localhost','root','');
if(!$link)
{
die('Not Connected'.mysql_error());
}
mysql_select_db('project',$link);
if($id)
{
$sql="Update form SET name='$name', age='$age', paddress='$paddress', taddress='$taddress', email='$email', password='$password' WHERE id=$id";
header("location:aprofile.php");
}
else
{
$sql="INSERT INTO `form` (`id`, `name`, `age`, `paddress`, `taddress`, `email`, `password`, `usertype`) VALUES (NULL, '$name', '$age', '$paddress', '$taddress', '$email', '$password', 'u');";
}
if(mysql_query($sql,$link))
{
$res="Registered Successfully";
}
else{
$res="Something went wrong";
}
mysql_close($link);
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
<h3>Registration Form</h3>
<fieldset>
<form name="f" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<table align="center" height="450px">
<tr>
<td><input type="text" name="name" placeholder="full name" value="<?php echo $row['name'];?>"></td>
<td><span class="error"><?php echo $errname?></span></td>
</tr>
<tr>
<td><input type="text" name="age" placeholder="age" value="<?php echo $row['age'];?>"></td>
<td><span class="error"><?php echo $errage?></span></td>
</tr>
<tr>
<td><input type="text" name="paddress" placeholder="permanent address" value="<?php echo $row['paddress'];?>"></td>
<td><span class="error"><?php echo $errpaddress?></span></td>
</tr>
<tr>
<td><input type="text" name="taddress" placeholder="temporary address" value="<?php echo $row['taddress'];?>"></td>
<td><span class="error"><?php echo $errtaddress?></span></td>
</tr>
<tr>
<td><input type="text" name="email" placeholder="email" value="<?php echo $row['email'];?>"></td>
<td><span class="error"><?php echo $erremail?></span></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="password" value="<?php echo $row['password'];?>"></td>
<td><span class="error"><?php echo $errpassword?></span></td>
</tr>
<tr>
<td><input type="password" name="cpassword" placeholder="confirm password" value="<?php echo $row['password'];?>"></td>
<td><span class="error"><?php echo $errcpassword?></span></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Register"><?php echo $res?></td>
</tr>
</table>
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
</form>
</fieldset>
</div>
<div class="footer">&copy;All rights reserved,2016-<?php echo date("Y")?></div>
</div>
</body>
</html>
