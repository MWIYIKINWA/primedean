<?php
// Site-wide configuration
define('SITE_NAME', 'Primedean Limited');
define('SITE_URL', 'https://primedean.com'); // update to actual domain
define('CONTACT_EMAIL', 'sales@primedean.com');
define('CONTACT_PHONE', '0760 249 354');
define('CONTACT_WHATSAPP', '256760249354');
define('CONTACT_ADDRESS', 'Kira Road, Kampala (near Total Acacia)');

// Start session for CSRF and other needs
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>