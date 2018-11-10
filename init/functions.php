<?php




function cleanData($data) {
	global $conn;
	$data = mysqli_real_escape_string($conn, $data);
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);
	return $data;
}

function addRecord() {

	global $conn;

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])) {
		$fname = htmlentities(cleanData($_POST['fname']));
		$lname = htmlentities(cleanData($_POST['lname']));
		$email = htmlentities(cleanData($_POST['email']));

		$sql = "INSERT INTO records (fname, lname, email) VALUES ('{$fname}', '{$lname}', '{$email}')";
		if (mysqli_query($conn, $sql)) {
			echo "Data entered.";
		} else {
			echo "There was a problem." . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

function readData() {

	global $conn;

	$sql = "SELECT * FROM records ORDER BY lname";
	$result = mysqli_query($conn, $sql);

	if ($result) {

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['id'];
			$first = $row['fname'];
			$last = $row['lname'];
			$email = $row['email'];

			echo "<tr>";
			echo "<td>{$id}</td>";
			echo "<td>$first $last</td>";
			echo "<td>$email</td>";
			echo "<td><a href='index.php?source=update&id=$id'>Update</a></td>";
			echo "<td><a href='index.php?source=delete&id=$id'>Delete</a></td>";
			echo "</tr>";

		}
	} else {
		die("Error: " . mysqli_error($conn));
	}
}

function getUpdateData() {
	global $conn;
	global $theId;
	global $theError;

	$sql = "SELECT * FROM records WHERE id = $theId";
	$result = mysqli_query($conn, $sql);

	if ($result) {

		$row = mysqli_fetch_array($result);

			$firstn = $row['fname'];

		?>

		<div id="update-page">
			<h1>Update Pane</h1>
			<h2><?php echo $theError; ?></h2>
			<form action="" method="post">
				<div class="form-group">
					<label for="fname">First Name</label>
					<input type="hidden" name="id" value="<?php echo $theId; ?>">
					<input class="form-control" type="text" name="fname" id="fname" value="<?php echo $firstn; ?>" required autofocus placeholder="First Name">
				</div>

		<?php

			$lastn = $row['lname'];

			?>

			<div class="form-group">
				<label for="lname">Last Name</label>
				<input class="form-control" type="text" name="lname" id="lname" value="<?php echo $lastn; ?>" required placeholder="Last Name">
			</div>

			<?php

			$theEmail = $row['email'];

			?>

			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="email" name="email" id="email" value="<?php echo $theEmail; ?>" required placeholder="Email">
			</div>
			<div class="form-group">
				<input class="button" type="submit" name="update" value="Update Record" id="submit">
			</div>
		</form>
	</div>

			<?php

	} else {
		$theError = "Error: " . mysqli_error($conn);
	}
}

function updateData() {

	global $conn;

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
		$theId = htmlentities(cleanData($_POST['id']));
		$fname = htmlentities(cleanData($_POST['fname']));
		$lname = htmlentities(cleanData($_POST['lname']));
		$email = htmlentities(cleanData($_POST['email']));

		$sql = "UPDATE records SET fname = '{$fname}', lname = '{$lname}', email = '{$email}' WHERE id = $theId";
		if (mysqli_query($conn, $sql)) {
			echo "Record Updated.";
		} else {
			echo "There was a problem." . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

function getDeleteData() {

	global $conn;

	if (isset($_GET['id'])) {
		
		$theId = $_GET['id'];
		$sql = "SELECT * FROM records WHERE id = $theId";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$row = mysqli_fetch_array($result);
			$firstn = $row['fname'];
			$lastn = $row['lname'];
			$emailn = $row['email'];
			?>
			<div id="delete-page">
				<h1>Delete Pane</h1>
				<h2><?php echo $theError; ?></h2>
				<div class="form-group">
					<?php echo $firstn; ?> <?php echo $lastn; ?>
				</div>
				<div class="form-group">
					<?php echo $emailn; ?>
				</div>
				<div class="form-group">
					<p>Is this the record you would like to delete?</p>
				</div>
				<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $theId; ?>">
					<div class="form-group">
						<input class="button" type="submit" name="delete" value="Delete Record" id="submit">
					</div>
				</form>
			</div>
			<?php
		}

	} else {
		echo "There is no ID set to view.";
	}

}

function deleteData() {

	global $conn;

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
		
		$theDelID = $_POST['id'];

	$sql2 = "DELETE FROM records WHERE id = {$theDelID}";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
		echo "Record deleted.";
	} else {
		echo "There was a problem." . $sql . "<br>" . mysqli_error($conn);
	}

	}

}

?>
