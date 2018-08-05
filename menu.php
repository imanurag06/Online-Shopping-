<html>
<head>
</head>
<body>
<form action="showitems.php" method="post">
<table border="0" bgcolor="cyan" cellspacing="10" cellpadding="5" 
       align="top">
  <tr>
    <td>Category</td>
    <td>
      <select name="category">
        <option value="" selected>Select Products Category</option>
        <option value="Camera">Camera</option>
        <option value="Mobile">Mobile</option>
        <option value="Book">Book</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan=2 align="center">
      <input type="submit" name="Submit" value="Search">
    </td>
  </tr>
<tr>
    <td colspan=2 align="left">
      <a href="login.php">Login</a>
    </td>
  </tr>
<tr>
    <td colspan=2 align="left">
      <a href="logout.php">Logout</a>
    </td>
  </tr>
<tr>
    <td colspan=2 align="left">
      <a href="create_account.php">Create Account</a>    </td>
  </tr>
<tr>
    <td colspan=2 align="left">
      <a href="contact_us.php">Contact Us</a><br><br><br></td>
  </tr>

</table>
</form>
</body>
</html>
