<?php
include('top.php');
session_start();
$connect = mysqli_connect("localhost", "username", "password") 
  or die ("Please, check the server connection.");
mysqli_select_db($connect,"shopping");
$userid = $_POST['userid'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$add1 = $_POST['add1'];                                          
$add2 = $_POST['add2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$emailid = $_POST['emailid'];
$phone_no = $_POST['phone_no'];
if($password==$repassword)
{
$sql = "INSERT INTO customers (userid, password, first_name, last_name, add1, add2, city, state, country, zipcode, emailid, phone_no) VALUES ('$userid',(PASSWORD('$password')), '$first_name','$last_name','$add1','$add2','$city', '$state', '$country',
'$zipcode','$emailid','$phone_no')";

$result = mysqli_query($connect,$sql) or die(mysql_error());
$_SESSION['userid'] = $_POST['userid'];
      $_SESSION['password'] = $_POST['password'];
?>
<p>
  Dear, <?php echo $_POST['first_name'] . " " . 
  $_POST['last_name']; ?> your account is successfully created <br>
<?php
 $_SESSION['userid'] = $_POST['userid'];
    $_SESSION['password'] = $_POST['password'];
$sess = session_id();

$query="select * from cart where cart_sess = '$sess'";
$result = mysqli_query($connect,$query) or die(mysql_error());
if(mysqli_num_rows($result)==1)
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
echo "Your Passwords do not match, Try again";
?>
 <form action="adduser.php" method="post">
<table border="0" cellspacing="1" cellpadding="3">
  <tr><td>
    Userid: </td><td> <input size="20" type="text" name="userid" value="<?php echo $userid ?>"></td></tr>
  <tr><td>
 Password: </td><td>  <input size="20" type="password" name="password"></td></tr>

  <tr><td>
 ReType Password:  </td><td> <input size="20" type="password" name="repassword"></td></tr>

  <tr><td>
    First Name:  </td><td> <input size="30" type="text" name="first_name"  value="<?php echo $first_name ?>"></td></tr>

  <tr><td>
    Last Name:  </td><td> <input size="30" type="text" name="last_name"  value="<?php echo $last_name ?>"></td></tr>

  <tr><td>
    Address1:  </td><td> <input size="80" type="text" name="add1"  value="<?php echo $add1 ?>"></td></tr>

  <tr><td>
    Address2:  </td><td> <input size="80" type="text" name="add2"  value="<?php echo $add2 ?>"></td></tr>

  <tr><td>
    City:  </td><td> <input size="30" type="text" name="city"  value="<?php echo $city ?>"></td></tr>

  <tr><td>
    State:  </td><td> <input size="30" type="text" name="state"  value="<?php echo $state ?>"></td></tr>

  <tr><td>
    Country:  </td><td> <input size="30" type="text" name="country"  value="<?php echo $country ?>"></td></tr>

  <tr><td>
    Zip Code:  </td><td> <input size="20" type="text" name="zipcode"  value="<?php echo $zipcode ?>"></td></tr>

  <tr><td>
  Email Id:  </td><td> <input size="30" type="text" name="emailid"  value="<?php echo $emailid ?>"></td></tr>

  <tr><td>
Phone No:  </td><td> <input size="30" type="text" name="phone_no"  value="<?php echo $phone_no ?>"></td></tr>
  <tr><td>
  <input type="submit" name="submit" value="Submit"> </td><td> 
    <input type="reset" value="Cancel"></td></tr>
</table>
  </form>

<?php
}
include('bottom.php');
?>

