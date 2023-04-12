<!DOCTYPE html>
<html>
<head>
	<title>Sample PHP Form</title>
</head>
<body>

	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = "";
	$name = $email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// validate name
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		// validate email
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<h2>Sample PHP Form</h2>
	<p><span class="error">* required field</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		E-mail: <input type="text" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
	// display submitted data
	if ($name && $email) {
		echo "<h2>Submitted Data:</h2>";
		echo "Name: " . $name . "<br>";
		echo "Email: " . $email . "<br>";
	}
	?>

</body>
</html>
