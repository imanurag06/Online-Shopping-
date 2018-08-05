<?php
include('top.php');
session_start();
$connect = mysqli_connect("localhost", "username", "password") 
or die("Please, check your server connection.");

mysqli_select_db($connect,"shopping");
$uid=$_SESSION['userid'];
$pwd=$_SESSION['password']; 
if ((isset($_SESSION['userid']) && $_SESSION['userid'] != "") || 
   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {

$query = "SELECT * FROM customers " .
         " where userid like '$uid' and "  . 
"password like (PASSWORD('$pwd'))";

$results = mysqli_query($connect,$query) or die(mysql_error());

$row = mysqli_fetch_array($results);
 extract($row);

?>
  <form action="purchase.php" method="post">
<table border="0" cellspacing="1" cellpadding="3">
  <tr><td>
    Userid:</td><td> <input size="20" type="text" name="userid" value="<?php echo $userid; ?>"></td></tr>
  <tr><td>
    First Name: </td><td> <input size="30" type="text" name="first_name" value="<?php echo $first_name; ?>"></td></tr>
  <tr><td>
    Last Name: </td><td> <input size="30" type="text" name="last_name" value="<?php echo $last_name; ?>"></td></tr>
  <tr><td>
    Address1:  </td><td> <input size="80" type="text" name="add1" value="<?php echo $add1; ?>"></td></tr>
  <tr><td>
    Address2:  </td><td> <input size="80" type="text" name="add2" value="<?php echo $add2; ?>"></td></tr>
  <tr><td>
    City:  </td><td> <input size="30" type="text" name="city" value="<?php echo $city; ?>"></td></tr>
  <tr><td>
    State:  </td><td> <input size="30" type="text" name="state" value="<?php echo $state; ?>"></td></tr>
  <tr><td>
    Country:  </td><td> <input size="30" type="text" name="country" value="<?php echo $country; ?>"></td></tr>
  <tr><td>
    Zip Code:  </td><td> <input size="20" type="text" name="zipcode" value="<?php echo $zipcode; ?>"></td></tr>
  <tr><td>
  Email Id:  </td><td> <input size="30" type="text" name="emailid" value="<?php echo $emailid; ?>"></td></tr>
  <tr><td>
Phone No:  </td><td> <input size="30" type="text" name="phone_no" value="<?php echo $phone_no; ?>"></td></tr>
  <tr><td colspan=2 align="center">
Shipping Information</td></tr>
  <tr><td>    Address to deliver at:  </td><td> <input type="text" size="80" name="ship_add"></td></tr>
  <tr><td>    City:  </td><td> <input size="30" type="text" name="ship_city"></td></tr>
  <tr><td>    State:  </td><td> <input size="30" type="text" name="ship_state"></td></tr>
  <tr><td>    Country:  </td><td> <input size="30" type="text" name="ship_country"></td></tr>
  <tr><td>    Zip Code:  </td><td> <input type="text" size="20" name="ship_zipcode"></td></tr>
  <tr><td>Payment Mode:    </td><td> <input type="radio" name="paymode" value="Credit Card" checked> 
      Credit Card<br>
      <input type="radio" name="paymode" value="Cheque">
      Cheque</td></tr>
  <tr><td>  <input type="submit" name="submit" value="Submit">  </td><td> 
    <input type="reset" value="Cancel"></td></tr>
</table>
  </form>

<?php
}
include('bottom.php');
?>


