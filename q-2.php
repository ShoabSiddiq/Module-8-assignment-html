<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h2>Login Form</h2>
	<?php
		// define variables and set to empty values
		$emailErr = $passwordErr = "";
		$email = $password = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// validate email
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
				// check if email is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email format";
				}
			}

			// validate password
			if (empty($_POST["password"])) {
				$passwordErr = "Password is required";
			} else {
				$password = test_input($_POST["password"]);
			}

			// redirect to welcome page if login is successful
			if ($email == "example@example.com" && $password == "password123") {
				header("Location: welcome.php?name=John");
				exit;
			} else {
				// display error message if login is unsuccessful
				echo "<p style='color: red;'>Invalid email or password</p>";
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Email address:</label>
		<input type="text" name="email" value="<?php echo $email;?>">
		<span style="color: red;"><?php echo $emailErr;?></span>
		<br><br>
		<label>Password:</label>
		<input type="password" name="password" value="<?php echo $password;?>">
		<span style="color: red;"><?php echo $passwordErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
