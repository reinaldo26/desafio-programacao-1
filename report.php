<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Sales Report</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Sales Report</h1></center>
	<?php 
	require_once 'config.php'; 
	$data = [];
	$sub = 0;
	$stmt = $conn->query("SELECT * FROM sales_report");
	if($stmt->rowCount() > 0){
		$stmt = $stmt->fetchAll();
	}?>
	<table border="1" width="80%">
		<tr>
			<th>Purchaser Name</th><th>Item Description</th><th>Item Price</th><th>Purchase Count</th><th>Merchant Address</th><th>Merchant Name</th>
		</tr>

		<?php foreach($stmt as $key): ?>

		<tr>
			<td><?php echo utf8_encode($key['purchaser_name']); ?></td> 
			<td><?php echo utf8_encode($key['item_description']); ?></td> 
			<td><?php echo $key['item_price']; ?></td>
			<td><?php echo $key['purchase_count']; ?></td> 
			<td><?php echo utf8_encode($key['merchant_address']); ?></td> 
			<td><?php echo utf8_encode($key['merchant_name']); ?></td> 
		</tr>
		<?php $sub += $key['item_price'] * $key['purchase_count']; ?>
		<?php endforeach; ?>

		<tr>
			<td colspan="5">Total</td><td><?php echo $sub; ?></td> 
		</tr>
	</table>
	<button><a href="index.php"><<</a></button>
</body>
</html>