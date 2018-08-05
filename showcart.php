<?php
if (!session_id()) {
  session_start();
}
$connect = mysqli_connect("localhost", "username", "password") or die ("Please, check your server connection.");
mysqli_select_db($connect,"shopping");
?>
<html>
<head>
<title>Shopping Cart</title>
</head>
<body>
<div align="center">
<?php
$sessid = session_id();
$query = "SELECT * FROM cart WHERE cart_sess = '$sessid'";
$results = mysqli_query($connect,$query) or die (mysql_query());
if(mysqli_num_rows($results)==0)
{
echo "Your Cart is empty ";
}
else
{ 
echo "You currently have ";
$rows = mysqli_num_rows($results);
echo $rows . " ";
?>
product(s) in your cart.<br>

<table border="1" align="center" cellpadding="5">
  <tr>
<td> Item Code</td>
    <td>Quantity</td>
    <td>Item Name</td>
    <td>Price</td>
    <td>Total Price</td>
 <?php
while ($row = mysqli_fetch_array($results)) {
  extract($row);
  echo "<tr>";
  echo "<td>";
  echo $cart_itmcode;
  echo "</td>";
  echo "<td> <form method=\"POST\" action=\"cart.php?action=change&icode=$cart_itmcode\"> <input type=\"text\" name=\"modified_qty\" size=\"2\" value=\"$cart_qty\">";
  echo "</td>";
  echo "<td>";
  echo $cart_item_name;
  echo "</td>";
  echo "<td>";
  echo $cart_price;
  echo "</td>";
  echo "<td>";
  $totprice = number_format($cart_price * $cart_qty, 2);
  echo $totprice;
  echo "</td>";
  echo "<td>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Change Qty\"> </form></td>";
  echo "<td>";
  echo "<form method=\"POST\" action=\"cart.php?action=delete&icode=$cart_itmcode\">";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Delete Item\"> </form></td>";
  echo "</tr>";
}
?>
 </table>
<form method="POST" action="cart.php?action=empty">
<input type="submit" name="Submit" value="Empty Cart"> 
</form>
<form method="POST" action="checklogin.php">
<input type="submit" name="Submit" value="Checkout">
</form>
</body>
</html>
<?php
}
?>
