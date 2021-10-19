<?php
include 'dbconnect.php'; 
$sql='select * from product_info where product_id='.$_POST['product_id'].'';
					$result=$conn->query($sql);
 			 		while($row=$result->fetch_array())  
 				      {
$sql1=" UPDATE product_info set stock=".$_POST['stock'].",price=".$_POST['price']." where product_id=".$row['product_id']."";
$conn->query($sql1);
}
 echo '<script>
alert("Updated successfully");
window.location.href="index.php";
</script>';
?>