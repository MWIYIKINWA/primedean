<?php
// Resolve full absolute URL for Open Graph / Twitter image preview
$share_image = $page_image ?? '/assets/images/about.jpeg';
$share_image_url = (strpos($share_image, 'http') === 0) ? $share_image : SITE_URL . '/' . ltrim($share_image, '/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Primedean Limited' ?></title>
    <meta name="description" content="<?= $page_description ?? 'Primedean Limited – Branding, Signage & Printing in Kampala' ?>">

    <!-- Local SEO & Canonical -->
    <meta name="keywords" content="Branding in Kampala, Vehicle Wraps Uganda, Signage, Corporate Printing, Primedean Limited">
    <link rel="canonical" href="<?= SITE_URL . $_SERVER['REQUEST_URI'] ?>">

    <!-- FAVICONS -->
    <link rel="icon" type="image/x-icon" href="<?= SITE_URL ?>/assets/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_URL ?>/assets/images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_URL ?>/assets/images/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_URL ?>/assets/images/favicon.png">

    <!-- OPEN GRAPH (WhatsApp, Facebook, LinkedIn) -->
    <meta property="og:title" content="<?= $page_title ?? 'Primedean Limited' ?>">
    <meta property="og:description" content="<?= $page_description ?? 'Primedean Limited – Branding, Signage & Printing in Kampala' ?>">
    <meta property="og:url" content="<?= SITE_URL . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?= $share_image_url ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?= htmlspecialchars($page_title ?? 'Primedean Limited') ?>">

    <!-- TWITTER CARDS -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $page_title ?? 'Primedean Limited' ?>">
    <meta name="twitter:description" content="<?= $page_description ?? 'Primedean Limited – Building brand Awareness and Visibility' ?>">
    <meta name="twitter:image" content="<?= $share_image_url ?>">

    <!-- Stylesheets & Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <script>
    document.documentElement.setAttribute('data-prefers-reduced-motion', window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'true' : 'false');
    </script>
</head>

<body>