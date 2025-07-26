<?php
// Change this to your email address
$to = "mehengasingh13@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (
        isset($_POST['mail']) && !empty(trim($_POST['mail'])) &&
        isset($_POST['phone']) && !empty(trim($_POST['phone'])) &&
        isset($_POST['message']) && !empty(trim($_POST['message']))
    ) {
        // Sanitize inputs
        $email = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone']));
        $message = htmlspecialchars(trim($_POST['message']));

        $subject = "New Contact Form Submission";
        $body = "You have received a new message from your website contact form:\n\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n";
        $body .= "Message:\n$message\n";

        // Set headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Success"; // You can echo JSON if using JavaScript AJAX
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Please fill all required fields.";
    }
}
?>
