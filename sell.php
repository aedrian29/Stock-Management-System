<?php
include 'dbconnect.php'; 
$counter=$_POST['counter']-1;
$total=0;
foreach ($_POST['productid'] as $index => $value) {
	$productid= explode("|",$value);
	$quantitycart= $_POST['quantitycart'][$index];
	$sql='select * from product_info where product_id='.$productid[0];
	$result=$conn->query($sql);
	$row1=$result->fetch_array(); 
	$product=$row1['price']*$quantitycart;echo '<br>';
	$sql1="UPDATE `product_info` SET stock = stock - ".$quantitycart." where product_id=".$productid[0]."";
    $conn->query($sql1);
	$total=$total+$product;
}
$qualitycart = implode(',',$_POST['quantitycart']);
$array = array_combine($_POST['productid'], $_POST['quantitycart'] );
$groupid=uniqid();
foreach ($array as $id=> $q) {
$productid = explode('|',$id);
$sql2="select price from product_info where product_id=".$productid[0];
$result2=$conn->query($sql2);
$row2=$result2->fetch_array();  
$sql="INSERT INTO `transaction` (`product_id`,`sale_price`,`groupid`,`total`) VALUES (".$productid[0].",".$row2['price'].",'".$groupid."','".$total."')";
echo "<br>";
$conn->query($sql);
}
 echo '<script>
alert("TOTAL : '.$total.'");
window.location.href="index.php";
</script>';
?>