<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $message = htmlspecialchars($_POST['message']);

    // Set up email parameters
    $to = 'dalisabdallah@gmail.com'; // Your email address
    $email_subject = "Contact Form Submission: " . ($subject ? $subject : "No Subject");
    $body = "Name: $firstname $lastname\n\nMessage:\n$message";

    // Send email
    $success = mail($to, $email_subject, $body);
    
    if ($success) {
        echo "Thank you for contacting us, $firstname! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>