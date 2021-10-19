<?php

include 'dbconnect.php'; 
echo $sql1="INSERT INTO product_info(product_name,stock,price) VALUES ('".$_POST['productname']."','".$_POST['stock']."','".$_POST['price']."')";
$conn->query($sql1);

echo '<script>
alert("Added successfully");
window.location.href="index.php";
</script>';

?>