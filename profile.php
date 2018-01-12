<?php
session_start();
if($_SESSION['name']=="")
{
header("location:signin.php");
}
?>
<html>
<head></head>
<body background="Images/white.jpg">
<h1>User Page</h1>
<?php
echo "HELLOO <b>".$_SESSION['name']."</b><br>";
echo "<b>Welcome to your NBA account</b>";
?>
<br>
<?php
$name=$_SESSION['name'];
include "conn.php";
$sql="SELECT * FROM form where name='$name'";
$res=mysql_query($sql,$link);
$row=mysql_fetch_array($res);
echo "<h3> User's Information </h3>";
echo "<table border='1'>";
echo "<tr>";
echo "<td><b>Name</b></td>";
echo "<td>".$row['name']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Age</b></td>";
echo "<td>".$row['age']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Permanent Address</b></td>";
echo "<td>".$row['paddress']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Temporary Address</b></td>";
echo "<td>".$row['taddress']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Email</b></td>";
echo "<td>".$row['email']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Password</b></td>";
echo "<td>".$row['password']."</td>";
echo "</tr>";
echo "</table>";
mysql_close($link);
?>
<br>
<a href="logout.php">log out</a>
</body>
</html>