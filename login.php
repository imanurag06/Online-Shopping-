<?php
include('top.php');
session_start();
$connect = mysqli_connect("localhost", "username", "password") 
  or die("Please, check the server connection.");
mysqli_select_db($connect,"shopping");

if (isset($_POST['submit'])) {
  $query = "SELECT userid, password FROM customers " .
           "WHERE userid like '" . $_POST['userid'] . "' " .
           "AND password like (PASSWORD('" . $_POST['password'] . "'))";
  $result = mysqli_query($connect,$query) or die(mysql_error());

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['userid'] = $_POST['userid'];
    $_SESSION['password'] = $_POST['password'];
echo "Welcome " . $_POST['userid'] . " to our Shopping Mall <br>"; 
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

   else {
?>
<html>
<head>
</head>
<body>
  Invalid Username and/or Password<br>
  Not registered? 
  <a href="create_account.php">Click here</a> to register.<br><br><br>
  Want to Try again<br>
  <a href="login.php">Click here</a> to try login again.<br>
</body>
</html>
<?php
  }
}
else
{ 
?>
<form action="login.php" method="post">
<table border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td>Userid:</td><td> <input type="text" name="userid"></td></tr>
  <tr><td>Password:</td><td> <input type="password" name="password"></td></tr>
<tr>
    <td colspan=2 align="center">
      <input type="submit" name="submit" value="Login">
    </td>
  </tr>
</table>
  </form>
<?php
}
include('bottom.php');
?>

