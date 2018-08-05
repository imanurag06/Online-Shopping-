<?php
include('top.php');
$connect = mysqli_connect("localhost", "username", "password") 
or die("Please, check your server connection.");

mysqli_select_db($connect,"shopping");
$code=$_REQUEST['itmcode'];

$query = "SELECT item_code, item_name, description, imagename, price " .
         "FROM products " .
         "where item_code=$code";
$results = mysqli_query($connect,$query) or die(mysql_error());
echo "<table border=\"1\">";
echo "<th>Item Code</th><th>Name of Item</th><th>Description</th><th>Price</th><th>Enter Quantity</th>";

$row = mysqli_fetch_array($results);
 extract($row);
   echo "<tr>";
echo '<img width="140" height="170" src=' . $imagename . '></img>';
echo "</tr>";
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
?>
<form method="POST" action="cart.php?action=add&icode=<?php echo $item_code ?>&iname=<?php echo $item_name ?>&iprice=<?php echo $price ?>">
<td>
  <input type="text" name="qty" size="2">
</td>
</tr>
</table>

        <input type="submit" name="Submit" value="Add to cart">
      </form>
   
<?php
include('bottom.php');
?>
