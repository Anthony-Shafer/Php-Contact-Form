# PHP Contact Form
This is a simple PHP script that allows you to create a contact form on your website and receive messages from visitors.

## Features
1. Easy to install and use
2. Configurable email address for receiving messages
3. Customizable email subject and message body
4. Form validation to prevent spam submissions
5. Success message displayed after successful submission
6. Error message displayed if there are validation errors or if the email cannot be sent

## Installation
Copy the files to your web server.
Open the config.php file and edit the $to_email variable to your email address.
Optionally, you can also edit the email subject and message body.
Upload the files to your web server.

## Usage
To use the contact form, simply create a new HTML page and include the `contact.php` file. For example:
```html
<form action="contact.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    
    <label for="message">Message</label>
    <textarea name="message" id="message" required></textarea>
    
    <button type="submit">Send</button>
</form>

```

Note that the form fields must have the name attributes set to `name`, `email`, and `message`. Also, the action attribute of the form should point to the `contact.php` file.

## Customization
You can customize the email subject and message body by editing the $subject and $message variables in the config.php file.

## Security
This script includes basic form validation to prevent spam submissions. However, it is recommended to implement additional security measures, such as **CAPTCHA**, to prevent abuse.

## License
This project is licensed under the `MIT License`. See the LICENSE file for details.
