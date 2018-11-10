<?php
addRecord();
?>
<div id="create-page">
<h1>Create Pane</h1>
	<form action="" method="post">
		<div class="form-group">
			<label for="fname">First Name</label>
			<input class="form-control" type="text" name="fname" id="fname" required autofocus placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="lname">Last Name</label>
			<input class="form-control" type="text" name="lname" id="lname" required placeholder="Last Name">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email" id="email" required placeholder="Email">
		</div>
		<div class="form-group">
			<input class="button" type="submit" name="create" value="Create Record" id="submit">
		</div>
	</form>
</div>