<?php
include('top.php');
session_start();
$conn = mysqli_connect("localhost", "username", "password")
  or die("Could not connect: " . mysql_error());
mysqli_select_db($conn,"shopping") or die (mysql_error());
?>
<html>
<head>
</head>
<body>
  <form action="adduser.php" method="post">
     <table border="0" cellspacing="1" cellpadding="3">
  	<tr><td>
    	    Userid: </td><td> <input size="20" type="text" name="userid"></td></tr>
 	<tr><td>
 	    Password: </td><td>  <input size="20" type="password" name="password"></td></tr>

  	<tr><td>
	    ReType Password:  </td><td> <input size="20" type="password" name="repassword"></td></tr>

  	<tr><td>
   	    First Name:  </td><td> <input size="30" type="text" name="first_name"></td></tr>

  	<tr><td>
   	    Last Name:  </td><td> <input size="30" type="text" name="last_name"></td></tr>

  	<tr><td>
	    Address1:  </td><td> <input size="80" type="text" name="add1"></td></tr>

        <tr><td>
	    Address2:  </td><td> <input size="80" type="text" name="add2"></td></tr>

  	<tr><td>
	    City:  </td><td> <input size="30" type="text" name="city"></td></tr>

  	<tr><td>
	    State:  </td><td> <input size="30" type="text" name="state"></td></tr>

  	<tr><td>
	    Country:  </td><td> <input size="30" type="text" name="country"></td></tr>

  	<tr><td>
	    Zip Code:  </td><td> <input size="20" type="text" name="zipcode"></td></tr>

  	<tr><td>
	    Email Id:  </td><td> <input size="30" type="text" name="emailid"></td></tr>

  	<tr><td>
	    Phone No:  </td><td> <input size="30" type="text" name="phone_no"></td></tr>
  	<tr><td><input type="submit" name="submit" value="Submit"> </td>
	<td><input type="reset" value="Cancel"></td></tr>
     </table>
  </form>
</body>
</html>
<?php
include('bottom.php');
?>
