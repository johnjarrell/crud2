<?php
include("init/init.php");

if (isset($_GET['source'])) {
	$sourceType = $_GET['source'];
} else {
	$sourceType = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sample CRUD 2</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="header">
		<h1>Sample C.R.U.D. System</h1>
		<?php include('includes/nav.php'); ?>
	</div>
	<div id="content">
		<?php

			switch($sourceType) {
				case "create":
					include"source/create.php";
					break;

				case "read":
					include"source/read.php";
					break;

				case "update":
					include"source/update.php";
					break;

				case "delete":
					include"source/delete.php";
					break;

				default:
					echo "<div class='default'><h2>Welcome to our new CRUD sytem.</h2><p>We hope you enjoy.</p></div>";
					break;
			}

		?>
	</div>
	<div id="footer">
		<p>Copyright &copy; 2018 John Jarrell.</p>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/js.js"></script>

</body>
</html>
