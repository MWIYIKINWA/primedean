<?php
// Update this URL to point to your Laravel CMS API endpoint
$apiUrl = "http://127.0.0.1:8000/api/inquiries";

// Check if the form was submitted[cite: 8]
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize and assign variables from the form[cite: 8]
    $first_name = htmlspecialchars(trim($_POST["first_name"] ?? '')); //[cite: 8]
    $last_name = htmlspecialchars(trim($_POST["last_name"] ?? '')); //[cite: 8]
    $email = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL); //[cite: 8]
    $phone = htmlspecialchars(trim($_POST["phone"] ?? '')); //[cite: 8]
    $company = htmlspecialchars(trim($_POST["company"] ?? '')); //[cite: 8]
    $service = htmlspecialchars(trim($_POST["service"] ?? '')); //[cite: 8]
    $message = htmlspecialchars(trim($_POST["message"] ?? '')); //[cite: 8]

    // 2. Validate required fields[cite: 8]
    if (empty($first_name) || empty($email) || empty($message) || empty($company)) { //[cite: 8]
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>"; //[cite: 8]
        exit; //[cite: 8]
    }

    // Validate email format[cite: 8]
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //[cite: 8]
        echo "<script>alert('Please enter a valid email address.'); window.history.back();</script>"; //[cite: 8]
        exit; //[cite: 8]
    }

    // 3. Prepare payload for Laravel API
    $payload = [
        'type' => 'contact',
        'name' => trim($first_name . ' ' . $last_name),
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'service' => $service,
        'message' => $message,
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

    // 5. Email Notification (Backup)[cite: 8]
    $to = "sales@primedean.com"; //[cite: 8]
    $subject = "New Website Inquiry: " . $service; //[cite: 8]
    $body = " You have received a new message from your website contact form.\n\n" //[cite: 8]
        . "--- Contact Details ---\n" //[cite: 8]
        . "Name: $first_name $last_name\n" //[cite: 8]
        . "Email: $email\n" //[cite: 8]
        . "Phone: " . (!empty($phone) ? $phone : "Not provided") . "\n" //[cite: 8]
        . "Company: $company\n"
        . "Service Interest: $service\n\n" //[cite: 8]
        . "--- Message ---\n" //[cite: 8]
        . "$message\n"; //[cite: 8]

    $headers = "From: sales@primedean.com\r\n" //[cite: 8]
        . "Reply-To: $email\r\n" //[cite: 8]
        . "Content-Type: text/plain; charset=UTF-8\r\n" //[cite: 8]
        . "X-Mailer: PHP/" . phpversion(); //[cite: 8]

    @mail($to, $subject, $body, $headers); // Send email notification in background

    // 6. Provide User Feedback[cite: 8]
    if ($httpCode === 200 || $httpCode === 201) {
        echo "<script>
                alert('Thank you, " . addslashes($first_name) . "! Your message has been sent successfully.');
                window.location.href = 'contact.php';
              </script>"; //[cite: 8]
    } else {
        echo "<script>
                alert('Oops! Something went wrong and we couldn\'t submit your message. Please try again later.');
                window.history.back();
              </script>"; //[cite: 8]
    }

} else {
    // If someone tries to access this file directly[cite: 8]
    header("Location: contact.php"); //[cite: 8]
    exit; //[cite: 8]
}
?>