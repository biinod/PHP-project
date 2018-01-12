<?php
session_start();
if($_SESSION['name']=="")
{
header("location:signin.php");
}
?>
<html>
<head>
<style>
input, textarea{
border-radius:5px;
}
</style>
</head>
<body background="Images/white.jpg">
<?php
$res="";
if(isset($_POST['submit']))
{
$title=$_POST['title'];
$content=$_POST['content'];
include "conn.php";
$sql="INSERT INTO `news` (`id`, `title`, `content`) VALUES (NULL, '$title', '$content');";
$b=mysql_query($sql,$link);
if($b)
{
$res="News posted successfully";
}
else
{
$res="Something went wrong";
}
}
?>
<h1>Admin Page</h1>
<?php 
echo "HELLO <b>".$_SESSION['name']."</b><br>";
?>
<form name="f" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<table>
<tr>
<td colspan="2"><h3>Publish News</h3></td>
</tr>
<tr>
<td>Title:</td>
<td><input type="text" name="title" size="50"></td>
</tr>
<tr>
<td>Content:</td>
<td><textarea rows="10" cols="30" name="content">Write news here</textarea></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Publish News"> <?php echo $res ?></td>
</tr>
</table>
</form>
<?php 
if(isset($_GET['task'])){ // CODE FOR DELETE
  $task = $_GET['task'];
  if($task == 'del'){
    // CODE TO DELETE
    $qry = "DELETE FROM form WHERE id=".(int)$_GET['id'];
    $link = mysql_connect('localhost','root',''); // CONNECT TO DATABASE SERVER
    if(!$link){
      echo mysql_error();
      die("Could not connect to database");
    }
    mysql_select_db('project', $link); // SELECT THE DATABASE
    $res = mysql_query($qry); // EXECUTE THE QUERY
    if(!$res){
      echo mysql_error();
      die("Could not execute query");
    }
    mysql_close($link); // CLOSE THE CONNECTION
    $error = "Your data was successfully deleted";
  }
}
?>
  <?php if(isset($error) && $error != ""){ echo "<p>$error</p>"; }?>
    <?php // READ ALL THE DATA IN DATABASE AND DISPLAY IN TABLE FORMAT
    $qry = "SELECT * FROM form  ORDER BY name";
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
    $data = array(); // READ ALL THE DATA IN $DATA ARRAY
    $row = mysql_fetch_array($res);
    while(is_array($row)){
      $data[] = $row;
      $row = mysql_fetch_array($res);
    }
    mysql_close($link);
    ?>
    <table border="1" width="100%">
      <tr>
        <th>Name</th>
        <th >Age</th>
	<th >Permanent address</th>
	<th >Temporary address</th>
	<th >Email</th>
	<th >Password</th>
        <th>Operation</th>
      </tr>
      <?php
	// DISPLAY THE DATA IN TABLE
      for($i=0; $i<count($data); ++$i){
        echo "<tr>";
        echo "<td>".$data[$i]['name']."</td>";
        echo "<td>".$data[$i]['age']."</td>";
        echo "<td>".$data[$i]['paddress']."</td>";
	echo "<td>".$data[$i]['taddress']."</td>";
	echo "<td>".$data[$i]['email']."</td>";
	echo "<td>".$data[$i]['password']."</td>";
        echo "<td><a href='aprofile.php?task=del&id=".$data[$i]['id']."'>Delete</a> | <a href='signup.php?id=".$data[$i]['id']."'>Edit</a></td>";
        echo "</tr>";
      }
      ?>
    </table>
<br>
<a href="logout.php">Log out</a>
</body>
</html>
