<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize input fields
    $service = htmlspecialchars(trim($_POST["service"] ?? "Service Inquiry"));
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $phone = htmlspecialchars(trim($_POST["phone"] ?? ""));
    $category = htmlspecialchars(trim($_POST["category"] ?? "Not specified"));

    // 2. Validate required inputs
    if (empty($name) || empty($phone)) {
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
        exit;
    }

    // 3. Email Configuration
    $to = "sales@primedean.com"; // Your receiving email
    $subject = "New Booking Inquiry: " . $service;

    // 4. Construct Email Message
    $body = "You have received a new service booking request from your website.\n\n";
    $body .= "--- Inquiry Details ---\n";
    $body .= "Service: " . $service . "\n";
    $body .= "Full Name: " . $name . "\n";
    $body .= "Phone / WhatsApp: " . $phone . "\n";
    $body .= "Vehicle Type / Quantity: " . $category . "\n\n";
    $body .= "Sent on: " . date("Y-m-d H:i:s") . "\n";

    // 5. Construct Email Headers
    $headers = "From: Primedean Web Form <sales@primedean.com>\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // 6. Sending Mail and Provide User Feedback
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('Thank you, " . addslashes($name) . "! Your booking request has been submitted successfully.');
                window.history.back();
              </script>";
    } else {
        echo "<script>
                alert('Sorry, there was an issue sending your request. Please try contacting us directly via WhatsApp.');
                window.history.back();
              </script>";
    }

} else {
    // Blocking direct page access
    header("Location: index.php");
    exit;
}
?>