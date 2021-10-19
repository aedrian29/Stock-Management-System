<?php
$productid = explode('|',$_GET['productname']);
$quantity=$_GET['q'];
include "dbconnect.php";
$sql="select * from product_info where product_id=".$productid[0];
$result=$conn->query($sql);
$row=$result->fetch_array(); 
if($row['stock']<$quantity or $quantity<=0){

	echo"<input class='btn btn-danger'  disabled type='button' id='add' value='Out of Stock' onclick='myTablefunction()'>";
}
else{
	echo"<input class='btn btn-primary'  type='button' id='add' value='Add to cart' onclick='myTablefunction()'>";
	echo "&nbsp;&nbsp;&nbsp;<a>Price</a> : <input type ='text' value='".$price=$quantity*$row['price']."'>";
}
?>	