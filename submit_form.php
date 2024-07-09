<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Check if fields are empty
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email parameters
        $to = "aniksen360@gmail.com"; // Replace with your email
        $subject = "New contact form submission";
        $headers = "From: $email\r\n";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for contacting us, $name. We will get back to you shortly.";
        } else {
            echo "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
