<?php
include('top.php');
session_start();
$connect = mysqli_connect("localhost", "username", "password") 
  or die ("Please, check the server connection.");
mysqli_select_db($connect,"shopping");

$ship_add = $_POST['ship_add'];
$ship_city = $_POST['ship_city'];
$ship_state = $_POST['ship_state'];
$ship_country = $_POST['ship_country'];
$ship_zipcode = $_POST['ship_zipcode'];
$paymode = $_POST['paymode'];
$userid= $_SESSION['userid'] ;
$today = date("Y-m-d");
$sessid = session_id();

$sql = "INSERT INTO orders (
order_date, userid, shipping_address, shipping_city, shipping_state, shipping_country, shipping_zipcode, paymode)
           VALUES ('$today','$userid','$ship_add','$ship_city','$ship_state',
           '$ship_country','$ship_zipcode','$paymode')";

$result = mysqli_query($connect,$sql)  or die (mysql_error());
$orderid = mysqli_insert_id($connect);

$query = "SELECT * FROM cart WHERE cart_sess='$sessid'";
$results = mysqli_query($connect,$query)  or (mysql_error());

while ($row = mysqli_fetch_array($results)) {
  extract($row);
  $sql2 = "INSERT INTO orders_details (
             order_no, item_code, item_name, quantity, price)
             VALUES ('$orderid','$cart_itmcode','$cart_item_name',
             '$cart_qty','$cart_price')";
  $insert = mysqli_query($connect,$sql2) or die (mysql_error());
}

$query = "DELETE FROM cart WHERE cart_sess='$sessid'";
$delete = mysqli_query($connect,$query);
echo "Your order is accepted and we will deliver it soon<br>";
echo "Please, remember your Order number is $orderid<br>";
session_destroy();

include('bottom.php');
?>
