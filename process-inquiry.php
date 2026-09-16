<?php
// Update this URL to point to your Laravel CMS API endpoint
$apiUrl = "http://127.0.0.1:8000/api/inquiries";

if ($_SERVER["REQUEST_METHOD"] == "POST") { //

    // 1. Sanitize input fields
    $service = htmlspecialchars(trim($_POST["service"] ?? "Service Inquiry")); //
    $name = htmlspecialchars(trim($_POST["name"] ?? "")); //
    $phone = htmlspecialchars(trim($_POST["phone"] ?? "")); //
    $company = htmlspecialchars(trim($_POST["company"] ?? "")); //
    $email = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL); //
    $category = htmlspecialchars(trim($_POST["category"] ?? "Not specified")); //

    // 2. Validate required inputs
    if (empty($name) || empty($phone)) { //
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>"; //
        exit; //
    }

    // 3. Prepare payload for Laravel API
    $payload = [
        'type' => 'service_inquiry',
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'service' => $category !== 'Not specified' ? $category : $service,
        'message' => 'Service Booking Request for: ' . $service,
    ];

    // 4. Send payload to Laravel CMS database via cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // Uncomment if your API route requires Bearer Token authentication:
    // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer YOUR_API_TOKEN']);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // 5. Email Notification (Backup)
    $to = "sales@primedean.com"; //
    $subject = "New Booking Inquiry: " . $service; //
    $body = "You have received a new service booking request from your website.\n\n" //
        . "--- Inquiry Details ---\n" //
        . "Service: " . $service . "\n" //
        . "Full Name: " . $name . "\n" //
        . "Email: " . $email . "\n" //
        . "Company: " . $company . "\n" //
        . "Phone / WhatsApp: " . $phone . "\n" //
        . "Category: " . $category . "\n\n" //
        . "Sent on: " . date("Y-m-d H:i:s") . "\n"; //

    $headers = "From: Primedean Web Form <sales@primedean.com>\r\n" //
        . "Content-Type: text/plain; charset=UTF-8\r\n" //
        . "X-Mailer: PHP/" . phpversion(); //

    @mail($to, $subject, $body, $headers); // Send email notification in background

    // 6. Provide User Feedback
    if ($httpCode === 200 || $httpCode === 201) {
        echo "<script>
                alert('Thank you, " . addslashes($name) . "! Your booking request has been submitted successfully.');
                window.history.back();
              </script>"; //
    } else {
        echo "<script>
                alert('Sorry, there was an issue sending your request. Please try contacting us directly via WhatsApp.');
                window.history.back();
              </script>"; //
    }

} else {
    // Blocking direct page access
    header("Location: index.php"); //
    exit; //
}
?>