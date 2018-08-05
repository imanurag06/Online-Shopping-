<?php
include('top.php');
$connect = mysqli_connect("localhost", "username", "password") 
or die("Please, check your server connection.");

mysqli_select_db($connect,"shopping");
$category=$_POST['category'];

$query = "SELECT item_code, item_name, description, price " .
         "FROM products " .
         "where category like '$category' order by item_code";
$results = mysqli_query($connect,$query) or die(mysql_error());

echo "<table border=\"1\">";
echo "<th>Item Code</th><th>Name of Item</th><th>Description</th><th>Price</th><th>Details</th>";
while ($row = mysqli_fetch_array($results)) {
 extract($row);
   echo "<tr>";
    echo "<td>";
    echo $item_code;
    echo "</td>";
    echo "<td>";
    echo $item_name;
    echo "</td>";
    echo "<td>";
    echo $description;
    echo "</td>";
    echo "<td>";
    echo $price;
    echo "</td>";
  echo "<td>";
echo "<a href=itemdetails.php?itmcode=$item_code>";
echo "Detail";
echo "</a>";
    echo "</td>";
  echo "</tr>";
}
echo "</table>";
include('bottom.php');
?>
