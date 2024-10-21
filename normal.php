<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<?php
		echo '<pre>';
		print_r($_POST);
		echo '<br>======';
		print_r($_GET);
		echo '<br>======';
		print_r($_REQUEST);
	?>
</head>
<body>
	<form method="get">
		name: <input type="text" name="name">
		phone <input type="number" name="phone">
		<button type="submit">submit</button>
	</form>
</body>
</html>