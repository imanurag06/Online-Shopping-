<?php
include('top.php');
session_start();
$connect = mysqli_connect("localhost", "username", "password") or die("Please, check the server connection.");
mysqli_select_db($connect,"shopping");
  $qty = trim($_POST['qty']);
if ($qty=='')
{
$qty=1;
}
if($qty <=0)
{
echo "Quantity value is invalid ";
echo "Go Back and enter a valid value";
}
else
{
if (isset($_REQUEST['icode'])) {
  $itmcode = $_REQUEST['icode'];
}
if (isset($_REQUEST['iname'])) {
  $item_name = $_REQUEST['iname'];
}
if (isset($_REQUEST['iprice'])) {
  $price = $_REQUEST['iprice'];
}

if (isset($_POST['modified_qty'])) {
  $modified_qty = $_POST['modified_qty'];
}
$sess = session_id();
$action = $_REQUEST['action'];

switch ($action) {
  case "add":
$query="select * from cart where cart_sess = '$sess' and " . "cart_itmcode=$itmcode";
$result = mysqli_query($connect,$query) or die(mysql_error());

if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_array($result);
$qt=$row['cart_qty'];
$qt=$qt+$qty;
$query="UPDATE cart set cart_qty=$qt where cart_sess = '$sess' " . "and cart_itmcode=$itmcode";
$result = mysqli_query($connect,$query)  or die(mysqli_error());
}
else
{
    $query = "INSERT INTO cart (
              cart_sess, 
              cart_qty, 
              cart_itmcode, cart_item_name, cart_price)
              VALUES ('$sess',$qty,$itmcode, '$item_name', $price)";
    $message = "<div align=\"center\"><strong>Item 
                added.</strong></div>";
}
    break;

  case "change":
if($modified_qty==0)
{
    $query = "DELETE FROM cart WHERE cart_sess = '$sess' " . "and cart_itmcode=$itmcode";
    $message = "<div align='center'><strong>Item deleted.</strong></div>";
}
else
{
if($modified_qty <0)
{
echo "Invalid quantity entered";
}
else
{

    $query = "UPDATE cart SET cart_qty = '$modified_qty'  WHERE cart_sess = '$sess' " . "and cart_itmcode=$itmcode";
    $message = "<div align='center'><strong>Quantity 
                changed.</strong></div>";
}
}
    break;

  case "delete":
    $query = "DELETE FROM cart WHERE cart_sess = '$sess' " . "and cart_itmcode=$itmcode";
    $message = "<div align='center'><strong>Item deleted.</strong></div>";
    break;

  case "empty":
    $query = "DELETE FROM cart WHERE cart_sess = '$sess'";
    $message = "<div align='center'><strong>Cart emptied.</strong></div>";
    break;
}
$results = mysqli_query($connect,$query) or die(mysql_error());
echo $message;
include("showcart.php");
}

include('bottom.php');
?>
