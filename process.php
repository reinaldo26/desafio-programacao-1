<?php
require_once 'Sales.php';
$arquivo = $_FILES['arquivo'];

if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
	$pasta = 'report';
	
	if(!is_dir($pasta)){
		mkdir($pasta);
	}

	move_uploaded_file($arquivo['tmp_name'], $pasta.DIRECTORY_SEPARATOR.$arquivo['name']);
	$filename = $pasta.DIRECTORY_SEPARATOR.$arquivo['name'];
	
	if($filename){
		//Lendo arquivo enviado
		$file = fopen($filename, "r");
		$headers = explode("	", fgets($file));	
		
		$data = [];
		while($row = fgets($file)){
			$rowData = explode("	", $row);
			$linha = [];
			
			for($i=0; $i<count($headers); $i++){
				$linha[$headers[$i]] = $rowData[$i];
			}
				array_push($data, $linha);	
		}

		fclose($file);
	}

	
	for($i=0; $i<count($data); $i++){ 
		$purchaser_name = utf8_decode($data[$i]['purchaser name']);
		$item_description = $data[$i]['item description']; 
		$item_price = $data[$i]['item price'];
		$purchase_count = $data[$i]['purchase count'];
		$merchant_address = utf8_decode($data[$i]['merchant address']);
		$merchant_name = utf8_decode($data[$i]['merchant name
']);
		$s = new Sales();
		$s->insertData($purchaser_name, $item_description, $item_price, $purchase_count, $merchant_address, $merchant_name);

	} //endfor

		header("Location: report.php");

} else {
	header("Location: index.php");
}



	