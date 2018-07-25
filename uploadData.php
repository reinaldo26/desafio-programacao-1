<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Sales Report</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center><h1>Sales Report</h1></center>
<div class="main">
	<form method="POST" action="process.php" enctype="multipart/form-data">
		<fieldset>
			<input type="file" name="arquivo" required="required"/><br/>
			<input type="submit" value="Send File"/>
			<button><a href="index.php">Back</a></button>
		</fieldset>
	</form>
</div>
</body>
</html>