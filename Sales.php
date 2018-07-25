<?php

class Sales
{	
	protected $conn;

	public function __construct()
	{
		$conn = new PDO("mysql:dbname=desafio_de_programacao;host=localhost", 'root', '');
		$this->conn = $conn;
	}

	public function insertData($purchaser_name, $item_description, $item_price, $purchase_count, $merchant_address, $merchant_name)
	{ 
		$stmt = $this->conn->prepare("INSERT INTO sales_report(purchaser_name, item_description, item_price, purchase_count, merchant_address, merchant_name) VALUES(:purchaser_name, :item_description, :item_price, :purchase_count, :merchant_address, :merchant_name)");
		$stmt->bindParam(":purchaser_name", $purchaser_name);
		$stmt->bindParam(":item_description", $item_description);
		$stmt->bindParam(":item_price", $item_price);
		$stmt->bindParam(":purchase_count", $purchase_count);
		$stmt->bindParam(":merchant_address", $merchant_address);
		$stmt->bindParam(":merchant_name", $merchant_name);
		$stmt->execute();
	}
}