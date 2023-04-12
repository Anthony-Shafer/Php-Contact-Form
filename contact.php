<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
</head>
<body>

<?php
// Initialize variables
$name = "";
$email = "";
$message = "";
$errors = array();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get form data
	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$message = test_input($_POST["message"]);

	// Validate form data
	if (empty($name)) {
		$errors[] = "Name is required";
	}
	if (empty($email)) {
		$errors[] = "Email is required";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format";
	}
	if (empty($message)) {
		$errors[] = "Message is required";
	}

	// If there are no errors, process the form
	if (count($errors) == 0) {
		// Save form data to database or send email
		// ...

		// Redirect to thank you page
		header("Location: thank-you.php");
		exit();
	}
}

// Helper function to sanitize form data
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<h1>Contact Us</h1>

<?php if (count($errors) > 0): ?>
	<ul>
	<?php foreach ($errors as $error): ?>
		<li><?php echo $error; ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<label for="name">Name:</label>
	<input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>

	<label for="email">Email:</label>
	<input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>

	<label for="message">Message:</label>
	<textarea name="message" id="message"><?php echo $message; ?></textarea><br>

	<input type="submit" value="Submit">
</form>

</body>
</html>
