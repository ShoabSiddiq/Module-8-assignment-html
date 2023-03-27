<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<?php
		if(isset($_POST['submit'])) {
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirmPassword'];
			
			// check if all fields are filled
			if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
				echo "All fields are required.";
			}
			// check if email is valid
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email format.";
			}
			// check if password and confirm password match
			elseif($password != $confirmPassword) {
				echo "Password and confirm password do not match."."\n";
			}
			else {
				echo "Registration successful!";
				// additional code for saving user info to a database or file
			}
		}
	?>
	<form method="post" action="">
		<label for="firstName">First Name:</label>
		<input type="text" name="firstName" required><br><br>

		<label for="lastName">Last Name:</label>
		<input type="text" name="lastName" required><br><br>

		<label for="email">Email Address:</label>
		<input type="email" name="email" required><br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br><br>

		<label for="confirmPassword">Confirm Password:</label>
		<input type="password" name="confirmPassword" required><br><br>

		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
