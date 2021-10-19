<?php

include 'dbconnect.php'; 
$sql1="DELETE FROM product_info WHERE product_id=".$_GET['productid']."";
$conn->query($sql1);

echo '<script>
alert("Deleted successfully");
window.location.href="index.php";
</script>';

?>