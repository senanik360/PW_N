<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate form data
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set recipient email address
        $to = 'aniksen360@gmail.com';  // Change this to your email address

        // Set email subject
        $subject = "Portfolio Website Contact Form: $name";

        // Set email body
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message:\n$message\n";

        // Set email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your message, $name. I will get back to you shortly.";
        } else {
            echo "There was an error sending your message. Please try again later.";
        }
    } else {
        echo "Please fill in all fields correctly.";
    }
} else {
    echo "Invalid request method.";
}
?>
