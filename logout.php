<?php
include('top.php');
session_start();
$connect = mysqli_connect("localhost", "username", "password") 
  or die("Please, check the server connection.");
mysqli_select_db($connect,"shopping");
$uid=$_SESSION['userid'];
$pwd=$_SESSION['password']; 
if ((isset($_SESSION['userid']) && $_SESSION['userid'] != "") || 
   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
session_start();
$connect = mysqli_connect("localhost", "root", "mce") 
  or die ("Please, check the server connection.");
mysqli_select_db($connect,"shopping");
$sessid = session_id();
$query = "DELETE FROM cart WHERE cart_sess='$sessid'";
$delete = mysqli_query($connect,$query);
session_destroy();
echo "You are successfully Logged out";
}
else{
echo "You are not currently Logged in<br>";
echo "<a href=login.php>Click here </a>to login";
}
include('bottom.php');
?>

