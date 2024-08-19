<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : 'No Subject';
    $message = htmlspecialchars(trim($_POST['message']));

    // Email parameters
    $to = 'dalisabdallah@gmail.com'; // Your email address
    $email_subject = "Contact Form Submission: " . $subject;
    $email_body = "Name: $firstname $lastname\nEmail: $email\n\nMessage:\n$message";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    $success = mail($to, $email_subject, $email_body, $headers);

    if ($success) {
        echo "Thank you for contacting me, $firstname! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>