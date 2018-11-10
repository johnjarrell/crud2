<?php

updateData();

if (isset($_GET['id'])) {
	$theId = htmlentities($_GET['id']);
	$theError = "";
	getUpdateData();
} else {
	$theError = "No record selected to update.";
	echo "<h1>Update Page</h1>";
	echo "<h3 style='text-align:center;'>$theError</h3>";
}

?>
