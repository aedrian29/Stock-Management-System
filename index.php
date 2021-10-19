<!DOCTYPE html>
<html>
	<head>
		<title>Stock Management System</title>
		<script src="myscript.js"></script> 
		<link rel="stylesheet" href="bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			table, th, td {
 			 border: 1px solid black;
  			 border-collapse: collapse;
			 }
		</style>
	</head>
	<body>
		<div class="container container-fluid">
 		<div>
 			<h1>Stock Management System</h1>
 		</div>
 		<div>
			<table class="table table-bordered table-striped table-dark">
				<tr> <th colspan='5'>Product Inventory</th></tr>
				<tr>
					<th>Product Name</th> 
					<th>Stock </th>
					<th>Price </th>
					<th colspan="2">Action </th>

				</tr>
				<?php
					include "dbconnect.php";
					$sql="select * from product_info";
					$result=$conn->query($sql);
 			 		while($row=$result->fetch_array())  
 				      {
             			echo "<form action='stockpriceupdate.php' method='post' enctype='multipart/form-data'>
             			<tr>
             			<td>".$row['product_name']."</td>
             			<td><input name='stock' type='text' value='".$row['stock']."'></td>
             			<td><input name='price' type='text' value='".$row['price']."'>
             			<input name='product_id' type='text'hidden value='".$row['product_id']."'></td>
             			<td ><input onclick=\"return confirm(' Update your Price and Stock ?');\" class='btn btn-primary' id='pasa' type='submit' value='Update' name='submit'><td><a href='delete.php?productid=".$row['product_id']."' onclick=\"return confirm(' Delete ?');\" class='btn btn-danger'  value='Delete'>Delete</a></td>
             			</td></tr></form>";
             		  }
				?>
			</table>
			<table class="table table-bordered table-striped table-dark">
				<tr>
					<form action='addproduct.php' method='post' enctype='multipart/form-data'>
					<th>Add new product</th>
					<td><input placeholder="Product Name" required name='productname' type='text'></td>
					<td><input placeholder="Stock" required name='stock' type='number'></td>
             		<td><input placeholder="Price" required name='price' type='number'></td>
             		<td colspan="1"><input onclick="return confirm(' Add this new product ?');" class='btn btn-primary' id='pasa' type='submit' value='Add' name='submit'></td>
             		</form>
				</tr>
			</table>
			<table class="table table-bordered table-striped table-dark">
					<?php
					include "dbconnect.php";
					$sql1="select distinct groupid,total from transaction";
					$result1=$conn->query($sql1);
					$counterForArray=0;
					$ttal[0]=0;
 			 		while ($row1=$result1->fetch_array()){
 			 			$ttal[$counterForArray]=$row1['total'];
 			 			$counterForArray++;
 			 		};
 			 			$total= array_sum($ttal);
 			 		 ?>
				<tr> <th colspan='2'>Product Sale</th> 
					 <th colspan=''>Total Sales <?php echo "<input disabled class='btn btn-info' type='text' class='input-primary' value=".$total.">;"?> </th> 
				</tr>
				<tr>
					<th>ID | Product Name</th>
					<th>Quantity </th>
					<th colspan=''>Action </th>
				</tr>
					<tr><td><select onchange="validation(document.getElementById('quantity').value)" name='productname' id='ProductName'>
				<?php
					include "dbconnect.php";
					$sql1="select * from product_info";
					$result1=$conn->query($sql1);
 			 		while($row1=$result1->fetch_array())  
 				      {
             			echo "
             			<option >".$row1['product_id']."|".$row1['product_name']."</option>";
             		  }
				?>	</select> </td>
					<td><input id='quantity'   onkeyup="validation(this.value)" name='quantity' type='number' value=''></td>
					<td><div id='test'>
					<input disabled class='btn btn-primary'  type='button' id='add' value='Add to cart' onclick='myTablefunction()'></div></td>
				 </tr>
			</table>
		</div>
		<form action='sell.php' method='post' id="form1" enctype='multipart/form-data'>
		<table class="table table-bordered table-striped table-dark" id="myTable">
 		<input hidden name='counter' id='a'> </p>
 		<td colspan=''><input disabled id='sell' onclick="return confirm(' Are you sure ?');" class='btn btn-primary' type='submit' value='Sell' name='submit'></form></td>
        </table>
</div>
	</body>
</html>
