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
$sess = session_id();
$query="select * from cart where cart_sess = '$sess'";
$result = mysqli_query($connect,$query) or die(mysql_error());
if(mysqli_num_rows($result)>=1)
{
echo "If you have finished Shopping ";
    echo "<a href=shipping_info.php>Click Here</a> to supply Shipping Information";
echo "Or You can do more purchasing by selecting items from the menu ";
}
else
{
echo "You can do purchasing by selecting items from the menu on left side";
}
}
else
{
?>
<html>
<head>
</head>
<body>
<h3>Not Logged in yet</h1>
<p>
  You are currently not logged into our system.<br>
  You can do purchasing only if you are logged in.<br>
  If you have already registered, 
  <a href="login.php">click here</a> to login,
  or if would like to create an account, 
  <a href="create_account.php">click here</a> to register.
</p>
</body>
</html>
<?php
}
include('bottom.php');
?>
