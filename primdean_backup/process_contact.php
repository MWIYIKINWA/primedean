<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize and assign variables from the form
    $first_name = htmlspecialchars(trim($_POST["first_name"]));
    $last_name = htmlspecialchars(trim($_POST["last_name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $service = htmlspecialchars(trim($_POST["service"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // 2. Validate required fields (matches your HTML required tags)
    if (empty($first_name) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.'); window.history.back();</script>";
        exit;
    }

    // 3. Email Settings
    $to = "sales@primedean.com"; // The destination email
    $subject = "New Website Inquiry: " . $service;

    // 4. Construct the Email Body
    $body = "You have received a new message from your website contact form.\n\n";
    $body .= "--- Contact Details ---\n";
    $body .= "Name: $first_name $last_name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: " . (!empty($phone) ? $phone : "Not provided") . "\n";
    $body .= "Service Interest: $service\n\n";
    $body .= "--- Message ---\n";
    $body .= "$message\n";

    // 5. Construct Headers
    // Note: It's best practice for the "From" address to match your website's domain to avoid spam filters.
    $headers = "From: sales@primedean.com\r\n";
    $headers .= "Reply-To: $email\r\n"; // Allows you to hit "Reply" and email the customer directly
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // 6. Send the Email
    if (mail($to, $subject, $body, $headers)) {
        // Success: Alert the user and redirect back to the contact page
        echo "<script>
                alert('Thank you, $first_name! Your message has been sent successfully.');
                window.location.href = 'contact.php'; // Change to your actual contact page filename if different
              </script>";
    } else {
        // Failure: Alert the user
        echo "<script>
                alert('Oops! Something went wrong and we couldn\'t send your message. Please try again later.');
                window.history.back();
              </script>";
    }

} else {
    // If someone tries to access this file directly without submitting the form, redirect them
    header("Location: contact.php");
    exit;
}
?>